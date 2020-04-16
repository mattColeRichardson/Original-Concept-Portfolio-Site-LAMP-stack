<?php
require_once "Mail.php";

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$from = "Website@mattr.codes";
$to = 'me@mattr.codes';

$host = "ssl://mail.name.com";
$port = "465";
$username = 'me@mattr.codes';
$password = 'Evaluate1!';

$subject = "Website Contact Form IMPORTANT";
$body = "Name: ".$name." Email: ".$email." Phone Number: ".$phone." Their message: ".$message;

$headers = array ('From' => $from, 'To' => $to,'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'port' => $port,
    'auth' => true,
    'username' => $username,
    'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
  echo($mail->getMessage());
} else {
  echo("Message successfully sent!\n");
}
?>
