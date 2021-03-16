<?php
include('PHPMailer/PHPMailerAutoload.php');
function mail3(){
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 587; //465 or 587
$mail->IsHTML(true);
$mail->Username = "sales@pidatacenters.com";
$mail->Password = "Hyderabad";
$mail->SetFrom("sriram@pidatacenters.com");
$mail->Subject = "Test";
$mail->Body = "hello";
$mail->AddAddress("sriram@pidatacenters.com");
$mail->AddAddress("ram@pitechnologies.in");
$mail->AddAddress("sathwik.crazy@gmail.com");

 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }
 }
 function smtpmailer($to, $from, $from_name,$reply,$reply_name, $subject, $body){

    $mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
$mail->isSMTP();    
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);            
$mail->SMTPDebug = 1;                       // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "sales@pidatacenters.com";
$mail->Password = "Hyderabad";                     // SMTP password
$mail->SMTPSecure = 'tls';  
$mail->Port = 587;                          // Enable encryption, 'ssl' also accepted
$mail->IsHTML(true);
//$mail->AddBCC("sales@pidatacenters.com", "Sales Pi");
$mail->AddBcc('sriram@pidatacenters.com',"Ram");

$mail->From = $from;
$mail->FromName =  $from_name;
//$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient

$addresses = explode(',', $to);
foreach ($addresses as $address) {
    $mail->AddAddress($address);
}

//$mail->addAddress($address);               // Name is optional
$mail->addReplyTo($reply, $reply_name);
//$mail->addCC('sriram@pidatacenters.com');
//$mail->addBCC('bcc@example.com');

$mail->WordWrap = 100;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $body;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
if(!$mail->send()) {
    echo "/nMailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }
}
$body = "hellomail";
$to='sathwik.crazy@gmail.com';

$subject='Order Confirmation Receipt -';
$from = 'sales@pidatacenters.com';
	$from_name = 'Order Confirmation @Pi™';
	$reply = 'sales@pidatacenters.com';
	$reply_name = 'Sales Pi';

	//$to = $row['username'];

	smtpmailer($to, $from, $from_name,$reply,$reply_name, $subject, $body);
function mail2(){
 $mail = new PHPMailer;
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->CharSet = 'UTF-8';
$mail->isSMTP(); 
$mail->SMTPDebug = 1;                                     // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "sales@pidatacenters.com";
$mail->Password = "Hyderabad";                      // SMTP password
$mail->SMTPSecure = 'tls';  
$mail->Port = 587;                          // Enable encryption, 'ssl' also accepted
$mail->IsHTML(true);
//$mai2->AddBCC("sales@pidatacenters.com", "Sales Pi");

$mail->SetFrom("sriram@pidatacenters.com");
$mail->FromName =  'Ramkumar';
//$mail2->addAddress('joe@example.net', 'Joe User');     // Add a recipient

$mail->AddAddress("sriram@pidatacenters.com");
$mail->AddAddress("ram@pitechnologies.in");
$mail->AddAddress("sathwik.crazy@gmail.com");

//$mail2->addAddress($address);               // Name is optional
//$mail2->addReplyTo($reply, $reply_name);
$mail->addCC('sriram@pidatacenters.com');
//$mail2->addBCC('bcc@example.com');

$mail->WordWrap = 100;                                 // Set word wrap to 50 characters
//$mail2->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail2->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = "Test2";
$mail->Body    = "hello2";
//$mail2->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }
 }
 //mail3();
 mail2();
?>