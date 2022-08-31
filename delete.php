<?php
include 'config.php';
if (isset($_GET['deleteid'])) {
    $id=$_GET['deleteid'];

    $sql="delete from `crud` where id=$id";
    $result=mysqli_query($con,$sql);
    if ($result){
        echo "<script>alert('Deleted successfully.')</script>";
        header('location:admin_book.php');
    } else {
        die(mysqli_error($con));
    }
}
?>