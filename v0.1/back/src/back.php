<?php
require 'vendor/autoload.php';
$client = new MongoDB\Client(
    'mongodb://root:snow@172.17.0.1:27017'
);
function get_players(){
    $collection = $client->crisp->players;
    $cursor = $collection->find();
    foreach ($cursor as $document) {
        echo $document['_id'] . " " . $document['name'] . "<br>";
    }
}

function set_favourite($user, $favourite, $code){
    $collection = $client->crisp->users;
    #write to db
}

if ($_GET["make"] == "get_players") {
    get_players();
}
if ($_GET["make"] == "send_choice") {
    set_footballers();
}
?>