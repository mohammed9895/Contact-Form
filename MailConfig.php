<?php

/*

	Author 	:	Habib AlMawali
	Mob No.	:	+968 93996886
	Mob No.	:	+968 96939777
	Website	:	http://HaBiBo.net
	~ Soon	:	http://om-pro.com

	Support Omani Developers and Join Our Project.

*/

/*

Note: if you are using non secure connection http not https, 
you have to turn on less secure app from your email setting.
e.i gmail from the following link:

https://myaccount.google.com/lesssecureapps

*/

date_default_timezone_set("Asia/Muscat"); 				// Default Timezone: Oman

require_once 'PHPMailer/PHPMailerAutoload.php';

Class Email {
	
	protected $senderName = 			'Mohammed Hamad'; 		// Set Your Application Name to appear in the email.
	protected $emailAddress = 			'toshiba9895@gmail.com';				// Set Your gmail email address.
	protected $emailPassword = 			'Normal900';				// Set Your email Password.

	public function initMail() {

		$senderName = $this->senderName;
		$emailAddress = $this->emailAddress;
		$emailPassword = $this->emailPassword;

		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';					// May Changed based on your email.
		$mail->SMTPAuth = true;
		$mail->Username = $emailAddress;
		$mail->Password = $emailPassword;
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;

		$mail->setFrom($emailAddress, $senderName);
		$mail->addReplyTo($emailAddress, $senderName);
		$mail->smtpConnect([
		    'ssl' => [
		        'verify_peer' => false,
		        'verify_peer_name' => false,
		        'allow_self_signed' => true
		    ]
		]);

		return $mail;
	}

	public function sendEmail($email, $subject, $message) {
		$mail = $this->initMail();
		$mail->addAddress($email);
		$mail->isHTML(true);

		$mail->Subject = $subject;
		$mail->Body = $message;


		if(!$mail->send()) {
		    Tool::alert('Email Error: ' . $mail->ErrorInfo);
		} else {
		    return true;
		}
	}

	public function sendEmailWithAlert($email, $subject, $message, $alert) {
		$mail = $this->initMail();
		$mail->addAddress($email);
		$mail->isHTML(true);

		$mail->Subject = $subject;
		$mail->Body = $message;

		if(!$mail->send()) {
		    Tool::alert('Email Error: ' . $mail->ErrorInfo);
		} else {
		    Tool::alert($alert);
		}
	}
}

Class Tool {

	public static function alert($str) {
		echo "<script>alert('". $str ."')</script>";
	}

}
