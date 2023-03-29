<html>
<body>

<?php
$players = file('http://172.17.0.1:84/back.php?make=get_players');
?>

<h1>Front</h1>

<p>Please enter your details, select your favourite football player, and enter the code from your bag:</p>

<form action="/form.php" method=”get”>
    <label for="name">Your name:</label>
    <input name="name" id="name"></input>
    <br><br>
    <label for="email">Your email:</label>
    <input name="email" id="email"></input>
    <br><br>
    <label for="address">Your address:</label>
    <input name="address" id="address"></input>
    <br><br>
    <label for="player">Select a football player:</label>
    <select name="player" id="player">
        <?php
        foreach ($players as $player){
            $player_name = explode(" ", $player)[0];
            echo "<option value=".$player.">".$player."</option>";
        };
        ?>
    </select>
    <br><br>
    <label for="promocode">Bag Code:</label>
    <input name="promocode" id="promocode"></input>
    <br><br>
    <input type="submit" value="Submit">
</form>

<p>Click the "Submit" button when you're finished</p>

</body>
</html>