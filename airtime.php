<?php
// require SDK here
require 'vendor/autoload.php';
use AfricasTalking\SDK\AfricasTalking;

// Set your app credentials
$username = "muchbeerx2";
$apiKey   = "610a5bdd052043f579f34534542dd16457549235a9a659c27c861aa06ab90957";

// Initialize the SDK
//SandBox api: ffb2a79943d047835bc6027b9ba3074bee16ef5423c284a4c48cbc64710bbe9d
//Live api: 610a5bdd052043f579f34534542dd16457549235a9a659c27c861aa06ab90957
//username: muchbeerx
$AT       = new AfricasTalking($username, $apiKey);

//Get the airtime service
$airtime  = $AT->airtime();

// Set the phone number, currency code and amount
$recipients = [[
    "phoneNumber"  => "255629633162",
    "currencyCode" => "TZS",
    "amount"       => "1500"
]];

// That's it, hit send and we'll take care of the rest
try {
    $results = $airtime->send([
        "recipients" => $recipients
    ]);
    print_r($results);
} catch(Exception $e) {
    echo "Error: ".$e->getMessage();
}
?>
