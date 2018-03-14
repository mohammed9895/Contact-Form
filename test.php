<?php

// Code Dependencies
require_once 'MailConfig.php';
$email = new Email;



// This below variables declarations will be needed for method 1 and 3.
$target 	= "habib.almawali@gmail.com";
$subject 	= "PHP Email";
$message 	= "<h2>Dear Habib,</h2><p>I just used your PHP email sample. <br/>Kindly confirm that you received my email.</p>";
$alert 		= "Email Sent Successful";



// example 1: Long Way and More Arranged without success response. This method depend on the above variables declarations.
$email->sendEmail($target, $subject, $message);

// example 2: Shortcut in one line without success response. This method will not depend on the above variables declarations.
$email->sendEmail("habib.almawali@gmail.com", "PHP Email", "<h2>Dear Habib,</h2><p>I Just Used Your Sample. <br/>Kindly confirm my email.</p>");

// example 3: Long Way and More Arranged + Success Alert Response. This method depend on the above variables declarations.
$email->sendEmailWithAlert($target, $subject, $message, $alert);

// example 4: Shortcut in one line + Success Alert Response. This method will not depend on the above variables declarations.
$email->sendEmailWithAlert("habib.almawali@gmail.com", "PHP Email", "<h2>Dear Habib,</h2><p>I just used your sample. <br/>Kindly confirm my email.</p>", "Email Sent Successful");
