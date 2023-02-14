<html>
<body>

<h1>Front</h1>

<p>Please select your favourite footballer, and fill in various bitssssss</p>

<form action="/form.php" method=”get”>
  <label for="footballers">Choose a footballer:</label>
  <select name="footballers" id="footballers">
    <option value="Nunes">Nunes</option>
    <option value="Tsunoda">Tsunoda</option>
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