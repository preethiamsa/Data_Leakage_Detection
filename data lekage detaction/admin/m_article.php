<?php
// Start a session for error reporting
session_start();

// Get our POSTed variables
$id = $_GET['id'];

$con = mysqli_connect("localhost","root","","dataleakage") or die('Error Connecting to MySQL DataBase');

$sql = "DELETE FROM presentation WHERE subject='$id'";
$result = mysqli_query($con, $sql) or die ("Could not delete data from DB: " . mysqli_error($con));

mysqli_close($con);

header("Location: admin.php");
exit;
?>