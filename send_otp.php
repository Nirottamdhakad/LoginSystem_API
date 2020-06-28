<?php
session_start();
require 'connection.php';
//$con=mysqli_connect('localhost','root','','userdatabase1');

$email=$_POST['email'];
echo 'rahul';
$res=mysqli_query($con,"select * from user where email='$email'");
$count=mysqli_num_rows($res);
if($count>0){
	$otp=rand(11111,99999);
	mysqli_query($con,"update user set otp='$otp' where email='$email'");
	
	$html="Your otp verification code is ".$otp;
	$_SESSION['EMAIL']=$email;
	smtp_mailer($email,'OTP Verification',$html);
	echo "yes";
}else{
	echo "not_exist";
}

function smtp_mailer($to,$subject, $msg){
	require_once("smtp/class.phpmailer.php");
	$mail = new PHPMailer(); 
	$mail->isSMTP(); 
	$mail->SMTPDebug = 1; 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.sendgrid.net"; // you have to first register on sendgrid.com
	$mail->Port = 587; // if not work than use 465
	$mail->isHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "your sendgrid username";
	$mail->Password = "your sendgerid password";
	$mail->setFrom("dhakednirottam98nd@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->addAddress($to);
	if(!$mail->Send()){
		return 0;
	}else{
		return 1;
	}
}
?>