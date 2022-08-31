<?php
  include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="css/admin_style.css">
    

</head>
<body>
  <?php include 'admin_header.php';?>
    <div class="table-responsive">
        <h1>Books Details</h1>
            <br></br>

            <button class="btn"><a href="addbook.php">Add Books</a></button>
           
            <br></br>
        
        <table>
            <tr>
                <th>S.No.</th>
                <th>Book Name</th>
                <th>Publisher</th>
                <th>Price</th>
                <th>Operation</th>
            </tr>

            <?php
            $sql= "Select * from `crud`";
            $result=mysqli_query($con,$sql);
            if($result) {
                while($row=mysqli_fetch_assoc($result)) {
                    $id=$row['id'];
                    $name=$row['bookname'];
                    $publisher=$row['publisher'];
                    $price=$row['price'];
                    echo '<tr>
                    <td>'.$id.'</td>
                    <td>'.$name.'</td>
                    <td>'.$publisher.'</td>
                    <td>'.$price.'</td>
                    <td>
                    <button><a href="updatebook.php?updateid='.$id.' ">Update</a></button>
                    <button><a href="delete.php?deleteid='.$id.' ">Delete</a></button>
                    </td>
                  </tr>';
                }
            }
            ?>
            
        </table>
    </div> 
</body>
</html>