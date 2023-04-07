
<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$msg ='';
if(isset($username, $password)) {
    include("config.php"); //Initiate the MySQL connection
    $myusername = stripslashes($username);
    $mypassword = stripslashes($password);
    $myusername = mysqli_real_escape_string($dbC, $myusername);
    $mypassword = mysqli_real_escape_string($dbC, $mypassword);
    $sql="SELECT * FROM register WHERE userid ='$myusername' and password =('$mypassword')";
    $result=mysqli_query($dbC, $sql);
    $count=mysqli_num_rows($result);
    if($count==1){
        $_SESSION['name']= $myusername;
        header("location:user/user.php");
    }
    else {
        $msg = "Wrong Username or Password. Please retry";
        header("location:index.html?msg=$msg");
    }
}
else {
    header("location:index.php?msg=Please enter some username and password");
}
?>
