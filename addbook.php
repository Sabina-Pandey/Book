<?php
    include 'config.php';
    if(isset($_POST['submit'])) {
        $name = $_POST['bookname'];
        $publisher = $_POST['publisher'];
        $price = $_POST['price'];


        $sql = "Insert into `crud` (bookname,publisher,price) 
                VALUES ('$name', '$publisher', '$price')";

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
    <title>Add Book</title>
    
</head>
<body>
    <div class="container">
        <h1>Add Book</h1>
          <br></br>
        
        <form action="" method="POST">
            Book Name: <input type="text" name="bookname" placeholder="Enter Book Name" required> <br></br>

            Publisher: <input type="text" name="publisher" placeholder="Publisher Name" required> <br></br>

            Price: <input type="number" name="price" placeholder="Enter Price" required> <br></br>

            <button name="submit" class="submit">Add</button>
        </form>
    </div>
</body>
</html>