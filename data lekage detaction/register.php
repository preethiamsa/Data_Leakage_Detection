<?php
// Start a session for error reporting
session_start();

// Call our connection file
require("includes/conn.php");

// Get our POSTed variables
$fname = $_POST['a1'];
$lname = $_POST['a2'];
$image = $_POST['a3'];
$password = $_POST['a5'];

// Escape variables to prevent SQL injection
$fname = mysqli_real_escape_string($conn, $fname);
$lname = mysqli_real_escape_string($conn, $lname);
$image = mysqli_real_escape_string($conn, $image);
$password = mysqli_real_escape_string($conn, $password);

// NOTE: This is where a lot of people make mistakes.
// We are *not* putting the image into the database; we are putting a reference to the file's location on the server
$sql = "INSERT INTO register (username, userid, password, emailid) VALUES ('$fname', '$lname', '$image', '$password')";
$result = mysqli_query($conn, $sql) or die ("Could not insert data into DB: " . mysqli_error($conn));
header("Location:userlogin.php");
exit;
?>

