<?php

$number = $_POST['number'];
$message = $_POST['message'];

$postFields = [
	'To' => $number,
	'From' => '+441133202458',
	'Body' => $message
];

$ch = curl_init('https://api.twilio.com/2010-04-01/Accounts/AC01dc7add70509c6f669a54de6bf1f7cf/Messages.json');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postFields));
curl_setopt($ch, CURLOPT_USERPWD, 'AC01dc7add70509c6f669a54de6bf1f7cf:***REMOVED***');
curl_exec($ch);