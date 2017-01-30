<?php 

$entry_email = $_POST['email'];
$entry_name = $_POST['name'];
$entry_message = $_POST['message'];

$to = "Guilherme Parmezani <guilherme@parmezani.com>, Guilherme <g.parmezani@gmail.com>";
$subject = "Website Inquiry.";
$txt = "Entry value: " . $entry_message;
$headers = "From: Parmezani <info@parmezani.com>";

mail($to,$subject,$txt,$headers);

echo 'success';
die();