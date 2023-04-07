<!--<?php
/**********************************************************************
 *Contains all the basic Configuration
 *dbHost = Host of your MySQL DataBase Server... Usually it is localhost
 *dbUser = Username of your DataBase
 *dbPass = Password of your DataBase
 *dbName = Name of your DataBase
 **********************************************************************/
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'dataleakage';
$dbC = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName)
        or die('Error Connecting to MySQL DataBase');
?>-->
<?php
$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "dataleakage";

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
