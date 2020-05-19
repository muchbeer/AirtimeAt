<?php
require 'vendor/autoload.php';
use AfricasTalking\SDK\AfricasTalking;

	function sendMessage() {
// Set your app credentials
$username   = "sandbox";
$apiKey     = "ffb2a79943d047835bc6027b9ba3074bee16ef5423c284a4c48cbc64710bbe9d";


$input_phoneNumber = $_POST["edt_phone_number"];
$input_message = $_POST["edt_message"];

// Initialize the SDKAfricasTalking// Initialize the SDK
//SandBox api: ffb2a79943d047835bc6027b9ba3074bee16ef5423c284a4c48cbc64710bbe9d
//Live api: 610a5bdd052043f57
$AT         = new AfricasTalking($username, $apiKey);

// Get the SMS service
$sms        = $AT->sms();

// Set the numbers you want to send to in international format
$recipients = $input_phoneNumber;

// Set your message
$message    = $input_message;

// Set your shortCode or senderId for sandbox
$from       = "TBCDA";

//default live sender ID
//$from       = "AFRICASTKNG";

try {
    // Thats it, hit send and we'll take care of the rest
    $result = $sms->send([
        'to'      => $recipients,
        'message' => $message,
        'from'    => $from
    ]);

   // print_r($result);
} catch (Exception $e) {
    $e->getMessage();
}
		return array($message, $recipients, $result);
	}
	
	 /*  the values of the parameters will be the values of the returned array
        in the previous function */
    function displayResults( $xMessage, $yNumber , $zResult) {
        
         echo "<strong class='text_danger'>The message $xMessage has been successfull sent to </strong>".ucwords($yNumber)."<hr><br>";

         echo "<strong class='text-success'>Dump Results is: </strong><br>";
         echo '<pre>'; print_r($zResult); echo '</pre>';
       
    }
	
	
?>