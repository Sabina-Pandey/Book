<?php
include 'config.php';

$id = $_GET['updateid'];
$sql="Select * from `crud` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['bookname'];
$publisher=$row['publisher'];
$price=$row['price'];

if(isset($_POST['submit'])) {
    $name = $_POST['bookname'];
    $publisher = $_POST['publisher'];
    $price = $_POST['price'];


    $sql = "Update `crud` set id=$id, bookname='$name', publisher='$publisher', price='$price' where id=$id";

            $result=mysqli_query($con,$sql);
            if($result){
                // echo "<script>alert('Data inserted successfully.')</script>";
                header('location:admin_book.php');
            } else{
                die(mysqli_error($con));
            }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update</title>

</head>
<body>
<div class="container">
    <h1>Update Book</h1>
      <br></br>
    
    <form action="" method="POST">
        Book Name: <input type="text" name="bookname" placeholder="Enter Book Name" value="<?php echo $name; ?>" required> <br></br>

        Publisher: <input type="text" name="publisher" placeholder="Publisher Name" value="<?php echo $publisher; ?>" required> <br></br>

        Price: <input type="number" name="price" placeholder="Enter Price" value="<?php echo $price; ?>" required> <br></br>

        <button name="submit" class="submit">Update</button>
    </form>
</div>
</body>
</html>