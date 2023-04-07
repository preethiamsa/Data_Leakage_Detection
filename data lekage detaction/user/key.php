<?php
// Start a session for error reporting
session_start();

// Get our POSTed variables
$id = $_GET['id'];

// Connect to the database
$con = mysqli_connect("localhost","root","","dataleakage");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Insert data into the askkey table
$sql = "INSERT INTO askkey (user, filename, status, reciver, k) 
        VALUES ('{$_SESSION['name']}', '$id', 'no', 'admin', '')";
$result = mysqli_query($con, $sql);

if ($result) {
    // Success! Redirect to user.php
    header("Location: user.php");
    exit;
} else {
    // Something went wrong
    echo "Could not insert data into DB: " . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>

