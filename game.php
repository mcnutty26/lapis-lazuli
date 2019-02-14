<?php
$db = json_decode(file_get_contents("./testdb.json"), TRUE);
$id = $_POST['id'];
$game = $db[$id];

$current_player = '';
foreach ($game['players'] as $player) {if (md5($player . $game['name']) == $_POST['rc']) $current_player = $player;}
if ($current_player == '') header('Location: index.php');

//check for row/board being set
//check legality
//check turn
//advance turn
//write board state
?>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/tiles.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>

    <title>Lapis Lazuli</title>
</head>

<body>

<h1>Game: <?=$game['name']?></h1>

<h2>Central Board</h2>
<table>
    <?php $counter = 0;
    foreach ($game['central-board'] as $cboard) {

        echo "<tr><td>";

        $tiles = str_split($cboard);
        foreach ($tiles as $tile) {
            echo "<div class='" . $tile . "'></div>";
        }

        echo "</td>";

        if ($game['turn'] == $current_player) {
            echo "<td><form action='game.php' method='post'><input type='hidden' name='id' value='" . $_POST['id'] . "'><input type='hidden' name='rc' value='" . $_POST['rc'] . "'><input type='hidden' name='board' value='" . $counter . "'><input type='hidden' name='row' value='1'><input value='Slot 1' type='submit'></form></td>";
            echo "<td><form action='game.php' method='post'><input type='hidden' name='id' value='" . $_POST['id'] . "'><input type='hidden' name='rc' value='" . $_POST['rc'] . "'><input type='hidden' name='board' value='" . $counter . "'><input type='hidden' name='row' value='2'><input value='Slot 2' type='submit'></form></td>";
            echo "<td><form action='game.php' method='post'><input type='hidden' name='id' value='" . $_POST['id'] . "'><input type='hidden' name='rc' value='" . $_POST['rc'] . "'><input type='hidden' name='board' value='" . $counter . "'><input type='hidden' name='row' value='3'><input value='Slot 3' type='submit'></form></td>";
            echo "<td><form action='game.php' method='post'><input type='hidden' name='id' value='" . $_POST['id'] . "'><input type='hidden' name='rc' value='" . $_POST['rc'] . "'><input type='hidden' name='board' value='" . $counter . "'><input type='hidden' name='row' value='4'><input value='Slot 4' type='submit'></form></td>";
            echo "<td><form action='game.php' method='post'><input type='hidden' name='id' value='" . $_POST['id'] . "'><input type='hidden' name='rc' value='" . $_POST['rc'] . "'><input type='hidden' name='board' value='" . $counter . "'><input type='hidden' name='row' value='5'><input value='Slot 5' type='submit'></form></td>";
        }

        echo "</tr>";

        $counter++;
    } ?>
</table>

<h2>Player Boards</h2>
<?php foreach ($game['player-boards'] as $pboard) {
    echo "<div class='" . ($pboard['owner'] == $current_player ? 'player' : 'current_player') . "'>";
    echo "<h4>" . $pboard['owner'] . "</h4>";
    echo "<table>";

    //row1
    echo "<tr><td>1</td><td>";
    $tiles = str_split($pboard['r1']);
    foreach ($tiles as $tile) {echo "<div class='" . $tile . "'></div>";}
    echo "</td></tr>";

    //row2
    echo "<tr><td>2</td><td>";
    $tiles = str_split($pboard['r2']);
    foreach ($tiles as $tile) {echo "<div class='" . $tile . "'></div>";}
    echo "</td></tr>";

    //row3
    echo "<tr><td>3</td><td>";
    $tiles = str_split($pboard['r3']);
    foreach ($tiles as $tile) {echo "<div class='" . $tile . "'></div>";}
    echo "</td></tr>";

    //row4
    echo "<tr><td>4</td><td>";
    $tiles = str_split($pboard['r4']);
    foreach ($tiles as $tile) {echo "<div class='" . $tile . "'></div>";}
    echo "</td></tr>";

    //row5
    echo "<tr><td>5</td><td>";
    $tiles = str_split($pboard['r5']);
    foreach ($tiles as $tile) {echo "<div class='" . $tile . "'></div>";}
    echo "</td></tr>";

    echo "</table><table>";

    //grid1
    echo "<tr><td>1</td><td>";
    $tiles = str_split($pboard['g1']);
    foreach ($tiles as $tile) {echo "<div class='" . $tile . "'></div>";}
    echo "</td></tr>";

    //grid2
    echo "<tr><td>2</td><td>";
    $tiles = str_split($pboard['g2']);
    foreach ($tiles as $tile) {echo "<div class='" . $tile . "'></div>";}
    echo "</td></tr>";

    //grid3
    echo "<tr><td>3</td><td>";
    $tiles = str_split($pboard['g3']);
    foreach ($tiles as $tile) {echo "<div class='" . $tile . "'></div>";}
    echo "</td></tr>";

    //grid4
    echo "<tr><td>4</td><td>";
    $tiles = str_split($pboard['g4']);
    foreach ($tiles as $tile) {echo "<div class='" . $tile . "'></div>";}
    echo "</td></tr>";

    //grid5
    echo "<tr><td>5</td><td>";
    $tiles = str_split($pboard['g5']);
    foreach ($tiles as $tile) {echo "<div class='" . $tile . "'></div>";}
    echo "</td></tr>";

    echo "</table></div>";


}
?>
<div class="board">
</div>



</body>
