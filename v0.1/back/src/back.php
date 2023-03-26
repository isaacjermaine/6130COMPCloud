<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

require 'vendor/autoload.php';
//'mongodb://root:snow@172.17.0.1:27017'
echo "back: connecting to database...\n";

try {
    $client = new MongoDB\Client(
        'mongodb://mongo1:27017,mongo2:27017,mongo3:27017/admin?replicaSet=rs0'
    );
} catch (MongoConnectionException $e) {
    die('Error connecting to MongoDB server');
} catch (MongoException $e) {
    die('Error: ' . $e->getMessage());
} catch (Exception $e) {
    die('General Error: ' . $e);
}

function get_players(){
    global $client;
    echo "getting players...";
    $collection = $client->crisp->players;
    $cursor = $collection->find();
    foreach ($cursor as $document) {
        echo $document;
        echo $document['_id'] . " " . $document['name'] . "<br>";
    }
}

function set_favourite($user, $favourite, $code){
    global $client;
    $collection = $client->crisp->users;
    #write to db
}

function get_user($email){
    global $client;
    $collection = $client->crisp->users;
    $found = $collection->findOne(['email' => $email]);
    if (is_null($found)){
        return false;
    }
    return $found;
}

function create_user($name, $email, $address, $favourite){
    #checks to see if user already exists, if so attempts to create user, returns true
    #else returns false (user already exists, or attempt to create user failed)
    global $client;
    $collection = $client->crisp->users;
    $user = get_user($email);
    if (!$user){
        #create user
        $inserted = $collection->insertOne(['name' => $name, 'email' => $email, 'address' => $address, 'favourite' => $favourite]);
        return $inserted->isAcknowledged();
    }
    else {
        return false;
    }
}

function update_user($name, $email, $address, $favourite){
    #updates a user's information and favourite, searched by email
    global $client;
    $collection = $client->crisp->users;
    $user = get_user($email);
    if (!$user){
        #update user
        $updated = $collection->updateOne(['email' => $email], ['name' => $name,'address' => $address, 'favourite' => $favourite]);
        return $updated->isAcknowledged();
    }
    else {
        return false;
    }
}

function check_code($code){
    #if code exists:
    #   if code is taken: return false
    #   if code not taken: return voucher
    #if code doesn't exist: return false
    global $client;
    $collection = $client->crisp->codes;
    $found = $collection->findOne(['code' => $code]);
    if (!is_null($found)){
        if ($found->taken == 0){
            return $found;
            //return(true);
        }
    }
    return(false);
}

function use_code($code){
    #checks to see if code is available
    #if so, set code as unavailable, return acknowledgement
    #else, return false
    global $client;
    $collection = $client->crisp->code;
    $result = check_code($code);
    if ($result){
        #set code as used
        $updated = $collection->updateOne(['code' => $code], ['taken' => 1]);
        if ($updated->isAcknowledged()){
            return $result->voucher;
        }
    }
    else {
        return false;
    }
}

echo "back: ";
if ($_GET["make"] == "get_players") {
    get_players();
    /*
    $pluz = file('playerbase.txt');
    foreach($pluz as $pl){
        echo $pl;
    }
    */
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
    #uniqueness of user enforced by email
    #if user doesn't exist
    #   if code is available
    #       create user
    #       return voucher of code
    #   else
    #       create user
    #       return 'code used'
    #else
    #   if code is available
    #       update user choice
    #       return voucher of code
    #   else
    #       update user choice
    #       return 'code used'
    $user = get_user($email);
    $code = check_code($promocode);
    if (!$user){
        $was_inserted = create_user($name, $email, $address, $favourite);
        if ($code){
            $voucher = use_code($promocode);
            echo $voucher;
        }
        else {
            echo "invalid voucher";
        }
    }
    else {
        $was_updated = update_user($name, $email, $address, $player);
        if ($code){
            $voucher = use_code($promocode);
            echo $voucher;
        }
        else {
            echo "invalid voucher";
        }
    }
}
?>
