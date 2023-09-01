<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project3";

// Connecting to the Database
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
else{
  // echo "Connection Successfull";
}
?>