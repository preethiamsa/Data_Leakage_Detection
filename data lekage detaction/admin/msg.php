<?php
// Start a session for error reporting
session_start();

// Get our POSTed variables
$a1 = $_POST['a1'];
$a2 = $_POST['a2'];
$a3 = $_POST['a3'];

$con = mysqli_connect("localhost", "root", "", "dataleakage");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$sql = "INSERT INTO msg (sender, email, reciver, msg) VALUES ('{$_SESSION['name']}', '$a1', '$a2', '$a3')";
if (mysqli_query($con, $sql)) {
  header("Location: admin.php");
  exit();
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);
?>

