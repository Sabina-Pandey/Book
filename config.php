<?php 

$server = "localhost";
$user = "root";
$password = "";
$database = "shop";

$con = mysqli_connect($server, $user, $password, $database);

if (!$con) {
    die("connection to this database failed due to" . mysqli_connect_error());
}

?>