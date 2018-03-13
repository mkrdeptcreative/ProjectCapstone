<?php

//send_mail.php

if(isset($_POST['email_data']))
{
require 'PHPMailerAutoload.php';
  require 'class.phpmailer.php';
  require 'class.smtp.php';
  require 'class.phpmaileroauth.php';
  require 'class.phpmaileroauthgoogle.php';
  require 'class.pop3.php';
 $output = '';
 foreach($_POST['email_data'] as $row)
 {
  $mail = new PHPMailer;
  $mail->IsSMTP();        //Sets Mailer to send message using SMTP
  $mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
  $mail->Port = '25';        //Sets the default SMTP server port
  $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
  $mail->Username = 'mnjlkrishnan@gmail.com';     //Sets SMTP username
  $mail->Password = 'kr@dept12';     //Sets SMTP password
  $mail->SMTPSecure = '';       //Sets connection prefix. Options are "", "ssl" or "tls"
  $mail->From = 'mnjlkrishnan@gmail.com';   //Sets the From email address for the message
  $mail->FromName = 'Manjula';     //Sets the From name of the message
  $mail->AddAddress($row["email"], $row["name"]); //Adds a "To" address
  $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
  $mail->IsHTML(true);       //Sets message type to HTML
  $mail->Subject = 'welcome to php mailer bulk email'; //Sets the Subject of the message
  //An HTML or plain text message body
  $mail->Body = '
  <p>welcome</p>
  
  ';

  $mail->AltBody = '';

  $result = $mail->Send();      //Send an Email. Return true on success or false on error

  if($result["code"] == '400')
  {
   $output .= html_entity_decode($result['full_error']);
  }

 }
 if($output == '')
 {
  echo 'ok';
 }
 else
 {
  echo $output;
 }
}

?>