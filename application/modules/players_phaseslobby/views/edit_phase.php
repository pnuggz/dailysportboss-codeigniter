<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 22/04/2016
 * Time: 6:01 PM
 */
?>

<?php
foreach($player_phase->result() as $row) {
    $id = $row->id;
    $start_date = $row->start_date;
    $end_date = $row->end_date;
    $height = $row->height;
    $weight = $row->weight;
    $position = $row->position;
    $number = $row->number;
    $depth_chart = $row->depth_chart;
    ?>

    <h1>Edit Player Phase</h1>

    <?php
    echo validation_errors("<p style='color: red;'>", "</p>");
    ?>

    <?php
    echo form_open('players_phases/edit/' . $id . '/');

    echo "<br>";
    echo "<br>";

    echo "Player";
    echo "<br>";
    foreach ($player_selected->result() as $row) {
        $player_id = $row->id;
        $player_last_name = $row->last_name;
        $player_first_name = $row->first_name;

        echo $player_last_name; ?>, <?php echo $player_first_name;

        $data = array('players_id' => $player_id
        );
        echo form_hidden($data);
    }
    echo "<br>";
    echo "<br>";

    echo "League Name";
    echo "<br>";
    foreach ($league_selected->result() as $row) {
        $league_id = $row->id;
        $league_name = $row->league_name;

        echo $league_name;

        $data = array('leagues_id' => $league_id
        );
        echo form_hidden($data);
    }
    echo "<br>";
    echo "<br>";

    echo "Team Name";
    echo "<br>";
    foreach ($team_phase_selected->result() as $row) {
        $team_phase_id = $row->id;
        $team_name = $row->team_name;

        echo $team_name;

        $data = array('teams_phases_id' => $team_phase_id
        );
        echo form_hidden($data);
    }
    echo "<br>";
    echo "<br>";

    echo "Height";
    echo "<br>";
    $data = array(  'name'          =>      'height',
        'value'         =>      $height,
    );
    echo form_input($data);
    echo "<br>";
    echo "<br>";

    echo "Weight";
    echo "<br>";
    $data = array(  'name'          =>      'weight',
        'value'         =>      $weight,
    );
    echo form_input($data);
    echo "<br>";
    echo "<br>";

    echo "Position";
    echo "<br>";
    $data = array(  'name'          =>      'position',
        'value'         =>      $position,
    );
    echo form_input($data);
    echo "<br>";
    echo "<br>";

    echo "Number";
    echo "<br>";
    $data = array(  'name'          =>      'number',
        'value'         =>      $number,
    );
    echo form_input($data);
    echo "<br>";
    echo "<br>";

    echo "Depth Chart";
    echo "<br>";
    $data = array(  'name'          =>      'depth_chart',
        'value'         =>      $depth_chart,
    );
    echo form_input($data);
    echo "<br>";
    echo "<br>";

    echo "Start Date";
    echo "<br>";
    ?> <input value="<?php echo $start_date; ?>" type="date" name="start_date"> <?php
    echo "<br>";
    echo "<br>";

    echo "End Date";
    echo "<br>";
    ?> <input value="<?php echo $end_date; ?>" type="date" name="end_date"> <?php
    echo "<br>";
    echo "<br>";

    $data = array(  'value'         =>      'Edit Player Phase',
        'name'          =>      'submit',
        'class'         =>      'submit-btn',
    );
    echo form_submit($data);

    echo form_close();

} ?>


