<?php
$db = json_decode(file_get_contents("./testdb.json"), TRUE);
?>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>

    <title>Lapis Lazuli</title>
</head>
<body>

<h1>Lapis Lazuli</h1>

<h2>Continue a game in progress</h2>
<table border="1px 1px 1px 1px">
    <tr><td>Name</td><td>Players</td><td>Room Code</td><td>Join</td></tr>
    <?php foreach ($db as $game) {
        $players = "";
        foreach ($game["players"] as $player) {
            if (strlen($players) > 0) $players .= ', ';
            $players .= $player;}
        echo "<tr><form method='post' action='/game.php'><input type='hidden' name='id' value='" . $game['id'] . "'><td>" . $game["name"] . "</td><td>" . $players . "</td><td><input name='rc' type='text'></td><td><input type='submit' value='Join'></td></form></tr></tr>";
    } ?>
</table>

<h2>Start a new game</h2>
<form action="/new.php" method="post">
    <input type="submit" value="New Game">
</form>

<p><?=md5('mcnutty' . 'CS weekly')?></p>

</body>
