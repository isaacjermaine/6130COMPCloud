<?php
require 'vendor/autoload.php';
$client = new MongoDB\Client(
    'mongodb://root:snow@172.17.0.1:27017'
);
function get_footballers(){
    $collection = $client->crisp->footballers;
    $cursor = $collection->find();
    foreach ($cursor as $document) {
        echo $document['_id'] . " " . $document['name'] . "<br>";
    }
}

function set_favourite($user, $favourite, $code){
    $collection = $client->crisp->users;
    #write to db
}

if ($_GET["get_footballers"]) {
    get_footballers();
}
if ($_GET["set_footballers"]) {
    set_footballers();
}
?>