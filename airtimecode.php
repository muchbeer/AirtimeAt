<?php 

// require SDK here
require 'vendor/autoload.php';
use AfricasTalking\SDK\AfricasTalking;

   function airtimeTopUp() {
// Set your app credentials
$username = "muchbeerx";
$apiKey   = "610a5bdd052043f579f34534542dd16457549235a9a659c27c861aa06ab90957";

       
$input_phoneNumber = $_POST["edt_phone_number"];
$input_amount = $_POST["edt_amount"];

       
// Initialize the SDK
//SandBox api: ffb2a79943d047835bc6027b9ba3074bee16ef5423c284a4c48cbc64710bbe9d
//Live api: 610a5bdd052043f579f34534542dd16457549235a9a659c27c861aa06ab90957
//Live username: muchbeerx
$AT       = new AfricasTalking($username, $apiKey);

//Get the airtime service
$airtime  = $AT->airtime();

// Set the phone number, currency code and amount
       
       $recipients = [[
    "phoneNumber"  =>$input_phoneNumber,
    "currencyCode" => "TZS",
    "amount"       => $input_amount
]];

// That's it, hit send and we'll take care of the rest
try {
    $results = $airtime->send([
        "recipients" => $recipients
    ]);
    
   print_r($results);
} catch(Exception $e) {
     $e->getMessage();
  //  echo "Error: ".$e->getMessage();
}
       return array($results, $input_phoneNumber, $input_amount);
   }


    /*  the values of the parameters will be the values of the returned array
        in the previous function */
    function displayResults( $xResult, $yNumber, $zAmount ) {
        
         echo "<strong class='text_danger'>The top up of $zAmount TSH has been successfull sent to </strong>".ucwords($yNumber)."<hr><br>";

         echo "<strong class='text-success'>Dump Results is: </strong><br>";
      
         echo '<pre>';  print_r($xResult); echo '</pre>';
                    
    
    }
?>