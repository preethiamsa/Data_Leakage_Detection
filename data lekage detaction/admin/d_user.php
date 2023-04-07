<?php
// Start a session for error reporting
session_start();

// Get our POSTed variables
$id = $_GET['id'];

$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'dataleakage';

// Create a connection to the database
$db = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

// Check if the connection was successful
if (!$db) {
    die("Error Connecting to MySQL DataBase: " . mysqli_connect_error());
}

// Delete the user from the database
$sql = "DELETE FROM register WHERE username = '$id'";
$result = mysqli_query($db, $sql);

// Check if the deletion was successful
if (!$result) {
    die("Could not delete data from DB: " . mysqli_error($db));
}

// Redirect the user back to the admin page
header("Location: admin.php");
exit;
?>
