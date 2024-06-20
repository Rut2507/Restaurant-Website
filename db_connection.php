<?php
$server = "localhost";
$username = "root";
$password = ""; // Add your MySQL password if any
$database = "restaurant_website";

$con = mysqli_connect($server, $username, $password, $database);

if (!$con) {
    die("Connection to database failed: ".mysqli_connect_error());
}
?>