<?php 

include 'config.php';

session_start();

error_reporting(0);


if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = ($_POST['password']);
    $user_type = $_POST['user_type'];
   
	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password' AND user_type='$user_type'";
	$result = mysqli_query($con, $sql);
    if(!mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
       
       if ($_SESSION['user_type'] = 'admin') {
        header("Location:admin_page.php");
       }
       if ($_SESSION['user_type'] = 'user') {
        header("Location:shop.php");
    }
    else {
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
 }
}
  } 
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <?php include 'header.php'; ?> 
    <div class="form-container">
        <h1>Welcome to the Login Page!!</h1>

        <br></br>

        <form action="login.php" method="POST">

            <input type="text" name="username" placeholder="Enter Your UserName" required> <br></br>

           <input type="password" name="password" placeholder="Enter Your Password" required>  <br></br>
	
            <button name="submit" class="btn">Login</button>

                <br></br>

            <p>Don't have an account? <a href="register.php">SignUp Here</a></p>
             
        </form>  
    </div>
</body>
</html>