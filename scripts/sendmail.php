<?php
$ForwardTo="nathan.bateman.jr@gmail.com";
$email=$_REQUEST['emailaddress'];
$name=$_REQUEST["name"];
$message=$_REQUEST["message"];
$details='Name: '.$name."\n"
.'Email: '.$email."\n"
.'Message: '.$message."\n";
mail($ForwardTo,"Subscription Request",$details,"From:$email");
header("Location: http://www.virtualmechanics.com/support/tutorials-spinnerpro/ThankYou.html");
// define variables and set to empty values
$name = $email = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["emailaddress"]);
  $message = test_input($_POST["message"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>


