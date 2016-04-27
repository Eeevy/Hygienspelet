<?php


$from = 'Demo contact form <demo@domain.com>';
$sendTo = 'Demo contact form <hygienspelet@gmail.com>';
$subject = 'New message from contact form';
$fields = array('picture' => 'Bild-URL', 'question' => 'Frågebeskrivning', 'answer1' => 'Svar1', 'answer2' => 'Svar2',
    'answer3' => 'Svar3','answer4' => 'Svar4', 'correctAnswer' => 'Rätt svar');
// array variable name => Text to appear in email
$okMessage = 'Contact form succesfully submitted. Thank you, I will get back to you soon!';
$errorMessage = 'There was an error while submitting the form. Please try again later';

// let's do the sending

try
{
    $emailText = "You have new message from contact form\n=============================\n";

    foreach ($_POST as $key => $value) {

        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n";
        }
    }

    mail($sendTo, $subject, $emailText, "From: " . $from);

    $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}
else {
    echo $responseArray['message'];
}