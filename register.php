<?php 
include 'config.php';

error_reporting(0);

session_start();


if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
	$confirmpassword = md5($_POST['confirmpassword']);
    $gender = $_POST['gender'];
	$user_type = $_POST['user_type'];
	

	if ($password == $confirmpassword) {
		$sql = "SELECT * FROM users WHERE username='$username'";
		$result = mysqli_query($conn, $sql);

		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (fullname, username, email, password, gender, user_type)
					VALUES ('$fullname', '$username', '$email', '$password', '$gender', '$user_type')";
					
			$result = mysqli_query($con, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$fullname = "";
                $username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['confirmpassword'] = "";
                $gender="";
				$user_type="";
			} else {
				
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		 echo "<script>alert('Password Not Matched.')</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <?php include 'header.php'; ?>
    <div class="register">
        <h1>Welcome to the Registration!</h1>

        <br></br>

        <form action="register.php" method="POST">

            <input type="text" name="fullname" placeholder="Enter your fullname"
			 value="<?php echo $fullname; ?>" required class="box"> <br></br>

            <input type="text" name="username" placeholder="Enter your username" 
			 value="<?php echo $username; ?>" required class="box"> <br></br>

            <input type="email" name="email" placeholder="Enter your email" 
			 value="<?php echo $email; ?>" required class="box"> <br></br>

            <input type="password" name="password" placeholder="Enter your password"  
			 value="<?php echo $_POST['password']; ?>" required class="box"> <br></br>
	
			<input type="password" placeholder="Confirm your password" name="confirmpassword"
			 value="<?php echo $_POST['confirmpassword']; ?>" required class="box"> <br></br>
			
            <input type="text" name="gender" placeholder="Enter your gender" 
			 value="<?php echo $gender; ?>" required class="box"> <br></br>

			 <input type="text" name="user_type" placeholder="User/Admin" 
			 value="<?php echo $user_type; ?>" required class="box"> <br></br>

             <button name="submit" class="btn">Register</button>

            <br></br>

            <p>Have an account? <a href="login.php">Login Now</a></p>
            
        </form>  
    </div> 
</body>
</html>