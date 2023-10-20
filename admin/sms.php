<?php
// Include the bundled autoload from the Twilio PHP Helper Library
require '../vendor/autoload.php';
use Twilio\Rest\Client;

$dotenv = Dotenv\Dotenv::createImmutable("../");
$dotenv->load();
// Your Account SID and Auth Token from twilio.com/console
// To set up environmental variables, see http://twil.io/secure
$account_sid = $_ENV['TWILIO_ACCOUNT_SID'];
$auth_token = $_ENV['TWILIO_AUTH_TOKEN'];
$twilio_number = $_ENV['TWILIO_NUMBER'];
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]
// A Twilio number you own with SMS capabilities
$message = $statusMessage;
$sendTo = $ptel;
$client = new Client($account_sid, $auth_token);
$client->messages->create(
    // Where to send a text message (your cell phone?)
    $sendTo,
    array(
        'from' => $twilio_number,
        'body' => $message
    )
);