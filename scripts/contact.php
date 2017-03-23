<?php
session_start();
echo $_SESSION['securitytoken'];
echo '<br>';
echo $_POST['token'];
    if (isset($_POST['submit']))

    {
      if (isset($_SESSION['securitytoken']) && $_POST['token'] == $_SESSION['securitytoken'])
        {

          $name = check_input($_POST["name"]);
            $email = check_input($_POST["emailaddress"]);
            $message = check_input($_POST["message"]);
            $ForwardTo = 'nathan.bateman.jr@gmail.com';
            $details='Name: '.$name."\n".'Email: '.$email."\n".'Message: '.$message."\n";

            //do stuff
            mail($ForwardTo,"Construction of Hope Contact",$details,"From:$email");


          }
      }

  function check_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>