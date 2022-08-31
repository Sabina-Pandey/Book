<?php

if (isset($_POST['submit'])) {
    
    $name =  $_POST['name'];
    $email =  $_POST['email'];
    $subject = $_POST['subject'];
    $message =  $_POST['message'];
    
    if ((empty($name)) || (empty($email)) || (empty($subject)) || (empty($message))) {
        header('location:contact.php?error');

    } else {
        $to = "sabinapandey700@gmail.com";

        if (mail($to,$subject,$message,$email)) {
            header("location:contact.php?success");
        } 
    }
// } else {
//     header("location:contact.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'header.php'; ?>

    <div class="heading">
        <h2>Contact Us</h2>
        <p>Email Us and keep upto date with the latest news</p>

        <?php
            $message = "";
                if (isset($_GET['error'])) {
                    $message = "Please Fill in the Blanks";
                    echo '<div class="alert alert-danger">'.$message.'</div>';
                }

                if (isset($_GET['success'])) {
                    $message = "Message sent succcessfully";
                    echo '<div class="alert alert-danger">'.$message.'</div>';
                }
            
        ?>
    </div>
    <div class="contact">
      <form action="contact.php" method="post">
          <input type="text" name="name" placeholder="Enter your name">
          <input type="email" name="email" placeholder="Enter your email">
          <input type="subject" name="subject" placeholder="Subject of this message">
          <textarea name="message" placeholder="Send your message" rows="10" cols="10"></textarea>
          <input type="submit" name="submit" value="Send Message">
      </form>
    </div>
</body>
</html> 



