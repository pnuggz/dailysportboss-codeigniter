/**
 * Created by RIZZ-ASUS on 15/05/2016.
 */
$(function(){
    $(document).ready(function(){
        var template = _.template($('#postTemplate').html())
        var itemsPerPage = 3
        var currentLinkNumber = 1

        $('.previousLink').on('click', function() {
            var pageLinks = $('.pageLinks li')
            currentLinkNumber--

            if(currentLinkNumber == 0) {
                currentLinkNumber = pageLinks.length
            }

            var previousLink = pageLinks.filter('.activeLink').prev()
            if(previousLink.length == 0) {
                previousLink = pageLinks.last()
            }

            previousLink.trigger('click')
        })

        $('.nextlink').on('click', function(){
            var pageLinks = $('.pageLinks li')
            currentLinkNumber++

            if(currentLinkNumber > pageLinks.length) {
                currentLinkNumber = 1
            }

            var nextLink = pageLinks.filter('.activeLink').next()
            if(nextLink.length == 0) {
                nextLink = pageLinks.first()
            }

            nextLink.trigger('click')
        })

        function loadPosts(url)
        {
            if(typeof url == 'undefined') {
                url = 'http://localhost/dailyfantasy/index.php/contests_entry/get_fake_data?page=1&items_per_page='+itemsPerPage
            }

            $.ajax({
                dataType: "json",
                url: url,
                type: "GET",
                success: function (data) {
                    $('.loading').hide()

                    var resultingString = template({posts: data.posts})
                    var pageLinks = $('.pageLinks ul')

                    pageLinks.html('')

                    $('.posts').html(resultingString).show()

                    for(var index=1, length = Math.ceil(data.total_posts / itemsPerPage); index <= length; index++) {
                        var link = $('<li>', { dataUrl: 'http://localhost/dailyfantasy/index.php/contests_entry/get_fake_data?page='+index+'&items_per_page='+itemsPerPage}).on('click', function() {
                            var dataUrl = $(this).attr('dataUrl')

                            console.log(dataUrl)

                            $('.posts').html(resultingString).hide()

                            $('.loading').show()

                            currentLinkNumber = $(this).text()

                            loadPosts(dataUrl)
                        }).text(index).appendTo(pageLinks)

                        if(index == currentLinkNumber) {
                            link.addClass('activeLink')
                            link.siblings().removeClass('activeLink')
                        }
                    }
                }
            })
        }
        loadPosts()
    })
})