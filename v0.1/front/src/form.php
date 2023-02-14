<?php
$contents = file_get_contents('http://172.17.0.1:84/back.php?make='.$_GET["player"]);
echo "page returned by container 1 <hr>";
echo $contents;
?>