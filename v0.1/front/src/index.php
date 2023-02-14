<html>
<body>

<?php
$players = file('http://172.17.0.1:84/back.php?make='.GET["get_footballers"]);
?>

<h1>Front</h1>

<p>Please select your favourite footballer, and fill in various bitssssss</p>

<form action="/form.php" method=”get”>
  <label for="footballers">Choose a footballer:</label>
  <select name="footballers" id="footballers">
    <?php
    foreach ($players as $player){
        echo $player;
        $player_name = explode(" ", $player)[0];
        echo "<option value=".$player_name.">".$player_name."</option>"
    }
    ?>
  </select>
  <br><br>
  <label for="the_number">Promotional Number:</label>
  <input name="the_number" id="the_number"></input>
  <br><br>
  <input type="submit" value="Submit">
</form>

<p>Click the "Submit" button to send the data back to somewhere</p>

</body>
</html>