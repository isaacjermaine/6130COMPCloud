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
echo "back: ";
if ($_GET["make"] == "get_players") {
    //get_players();
    $pluz = file('playerbase.txt');
    foreach($pluz as $pl){
        echo $pl;
    }
}
if ($_GET["make"] == "send_choice") {
    echo "send choice: processing choice";
    $name = urldecode($_GET["name"]);
    $email = urldecode($_GET["email"]);
    $address = urldecode($_GET["address"]);
    $player = urldecode($_GET["player"]);
    $promocode = urldecode($_GET["promocode"]);
    echo $name;
    echo $email;
    echo $address;
    echo $player;
    echo $promocode;
}
?>