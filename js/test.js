/*
 ** Player Picker Module
 */

// constructor
var playerPicker = function (options, elem) {
    var self = this;

    this.elem = elem;
    this.$elem = $(elem);
    this.name = 'playerPicker';

    this.options = options;
    this.metadata = this.$elem.data('plugin-options');

    tmpl.load('lineups', function () {
        self._init();
    });
};

// the plugin prototype
playerPicker.prototype = {
    defaults: {
        template: 'tmplPlayerPicker',
        title: 'Available Players', // custom title should have complimentary css class (for shadow, etc)
        mainClass: 'available-players',
        hideGameFilters: false,
        hidePlayersWhenUsed: true,
        autoAdvancePosition: false,
        multiLineupEdit: false,
        limitPlayersToUserDraft: false,
        fadeOnReveal: true,
    },

    _init: function () {
        // set options
        this.options = $.extend({}, this.defaults, this.options, this.metadata);
        this.$elem.data('module-type', this.name);

        // initialize variables
        if (this.options.limitPlayersToUserDraft) {
            this.playersByContestSig = {};
            this.contestSignatures = {};
        } else {
            this.rosterPosArr = [];
            this.rosterMap = this.options.rosterMap || {};
            this.games = {};
            this.selectedPositionFilter = this.options.initPositionFilter || ''; // empty string defaults to first tab
            this.usedPlayers = [];
        }

        this.randGuid = Math.floor((1 + Math.random()) * 0x10000).toString(16);
        this.isScoringTabLoaded = false;

        // timers
        this.playerLockTimer = null;

        this.intervalLockCheck = 10; // secs

        // grid variables
        this.grid = null;
        this.dataView = null;
        this.gridSortDir = (this.options.multiLineupEdit ? 1 : -1);
        this.gridSortCol = (this.options.sport == 'MMA' ? 'fin' : (this.options.multiLineupEdit ? "n" : "s"));
        this.searchString = "";
        this.positionFilter = [];
        this.gameFilter = []; // array of teamsIds (1 or 2 elements)
        this.salaryFilter = 0;
        this.probableFilter = false;
        this.remSalary = 999999;
        this.gridOptions = {
            fullWidthRows: true,
            rowHeight: 30,
            headerRowHeight: 30,
            enableCellNavigation: this.options.multiLineupEdit,
            enableColumnReorder: false
        };

        // initial build
        this.hide();
        this.registerEvents();
        this.build();

        //this.connectRealtime();
    },

    option: function (key, value) {
        if ($.isPlainObject(key)) {
            this.options = $.extend(true, this.options, key);
        } else if (key && typeof value === "undefined") {
            return this.options[key];
        } else {
            this.options[key] = value;
        }
        return this;
    },

    state: function () {
        return stateEval(this.options.contestStatusId);
    },

    callPeer: function (funcName, arg) {
        return this.options.parent.transport(this, funcName, arg);
    },

    signalStateTransition: function (newContestStatusId) {
        this.options.contestStatusId = newContestStatusId;
        this.startTimers();
    },

    build: function () {
        clog('building player picker for lineup #' + this.options.lineupId + '.');
        this.$elem.addClass(this.options.mainClass).html($.validator.format(tmpl.get(this.options.template), this.options.title.replace(/\s/g, "-").toLowerCase(), this.options.title));
        this.markInitialPlayersAsUsed();

        if (this.options.multiLineupEdit) {
            $('div.tabs', this.$elem).hide();
            $('.foot', this.$elem).hide();
            if (!this.options.limitPlayersToUserDraft) {
                $('div.header-right div.criteria', this.$elem).show();
                $('.blocking-message', this.$elem).html('<div><strong>Select a player from the "My Drafted Players" area to the left and a list of players eligible for the "Quick Swap" will display here.</strong><br><br>Note: In order to meet salary requirements for all lineups with the chosen player, only players with salaries <strong>equal to or lesser</strong> than the chosen player will be displayed.</div>');
            }
        } else {
            if (!this.options.hideGameFilters) {
                $('div.search-available select.game-filter', this.$elem).show();
            }

            $('.foot a.export-to-csv', this.$elem).attr('href',
                '/lineup/getavailableplayerscsv' + (this.options.lineupId === undefined ? '' : 'bylineupid') + '?' +
                (
                    this.options.lineupId === undefined ?
                        $.param({
                            contestTypeId: this.options.contestTypeId,
                            draftGroupId: getDraftGroupId(this)
                        }) :
                        $.param({ lineupId: this.options.lineupId })
                )
            );
        }
        this.load();
        this.startTimers();
        this.reveal();
    },

    hide: function () {
        this.$elem.hide();
    },

    showFightLines: function () {
        return this.options.sport == 'MMA' && this.gridSortCol == 'fin';
    },

    gridSortFunc: function (a, b, col, dir) {
        if (col == "ppg" || col == "avgf") {
            var x = parseFloat(a[col]), y = parseFloat(b[col]);
        } else {
            var x = a[col], y = b[col];
        }
        if (col == "n") {
            var xfirst = a["fnu"].toLowerCase(),
                xlast = a["lnu"].toLowerCase(),
                yfirst = b["fnu"].toLowerCase(),
                ylast = b["lnu"].toLowerCase();
            if (xfirst.length == 0) {
                xfirst = xlast;
                xlast = "";
            }
            if (yfirst.length == 0) {
                yfirst = ylast;
                ylast = "";
            }
            if (xfirst != yfirst) return xfirst > yfirst ? 1 : -1;
            return xlast == ylast ? 0 : (xlast > ylast ? 1 : -1);
        }
        if (x != y) return x > y ? 1 : -1;
        return (col == "ppg" || a["ppg"] == b["ppg"]) ? 0 : (parseFloat(a["ppg"]) < parseFloat(b["ppg"]) ? dir : -1 * dir);
    },

    gridSorter: function (a, b) {
        return this.gridSortFunc(a, b, this.gridSortCol, this.gridSortDir);
    },

    gridFilter: function (item, args) {
        if (args.positionFilter.length && $.inArray(item["pn"], args.positionFilter) == -1) return false;
        if (args.gameFilter.length && $.inArray(item["tid"], args.gameFilter) == -1) return false;
        if (!playerNameSearch(args.searchString, item["fnu"], item["lnu"])) return false;
        if (args.probableFilter && item["pp"] == 0) return false;
        if ($.inArray(item["pid"], args.usedPlayers) != -1) return false;
        return true;
    },

    gridMultiEditFilter: function (item, args) {
        if (args.positionFilter.length && $.inArray(item["pn"], args.positionFilter) == -1) return false;
        if (item["s"] > args.salaryFilter) return false;
        if (!playerNameSearch(args.searchString, item["fnu"], item["lnu"])) return false;
        return true;
    },

    updateGridFilter: function () {
        this.dataView.setFilterArgs({
            searchString: $.trim(this.searchString),
            positionFilter: this.positionFilter,
            gameFilter: this.gameFilter,
            salaryFilter: this.salaryFilter,
            probableFilter: (this.probableFilter && this.selectedPositionFilter == 'P'),
            usedPlayers: (this.options.hidePlayersWhenUsed ? this.usedPlayers : [])
        });
        this.grid.invalidate();
        this.clearMetadataProvider(); // speed optimization
        this.dataView.refresh();
        this.setMetadataProvider();
        this.grid.invalidate(); // must invalidate AFTER refresh for fight lines
    },

    defineGridColumns: function () {
        var oprkWidth = 45;

        this.gridColumns = [
            { id: "pos", name: "Pos", field: "pn", width: 47, resizable: false, sortable: true, toolTip: "Position" },
            { id: "name", name: "Player", field: "n", width: 145, resizable: false, sortable: true, formatter: Slick.Formatters.NoEncoding },
            { id: "game", name: "Opp", field: "tsid", width: 85, resizable: false, sortable: true, formatter: Slick.Formatters.GameWithTeamHighlight, toolTip: "Opponent" },
            { id: "oprk", name: "OPRK", field: "or", width: oprkWidth, resizable: false, sortable: true, formatter: Slick.Formatters.OpponentPositionRank, toolTip: "Opponent Rank vs Position" },

            { id: "fppg", name: "FPPG", field: "ppg", width: 42, resizable: false, sortable: true, formatter: Slick.Formatters.Player, toolTip: "Average Fantasy Points Per Game"},
            { id: "salary", name: "Salary", field: "s", width: 55, resizable: false, sortable: true, formatter: Slick.Formatters.MoneyNoDecimals, cssClass: "sal" },
            { id: "button", name: "&nbsp;", field: "swp", width: 36, resizable: false, sortable: false, formatter: Slick.Formatters.PlayerSwapControl, cssClass: 'last right' }
        ];

        if (this.options.sport === 'MLB') {
            //Adjust grid for opposing pitcher column
            this.gridColumns[2].width = 75;
            this.gridColumns[3] = {
                id: 'opn',
                name: 'OPP SP',
                field: 'opn',
                width: 50,
                resizable: false,
                sortable: true,
                formatter: Slick.Formatters.FormatOpposingPitcherNameWithTooltip,
                cssClass: 'opposing-pitcher',
                toolTip: 'Opposing Starting Pitcher'
            };
            if (this.options.multiLineupEdit) {
                this.gridColumns[2].formatter = Slick.Formatters.FormatGameWithOpposingPitcherTooltip;
            }
        }

        if (this.options.sport == 'PGA' || this.options.sport == 'GOLF') {
            this.gridColumns.splice(0, 4,
                { id: "name", name: "Player", field: "n", width: 145, resizable: false, sortable: true, formatter: Slick.Formatters.NoEncoding },
                { id: "savg", name: "Avg", field: "savg", width: 52, resizable: false, sortable: true, formatter: Slick.Formatters.Player },
                { id: "tten", name: "Top 10's", field: "tten", width: (this.options.multiLineupEdit ? 78 : 55), resizable: false, sortable: true, formatter: Slick.Formatters.Player },
                { id: "cuts", name: "Cuts Made", field: "cuts", width: 70, resizable: false, sortable: true, formatter: Slick.Formatters.PGACutsMade }
            );
        }
        else if (this.options.sport == 'MMA') {
            this.gridColumns.splice(0, 4, { id: "fin", name: "FT #", field: "fin", width: 27, resizable: false, sortable: true, formatter: Slick.Formatters.NoEncoding }, { id: "name", name: "Fighter", field: "n", width: this.options.multiLineupEdit ? 125 : 170, resizable: false, sortable: true, formatter: Slick.Formatters.NoEncoding }, { id: "game", name: "Opp", field: "tsid", width: 120, resizable: false, sortable: true, formatter: Slick.Formatters.GameWithTeamHighlight, toolTip: "Opponent" });
        }
        else if (this.options.sport == 'NAS') {
            this.gridColumns.splice(0, 5,
                { id: "name", name: "Driver", field: "n", width: (this.options.multiLineupEdit ? 125 : 145), resizable: false, sortable: true, formatter: Slick.Formatters.NoEncoding },
                { id: "races", name: "Races", field: "evts", width: 55, resizable: false, sortable: true, formatter: Slick.Formatters.Player },
                { id: "tten", name: "Top 10's", field: "tten", width: (this.options.multiLineupEdit ? 70 : 50), resizable: false, sortable: true, formatter: Slick.Formatters.Player },
                { id: "savg", name: "Avg Finish", field: "avgf", width: (this.options.multiLineupEdit ? 78 : 65), resizable: false, sortable: true, formatter: Slick.Formatters.Player },
                { id: "fppg", name: "FPPR", field: "ppg", width: 42, resizable: false, sortable: true, formatter: Slick.Formatters.Player, toolTip: "Average Fantasy Points Per Race"}
            );
        }
        else if (this.options.sport == 'LOL') {
            this.gridColumns.splice(2, 2, { id: "game", name: "Opp", field: "tsid", width: 85 + oprkWidth, resizable: false, sortable: true, formatter: Slick.Formatters.GameWithTeamHighlight, toolTip: "Opponent" });
        }

        if ($.inArray(this.options.sport, ['CFB','SOCC','SOC']) >= 0 && !(this.options.multiLineupEdit && this.options.limitPlayersToUserDraft)) {
            this.gridColumns[1].width += oprkWidth;
            this.gridColumns.splice(3, 1); // remove OPRK
        }

        if (this.options.multiLineupEdit) {
            //filters out columns that aren't necessary for multi lineup edit views
            if (this.options.limitPlayersToUserDraft) {
                this.gridColumns = $.grep(this.gridColumns, function(e, i) {
                    return ($.inArray(e.id, ['oprk', 'cuts', 'races', 'opn']) === -1);
                });
            } else {
                this.gridColumns = $.grep(this.gridColumns, function (e, i) {
                    return ($.inArray(e.id, ['pos', 'cuts', 'races', 'opn']) === -1);
                });
            }
        }
    },

    setMetadataProvider: function () {
        this.dataView.getItemMetadata = this._playerRowMetadata(this.dataView.getItemMetadata, this);
    },

    clearMetadataProvider: function () {
        this.dataView.getItemMetadata = (function(i) { return null; });
    },

    renderGrid: function (pk, players) {
        var self = this;
        var gridId = "player-picker-" + ((self.options.multiLineupEdit ? (self.options.limitPlayersToUserDraft ? 'left' : 'right') : self.options.lineupId) || self.randGuid);
        $('div.player-list', self.$elem).attr('id', gridId);

        self.defineGridColumns();

        self.dataView = new Slick.Data.DataView({ inlineFilters: true });
        self.grid = new Slick.Grid("#"+gridId, self.dataView, self.gridColumns, self.gridOptions);
        if (self.options.multiLineupEdit) self.grid.setSelectionModel(new Slick.RowSelectionModel());

        self.grid.onSort.subscribe(function (e, args) {
            var invalidPostSort = false, prevSort = self.gridSortCol;

            // if sort was fin and now isn't, clear lines
            if (self.showFightLines() && args.sortCol.field != 'fin') {
                invalidPostSort = true;
            }

            self.gridSortDir = args.sortAsc ? 1 : -1;
            self.gridSortCol = args.sortCol.field;

            // if sort wasn't fin and now is, render all to get lines
            if (self.showFightLines() && prevSort != 'fin') {
                invalidPostSort = true;
            }

            self.dataView.sort($.proxy(self.gridSorter, self), args.sortAsc);
            if (invalidPostSort) self.grid.invalidate();
        });

        self.grid.onCellChange.subscribe(function (e, args) {
            self.dataView.updateItem(args.item.id, args.item);
        });

        self.grid.onSelectedRowsChanged.subscribe(function (e, args) {
            var player = self.dataView.getItem(args.rows[0]);
            if (player === undefined || player.swp === false) return;
            if (self.options.limitPlayersToUserDraft) {
                self.options.parent.setSwapOutPlayer(player);
            } else {
                self.options.parent.setSwapInPlayer(player);
            }
        });

        self.dataView.onRowCountChanged.subscribe(function (e, args) {
            self.grid.updateRowCount();
            self.grid.render();
        });

        self.dataView.onRowsChanged.subscribe(function (e, args) {
            self.grid.invalidateRows(args.rows);
            self.grid.render();
        });

        self.setMetadataProvider();
        // setup & load dataView (grid data)
        self.dataView.beginUpdate();
        self.dataView.setItems(players, pk);
        self.dataView.setFilterArgs({ searchString: self.searchString, positionFilter: self.positionFilter, gameFilter: self.gameFilter, salaryFilter: self.salaryFilter,
            probableFilter: self.probableFilter, usedPlayers: (self.options.hidePlayersWhenUsed ? self.usedPlayers : []) });
        self.dataView.setFilter(self.options.multiLineupEdit && !self.options.limitPlayersToUserDraft ? self.gridMultiEditFilter : self.gridFilter);
        if (self.options.multiLineupEdit) self.dataView.sort($.proxy(self.gridSorter, self), (self.gridSortDir == 1 ? true : false));
        self.dataView.endUpdate();

        if (self.options.multiLineupEdit) self.dataView.syncGridSelection(self.grid, true);
    },

    loadStart: function () {
        this.$elem.addClass('loading');
    },

    loadComplete: function () {
        this.$elem.removeClass('loading');

        if (this.options.hasOwnProperty('initPlayers') && this.options.initPlayers.length) {
            this.remSalary = this.callPeer('getRemainingSalary') || 0;
            this.grid.invalidate();
            this.dataView.refresh();
        }
    },

    load: function () {
        var self = this, player, i;

        if (this.options.preloadedData !== undefined) {
            this.reveal(); // without this line slickgrid fails because it doesn't know its own dimensions unless inside visible div
            this.standardLoad(this.options.preloadedData);
            this.attachControlHandlers();
            this.attachElementBindings();
            return;
        }

        this.loadStart();
        if (this.options.limitPlayersToUserDraft) {
            $.get('/lineup/getallswappableplayers', function(data) {
                for (i = 0; i < data.players.length; i++) {
                    player = self._prepPlayerData(data.players[i].player, data.contestSignatures[data.players[i].signatureId].Sport);
                    player.key = player.pn + '-' + player.pid;
                    if (!self.playersByContestSig.hasOwnProperty(data.players[i].signatureId)) self.playersByContestSig[data.players[i].signatureId] = [];
                    self.playersByContestSig[data.players[i].signatureId].push(player);
                }
                self.contestSignatures = data.contestSignatures || {};
                self.renderContestTypeFilter();
                self.loadComplete();
            });
        } else if (this.options.multiLineupEdit) {
            this.showWaitingForDataMessage();
            if (this.options.contestTypeId !== undefined && this.options.contestStartDate !== undefined && this.options.contestEndDate !== undefined) {
                $.get('/lineup/getplayersforcontestsignature',
                    {
                        contestTypeId: this.options.contestTypeId,
                        draftGroupId: this.options.draftGroupId
                    },
                    function(data) {
                        self.rosterMap = data.rosterMap;
                        for (i = 0; i < data.playerList.length; i++) self._prepPlayerData(data.playerList[i]);
                        if (self.grid == null) {
                            self.renderGrid('pid', data.playerList);
                        } else {
                            self.defineGridColumns();
                            self.grid.setColumns(self.gridColumns);
                            self.dataView.beginUpdate();
                            self.dataView.setItems(data.playerList, 'pid');
                            //self.dataView.sort($.proxy(self.gridSorter, self), (self.gridSortDir == 1 ? true : false));
                            self.dataView.endUpdate();
                        }
                        self.loadComplete();
                    }
                );
            }
        } else {
            var url, argHash;
            if (this.options.lineupId !== undefined) {
                url = '/lineup/getavailableplayersbylineupid';
                argHash = { lineupId: this.options.lineupId };
            } else {
                url = '/lineup/getavailableplayers';
                argHash = {
                    draftGroupId: getDraftGroupId(this)
                };
            }
            $.get(url, argHash, function(data) {
                self.standardLoad(data);
            });
        }
        self.attachControlHandlers();
        self.attachElementBindings();
    },

    standardLoad: function (data) {
        var i, p, pp = 0, posArr = [];

        // create sorted list of roster positions
        for (p in this.rosterMap) posArr.push([p, this.rosterMap[p].ord]);
        posArr = posArr.sort(function(a, b) { return a[1] - b[1]; });
        for (i = 0; i < posArr.length; i++) this.rosterPosArr.push(posArr[i][0]);

        this.games = data.teamList;
        for (i = 0; i < data.playerList.length; i++) {
            var player = data.playerList[i];
            this._prepPlayerData(player);
            if (player.pp) pp += 1;
            breakingUpdateManager.addMessages(DK.Lineup.BreakingUpdate.Mapper.fromPlayerLiveStats(player));
        }

        if (this.options.sport == 'MMA') { // sort players by fight #
            data.playerList.sort(function (a, b) {
                var fn1 = a.fin, fn2 = b.fin;
                if (fn1 == fn2) return 0;
                if (fn1 > fn2) return 1;
                return -1;
            });
        }
        this.renderTeamFilter();
        this.renderRosterFilter();
        this.renderProbableFilter(pp);
        this.renderGrid('pid', data.playerList);
        this.loadComplete();

        if (this.options.sport == 'SOC') { // display home team first for soccer
            for (var i in this.games) {
                var tmp = this.games[i].ht;
                this.games[i].ht = this.games[i].at;
                this.games[i].at = tmp;
            }
        }

        $(window).trigger('dkGameSelector.build', [this.games]);
    },

    _playerRowMetadata: function(origMetadataProvider, playerPicker) {
        return function(row) {
            var item = this.getItem(row),
                itemNext = this.getItem(row+1),
                ret = origMetadataProvider(row);
            if (item !== undefined) {
                var showMMAFightLines =
                    itemNext !== undefined &&
                    playerPicker.showFightLines() &&
                    item.fin != itemNext.fin;

                ret = ret || {};
                ret.cssClasses = ret.cssClasses || '';

                if (item.s > playerPicker.remSalary) {
                    ret.cssClasses += ' above-rem-sal';
                }
                if (showMMAFightLines) {
                    ret.cssClasses += ' fight-div';
                }
            }
            return ret;
        };
    },

    _prepPlayerData: function (player, sport) {
        var at = player.atabbr, ht = player.htabbr, attr = '', bo;
        var nasCarNum = '';

        if ((this.options.sport || sport) == 'MMA') {
            player.opp = player.tid == player.atid ? ht : at;
        } else {
            var at = player.atabbr, ht = player.htabbr, attr = '', bo;
            if (player.tid == player.atid) at = '<strong>' + at + '</strong>';
            else if (player.tid == player.htid) ht = '<strong>' + ht + '</strong>';

            if ((this.options.sport || sport) === 'LOL') {
                var lolSeriesIndicator = '';
                if (player.ngis && player.ngis > 1) {
                    if (player.ngis === 3)
                        lolSeriesIndicator = '<span class="icon-Bo3"></span>';
                    if (player.ngis === 5)
                        lolSeriesIndicator = '<span class="icon-Bo5"></span>';
                    if (player.ngis === 7)
                        lolSeriesIndicator = '<span class="icon-Bo7"></span>';
                }

                player.opp = at + ' v ' + ht + lolSeriesIndicator;
            } else if ((this.options.sport || sport) === 'SOC') {
                player.opp = ht + ' vs ' + at;
            }  else {
                player.opp = at + '@' + ht;
            }
        }

        if ((this.options.sport || sport) == 'NAS') {
            player.avgf = (player.avgf || 0).toFixed(1);
            nasCarNum = '#' + player.jn + ' ';
        }

        // attributes
        if (player.pp) attr += '<div class="attr-grn"> P</div>';
        if ((player.i || '').length) attr += '<div class="attr-red"> ' + (player.i || '') + '</div>';
        if (player.news > 0) attr += ' <i class="icon-file-text-alt' + (player.news == 1 ? ' text-muted' : '') + '" onclick="$(\'a.pop\', $(this).parent()).trigger(\'click\');"></i>';
        if (player.slo != null) {
            if (player.slo >= 0) {
                bo = player.slo == 0 ? 'In Starting Lineup' : 'Batting ' + getPlace(player.slo) + ' in lineup';
                attr += ' <i class="icon-ok-sign" title="' + bo + '"></i>';
            }
            else attr += ' <i class="icon-ban-circle" title="Not in Starting Lineup"></i>';
        }

        player.n = nasCarNum + '<a href="#" class="' + DK.Lineup.BreakingUpdate.UI.playerCssClass(player) + ' pop" data-pid="' + player.pid + '" data-tsid="' + player.tsid + '">' +
            (player.fn + ' ' + player.ln).abbrFirstWord(16) + '</a>' + attr;

        return player;
    },

    startTimers: function () {
        this.clearTimers();
        if (this.state().id == 3) this.playerLockTimer = setInterval($.proxy(this.updatePlayerLocks, this), this.intervalLockCheck * 1000);
    },

    clearTimers: function () {
        clearInterval(this.playerLockTimer);
    },

    updatePlayerLocks: function () {
        var isRealtimeOn = lineupModManager.getInstance().isRealtimeOn();
        if (!isRealtimeOn || this.state().id != 3 || this.options.multiLineupEdit || this.grid == null) return;
        var i, item, game, lockPlayers = [], allData = this.grid.getData().getItems(), curTime = Date.getServerDate();
        var player;
        for (i = 0; i < allData.length; i++) {
            player = allData[i];
            game = lineupModManager.getInstance().getGame(player.tsid);
            if ((game !== undefined && game.st <= curTime) || (player.dgst && player.dgst <= curTime && player.swp === true)) {
                lockPlayers.push(allData[i].pid);
            }
        }
        this.dataView.beginUpdate();
        for (i = 0; i < lockPlayers.length; i++) {
            item = this.dataView.getItemById(lockPlayers[i]);
            this.dataView.updateItem(item.pid, $.extend(item, { swp: false }));
        }
        this.dataView.endUpdate();
    },

    loadPlayerListForSwap: function (ctid, cstart, cend, draftGroupId, sport) {
        this.options.contestTypeId = ctid;
        this.options.contestStartDate = cstart;
        this.options.contestEndDate = cend;
        this.options.draftGroupId = draftGroupId;
        this.options.sport = sport;
        this.load();
    },

    updateMultiLineupEditFilters: function (rpos, salary) {
        if (this.rosterMap[rpos] === undefined || this.grid === undefined) {
            alert('Please wait for the Available Players panel to load.');
            return;
        }
        this.positionFilter = this.rosterMap[rpos].map;
        this.salaryFilter = salary;
        this.grid.setSelectedRows([]);
        this.updateGridFilter();
        $('.header-right .criteria span', this.$elem).text(rpos.toUpperCase() + ' and ' + $.number_format(salary, currencyFormat) + ' or less');
        this.hideWaitingForDataMessage();
    },

    hideWaitingForDataMessage: function () {
        $('.blocking-message', this.$elem).hide();
    },

    showWaitingForDataMessage: function () {
        $('.blocking-message', this.$elem).show();
        $('.header-right .criteria span', this.$elem).text('-none-');
    },

    reveal: function () {
        clog('revealing player picker for lineup #' + this.options.lineupId + '.');
        if (this.options.fadeOnReveal) this.$elem.fadeIn(1000);
        else this.$elem.show();
    },

    renderContestTypeFilter: function () {
        var sigId, htmlStr = "", ct, cTypes = {};
        for (sigId in this.contestSignatures) {
            if (this.contestSignatures.hasOwnProperty(sigId) && !cTypes.hasOwnProperty(this.contestSignatures[sigId].ContestTypeId))
                cTypes[this.contestSignatures[sigId].ContestTypeId] = this.contestSignatures[sigId].ContestTypeDesc;
        }
        for (ct in cTypes) {
            if (cTypes.hasOwnProperty(ct)) {
                if (this.options.contestTypeId == undefined) this.options.contestTypeId = ct;
                htmlStr += '<option value="' + ct + '">' + cTypes[ct] + '</option>';
            }
        }
        $('.header-right select.contest-type-filter', this.$elem).html(htmlStr);
        return this.renderContestStartTimeFilter(this.options.contestTypeId);
    },

    renderContestStartTimeFilter: function (ctid) {
        var sigId, i, cur, redArr, redHash = {}, htmlStr = "";

        // restrict to contest sigs for given contest type
        for (sigId in this.contestSignatures) {
            if (this.contestSignatures[sigId].ContestTypeId == ctid) {
                redHash[sigId] = this.contestSignatures[sigId];
                this.options.sport = this.contestSignatures[sigId].Sport;
            }
        }

        // render select box
        redArr = Object.keys(redHash).sort(function (a,b) { return redHash[a].ContestStartDateEdt > redHash[b].ContestStartDateEdt; });
        for (i = 0; i < redArr.length; i++) {
            cur = redHash[parseInt(redArr[i], 10)];
            htmlStr += '<option value="' + redArr[i] + '">' + moment(cur.ContestStartDateEdt).format(DK.DateFormats.month_day_minute_time) +
                ' (' + (cur.GameCount * (cur.Sport == 'PGA' || cur.Sport == 'GOLF' ? 4 : 1)) + ' ' + (cur.Sport == 'PGA' || cur.Sport == 'GOLF' ? 'rounds' : (cur.Sport == 'MMA' ? 'fights' : 'games')) + ')</option>';
        }
        if (redArr.length) {
            $('div.header-right select.contest-type-filter', this.$elem).show();
            $('div.search-available select.start-time-filter', this.$elem).html(htmlStr).show();
        }

        this.reloadGridByContestSig(parseInt(redArr[0], 10));
    },

    reloadGridByContestSig: function (sigId) {
        if (this.grid == null) {
            this.renderGrid('key', this.playersByContestSig[sigId]);
        } else {
            this.defineGridColumns();
            this.grid.setColumns(this.gridColumns);
            this.dataView.beginUpdate();
            this.dataView.setItems(this.playersByContestSig[sigId], 'key');
            this.dataView.sort($.proxy(this.gridSorter, this), (this.gridSortDir == 1 ? true : false));
            this.dataView.endUpdate();
        }

        this.options.parent.updateContestSig(this.contestSignatures[sigId]);
    },

    renderTeamFilter: function () {
        var i, tsid, htmlStr = '<option value="0">All ' + (this.options.sport == 'MMA' ? 'Fights' : 'Games') + '</option>';
        var versusAbbr = (this.options.sport === 'LOL' ? ' v ' : this.options.sport === 'SOC' ? ' vs ' : '@');
        var gamesOrdered = sortGamesToArr(this.games, this.options.sport);
        for (i = 0; i < gamesOrdered.length; i++) {
            tsid = gamesOrdered[i];
            if (this.games.hasOwnProperty(tsid)) {
                htmlStr += '<option value="' + tsid + '">' + this.games[tsid].at + versusAbbr + this.games[tsid].ht + ' ' + moment(this.games[tsid].tz).format(DK.DateFormats.month_day_minute_time) + '</option>';
            }
        }
        $('div.search-available select.game-filter', this.$elem).html(htmlStr);
    },

    renderProbableFilter: function(dataLen) {
        this.probableFilter = false;
        if (dataLen == 0 && (this.options.sport || '').toUpperCase() == 'MLB') {
            $('.foot .prob-filter', this.$elem).html('Probable pitchers not yet available').show();
        }
        else if ((this.options.sport || '').toUpperCase() == 'MLB' && this.selectedPositionFilter == 'P') {
            $('.foot .prob-filter', this.$elem).show();
            this.probableFilter = $('.foot .prob-filter input', this.$elem).is(':checked');
        }
    },

    renderRosterFilter: function () {
        var i, htmlStr = "";
        for (i = 0; i < this.rosterPosArr.length; i++) {
            if (i == 0 && !this.selectedPositionFilter.length) this.selectedPositionFilter = this.rosterPosArr[i];
            htmlStr += '<li data-pn="' + this.rosterPosArr[i] + '">' + this.rosterPosArr[i].toUpperCase() + '</li>';
        }
        if (this.rosterPosArr.length > 1) {
            // if the sport is MLB, add a "Hitters" tab and a "ALL" tab
            if ((this.options.sport || '').toUpperCase() == 'MLB') {
                htmlStr += '<li data-pn="Hitters">Hitters</li>';
            }
            htmlStr += '<li data-pn="All">All</li>';
        }
        $('div.tabs ul', this.$elem).html(htmlStr + '<li data-pn="scoring" class="scoring">Scoring</li>');
        this.positionFilter = this.selectedPositionFilter == 'All' ? [] : this.rosterMap[this.selectedPositionFilter].map;
        $('div.tabs ul li[data-pn="' + this.selectedPositionFilter + '"]', this.$elem).addClass('on');
    },

    registerEvents: function () {
        var self = this;
        $(window).on('dkPlayerPicker.updateGameFilter', function (e, tidArr) {
            $.proxy(self.updateGameFilter, self).call(undefined, tidArr);
        });
        $(window).on('dkPlayerPicker.updateAutoAdvancePosition', function (e, val) {
            $.proxy(self.updateAutoAdvancePosition, self).call(undefined, val);
        });
    },

    attachControlHandlers: function () {
        clog('wiring controls for player picker #' + this.options.lineupId + '.');
        for (var i = 0; i < this.options.controls.length; i++) {
            for (var h in this.options.controls[i].handlers) {
                this.$elem.undelegate(('.controls ' + this.options.controls[i].elem), h).delegate(('.controls ' + this.options.controls[i].elem), h, $.proxy(this.options.controls[i].handlers[h], this));
            }
        }
    },

    attachElementBindings: function () {
        var self = this;
        $('div.player-list', this.$elem).off('click', 'div.slick-cell a.swap').on('click', 'div.slick-cell a.swap', function () { self.controlPlayerSwap($(this).data('pid')); return false; });
        $('div.player-list', this.$elem).off('click', 'div.slick-cell a.pop').on('click', 'div.slick-cell a.pop', function () {
            draftKingsMain.showPlayerPopup($(this), $(this).data('pid'), $(this).data('tsid'), self.options.contestTypeId, (!self.options.multiLineupEdit && self.state().id <= 2));
            return false;
        });
    },

    markInitialPlayersAsUsed: function () {
        if (this.options.hasOwnProperty('initPlayers') && this.options.initPlayers.length > 0) {
            for (var i = 0; i < this.options.initPlayers.length; i++) {
                this.usedPlayers.push(this.options.initPlayers[i].pid);
            }
        }
    },

    markPlayersAsUsed: function (pidArr) {
        this.usedPlayers = this.usedPlayers.concat(pidArr).unique();
        this.remSalary = this.callPeer('getRemainingSalary') || 0;
        this.updateGridFilter();
    },

    markPlayerAsUnused: function (playerId) {
        var idx = $.inArray(playerId, this.usedPlayers);
        if (idx != -1) {
            this.usedPlayers.splice(idx, 1);
            this.remSalary = this.callPeer('getRemainingSalary') || 0;
            this.updateGridFilter();
        }
        return true;
    },

    markAllPlayersAsUnused: function () {
        if (this.usedPlayers.length) {
            this.usedPlayers = [];
            this.remSalary = this.callPeer('getRemainingSalary') || 0;
            this.updateGridFilter();
        }
    },

    gameLookup: function (tsid) {
        return this.games[tsid];
    },

    selectRandomPlayers: function (opts) {
        var remSalary = opts['salaryRemaining'], openRosPos = opts['openRosterPositions'], usedPlayerIds = opts['usedPlayerIds'] || [];
        var i, j, rp, allData, matches, matchesLeft = 0, avgSalary, results = {};
        for (rp in openRosPos) matchesLeft += openRosPos[rp];
        for (rp in openRosPos) {
            allData = this.grid.getData().getItems();
            matches = [];
            for (i = 0; i < allData.length; i++) {
                if (allData[i].IsDisabledFromDrafting) continue;
                if ($.inArray(allData[i]["pn"], this.rosterMap[rp].map) != -1 && !$.trim(allData[i]["i"]).length) matches.push(allData[i]);
            }
            matches.sort(function(a, b) { return a.s < b.s ? 1 : (a.s > b.s ? -1 : 0); });
            for (i = 0; i < openRosPos[rp]; i++) {
                avgSalary = remSalary / matchesLeft;
                for (j = 0; j < matches.length; j++) {
                    if (matches[j].s <= avgSalary && $.inArray(matches[j].pid, usedPlayerIds) == -1) {
                        if (!results.hasOwnProperty(rp)) results[rp] = [];
                        results[rp].push(matches[j]);
                        usedPlayerIds.push(matches[j].pid);
                        matchesLeft -= 1;
                        remSalary -= matches[j].s;
                        break;
                    }
                }
            }
        }
        return results;
    },

    updateGameFilter: function (tidArr) {
        this.gameFilter = tidArr;
        this.updateGridFilter();
    },

    updateAutoAdvancePosition: function (newVal) {
        this.options.autoAdvancePosition = newVal;
        localStorage["dadvance"] = newVal.toString();
    },

    loadScoringTab: function () {
        if (this.isScoringTabLoaded) return;
        var self = this, tab = $('.scoring-panel', this.$elem);
        tab.html('<div style="text-align:center"><p style="margin:20px 0;">Loading, please wait...</p></div>');
        $.get('/help/scoringrules', { sport: this.options.sport }, function (data) {
            self.isScoringTabLoaded = true;
            tab.html(data);
        });
    },

    controlFilterByPosition: function (position) {
        var tabs = $('div.tabs ul li', this.$elem);
        tabs.removeClass('on');
        tabs.filter('[data-pn="' + position + '"]').addClass('on');
        if (position == "scoring") {
            $('.player-list', this.$elem).hide();
            $('.scoring-panel', this.$elem).show();
            this.loadScoringTab();
        } else {
            this.selectedPositionFilter = position;
            // adding filter for "Hitter" for the sport MLB only
            // Hitter includes all position other than 'P'
            if ((this.options.sport || '').toUpperCase() == 'MLB')
            {
                if (position == 'Hitters') {
                    // loop though rosterMap and flatten out the arrays to add to the overall filter
                    var listOfNonPitchers = [];
                    for (var rp in this.rosterMap) {
                        if (rp != 'P') { // don't add the pitcher hash key/objects into the filter array
                            var tempPostionHold = this.rosterMap[rp].map;
                            for (var i = 0; i < tempPostionHold.length; i++) {
                                listOfNonPitchers.push(tempPostionHold[i]);
                            }
                        }
                    }

                    this.positionFilter = listOfNonPitchers;
                }

                else {
                    // if "All" no filter, else filter based on the position
                    this.positionFilter = position == 'All' ? [] : this.rosterMap[position].map;
                }
            } else // all other sports
            {
                this.positionFilter = position == 'All' ? [] : this.rosterMap[position].map;
            }
            if ((this.options.sport || '').toUpperCase() == 'MLB') {
                if (position == 'P') {
                    $('.foot .prob-filter', this.$elem).show();
                    this.probableFilter = $('.foot .prob-filter input', this.$elem).is(':checked');
                } else $('.foot .prob-filter', this.$elem).hide();
            }
            $('.scoring-panel', this.$elem).hide();
            $('.player-list', this.$elem).show();
            this.updateGridFilter();
        }
    },

    controlFilterByPlayerName: function (event) {
        var searchElem = $('div.search input.search-box', this.$elem);
        if (event.which == 27) searchElem.val("");
        this.searchString = searchElem.val().toLowerCase();
        if (this.searchString.length == 1 && !this.options.multiLineupEdit) this.controlFilterByPosition('All');
        else this.updateGridFilter();
    },

    controlClearPlayerFilter: function () {
        $('div.search input.search-box', this.$elem).val("");
        this.searchString = "";
        this.updateGridFilter();
    },

    controlFilterContestType: function () {
        this.options.contestTypeId = $('div.header-right select.contest-type-filter', this.$elem).val();
        this.renderContestStartTimeFilter(this.options.contestTypeId);
    },

    controlFilterByGame: function () {
        var tsid = $('div.search-available select.game-filter', this.$elem).val();
        if (tsid > 0) {
            var game = this.gameLookup(tsid);
            this.updateGameFilter([game.atid, game.htid]);
        } else {
            this.updateGameFilter([]);
        }
    },

    controlFilterContestStartTime: function () {
        var sigId = $('div.search-available select.start-time-filter', this.$elem).val();
        this.reloadGridByContestSig(sigId);
    },

    controlFilterByProbable: function () {
        this.probableFilter = $('.foot .prob-filter input', this.$elem).is(':checked');
        this.updateGridFilter();
    },

    controlPlayerSwap: function (playerId, teamSchedId, autoAdv, ignorePosSel) {
        if (this.options.multiLineupEdit) return false; // no-op, rely on grid selection model
        var player = $.extend(true, {}, this.dataView.getItemById(playerId));
        player.rpid = this.selectedPositionFilter.toUpperCase() != "ALL" && ignorePosSel !== false ? this.selectedPositionFilter : undefined;
        var swapResult = this.callPeer('addPlayer', player);
        if (swapResult.success) {
            this.remSalary = this.callPeer('getRemainingSalary') || 0;
            if ($.inArray(playerId, this.usedPlayers) == -1) {
                this.usedPlayers.push(playerId);
                this.controlClearPlayerFilter();
                if ((autoAdv !== undefined ? autoAdv : this.options.autoAdvancePosition) === true &&
                    this.selectedPositionFilter != 'All' &&
                    swapResult.nextOpenRosterPosition.length) {
                    this.controlFilterByPosition(swapResult.nextOpenRosterPosition);
                }
            } else if (this.searchString.length) {
                this.controlClearPlayerFilter();
            }
        } else {
            lineupModManager.getInstance().broadcastLineupConstructionErrors(swapResult.errors);
            alert(swapResult.errors.join('\n'));
        }
        return swapResult;
    },

    connectRealtime: function () {
    }
};
