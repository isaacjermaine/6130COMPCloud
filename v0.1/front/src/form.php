<?php
$full_string = 'http://172.17.0.1:84/back.php?make=send_choice&name='.urlencode($_GET["name"]).
'&email='.urlencode($_GET["email"]).
'&address='.urlencode($_GET["address"]).
'&player='.urlencode($_GET["player"]).
'&promocode='.urlencode($_GET["promocode"]);

echo $full_string;

$contents = file_get_contents($full_string);

echo "page returned by container 1 <hr>";
echo $contents;
?>