<?php
require_once '../twilio-php-master/src/Twilio/autoload.php';
use Twilio\Rest\Client;

// Your Account Sid and Auth Token from twilio.com/user/account
$sid = "ACe6652f8a9286303bd4447792c4f796c2";
$token = "236748fe38136b3a35f827d514561ec5";
$twilio = new Client($sid, $token);

$message = $twilio->messages
                  ->create("whatsapp:+573156332247", // to
                           [
                               "from" => "whatsapp:+14155238886",
                               "body" => "Holaaaa munnddooooo!"
                           ]
                  );

print($message->sid);
