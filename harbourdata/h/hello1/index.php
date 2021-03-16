<?php



require 'PHPMailer/PHPMailerAutoload.php';





date_default_timezone_set("Asia/Kolkata");







$current_date_time=date("Y-m-d H:i:s");



function smtpmailer($to, $from, $from_name,$reply,$reply_name, $subject, $body){

    $mail = new PHPMailer;

    /*

$mail->CharSet = 'UTF-8';

$mail->isSMTP(); 

//$mail ->SMTPSecure = 'ssl'; 

$mail->SMTPSecure = 'ssl'; 

$mail->SMTPOptions = array(

    'ssl' => array(

        'verify_peer' => false,

        'verify_peer_name' => false,

        'allow_self_signed' => true

    )

);                                    // Set mailer to use SMTP

$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers

$mail->SMTPAuth = true;                               // Enable SMTP authentication

$mail->Username = 'sathwik02.ram@gmail.com';                 // SMTP username

$mail->Password = 'Ramkumar02@';                           // SMTP password

 

$mail->Port = 465;                          // Enable encryption, 'ssl' also accepted

$mail->IsHTML(true);

*/

$mail->CharSet = 'UTF-8';

$mail->isSMTP();                                      // Set mailer to use SMTP

$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers

$mail->SMTPAuth = true;                               // Enable SMTP authentication

$mail->Username = 'sriram@pidatacenters.com';                 // SMTP username

$mail->Password = 'Sathwik02@';                           // SMTP password

$mail->SMTPSecure = 'tls';  

$mail->Port = 587;                          // Enable encryption, 'ssl' also accepted

$mail->IsHTML(true);



$mail->SMTPDebug  = 2;



$mail->From = $from;

$mail->FromName =  $from_name;

//$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient

$mail->addAddress($to);               // Name is optional

$mail->addReplyTo($reply, $reply_name);

//$mail->addCC('sathwik02.ram@gmail.com');

//$mail->addBCC('bcc@example.com');



$mail->WordWrap = 100;                                 // Set word wrap to 50 characters

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments

//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

$mail->isHTML(true);                                  // Set email format to HTML



$mail->Subject = $subject;

$mail->Body    = $body;

//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';



if(!$mail->send()) {

    echo 'Message could not be sent.';

    echo 'Mailer Error: ' . $mail->ErrorInfo;

} else {

    echo 'Message has been sent';

}

}

$body="hi";

$subject = "Profile Changes @Pi";



	$from = 'sathwik02.ram@gmail.com';

	$from_name = 'Registration @Pi';

	$reply = 'info@pidatacenters.com/';

	$reply_name = 'Info Pi';

	$to = 'sathwik02.ram@gmail.com';



	smtpmailer($to, $from, $from_name,$reply,$reply_name, $subject, $body);

?>