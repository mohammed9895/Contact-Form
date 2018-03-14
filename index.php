<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<?php

    require_once('MailConfig.php');

    $emailClass = new Email();

    $errors = array();

    if(isset($_POST['send'])) {
        // Get data from the form
        $fullname       = $_POST['fullname'];
        $email          = $_POST['email'];
        $subject        = $_POST['subject'];
        $message        = $_POST['message'];

        if(empty($fullname)) {
            $errors[] = "Full Name is required";
        }

        if(empty($email)) {
            $errors[] = "Email Address is required";
        }

        if(empty($subject)) {
            $errors[] = "Subject is required";
        }

        if(empty($message)) {
            $errors[] = "Message is required";
        }

        if(empty($errors)) {
            $msg_template = "
                From : ".$email."
                Name : ".$fullname."
                Subject : ".$subject."
                Message: 
                ".$message."
            ";
            $emailClass->sendEmail('toshiba9895@gmail.com', $subject, $msg_template);
            $success = "Email Sent Successfully";
        }

    }


?>


    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 offset-md-2">
            
                <h1 class="text-center mt-3">Contact Us</h1>
                <?php
                
                    if(isset($success)) {
                        ?>
                            <div class="alert alert-success"><?php echo $success; ?></div>
                        <?php
                    }
                    else {
                        foreach($errors as $error) {
                            ?>
                                <div class="alert alert-danger">
                                    <?php echo $error . '<br>'; ?>
                                </div>
                            <?php
                        }
                    }
                
                ?>
                <form action="index.php" method="post">
                    <label for="fullname">Full Name</label>
                    <input type="text" name="fullname" id="fullname" class="form-control">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" id="subject" class="form-control">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" class="form-control"></textarea>
                    <input type="submit" value="Send" name="send" class="btn btn-primary mt-2">
                </form>

            </div>
        </div>
    </div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>