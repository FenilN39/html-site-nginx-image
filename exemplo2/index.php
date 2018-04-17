
<?php

// 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
// j-tnWo2-TwOBnsauGHc4oA

require("sendgrid-php/sendgrid-php.php");

$from = new SendGrid\Email("Gustavo Costa", "gusbemacbe@gmail.com");
$subject = "Sending with SendGrid is Fun";
$to = new SendGrid\Email("Presiência Atlética UNISAL", "presidencia@atleticaunisal.com.br");
$content = new SendGrid\Content("text/html", "and easy to do anywhere, even with PHP");

$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = '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';
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
// echo $response->statusCode();
// print_r($response->headers());
echo $response->body();
