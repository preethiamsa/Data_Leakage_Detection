<!DOCTYPE html>
<html lang="en">
<head>
	<title>Data Lekage Detaction</title>
	<meta charset="utf-8" />
	
	<link rel="stylesheet" href="style.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<?php
session_start(); //Start the session

if (!isset($_SESSION['name'])) {
        echo "Please Login";
		//$_SESSION['error'] = "Please Login First";
		echo "<script type=\"text/javascript\">"." alert('Please Login'); " ."</script>";
		} if (!$_SESSION['name']){
		      echo  header("Location: http://localhost/data lekage detaction/adminlogin.php");
		}

		
		else{
		
		define('ADMIN',$_SESSION['name']); //Get the user name from the previously registered super global variable
		//if(!session_is_registered("admin")){ //If session not registered
//header("location:login.php"); // Redirect to login.php page
//}
//else //Continue to current page
header( 'Content-Type: text/html; charset=utf-8' );
//include'includes/conn.php';
 }
 
?>
<body class="body">
	
	<header class="mainHeader">
		<img src="img/logo.gif">
		<nav><ul>
			<li ><a href="user.php">Home</a></li>
			<li><a href="viewmsg.php">View msg</a></li>
			<li class="active"><a href="view file.php">View Articles</a></li>
			<li ><a href="viewkey.php">View Key</a></li>
			
			
		</ul></nav>
	</header>
		
	<div class="mainContent1">
		<div class="content">	
				<article class="topcontent1">	
					<header>
						<h2><a href="#" rel="bookmark" title="Permalink to this POST TITLE">Admin Menu</a></h2>
					</header>
					
					<footer>
						<p class="post-info">This Admin manu was one time password. </p>
					</footer>
					
					<content>
						<p>
							<table align="center" cellpadding="9" cellspacing="2" width="10" ><tr bgcolor="green">
							<td >Article Name</td><td>Date</td><td>Detail</td><td>View</td><td>Ask KEY</td></tr>
							<?php
$con = mysqli_connect("localhost","root","","dataleakage");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$sql = "SELECT * FROM presentation";
$result = mysqli_query($con, $sql);

if (!$result) {
  die("Could not get data: " . mysqli_error($con));
}

while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr bgcolor='white'><td>{$row['subject']}</td>" .
       "<td>{$row['time']}</td>" .
       "<td>{$row['fname']}</td>" .
       "<td>Download:<br><a href='detail.php?id={$row['subject']}'>{$row['subject']}</a></td>" .
       "<td><br><a href='key.php?id={$row['subject']}&f={$row['fname']}'>Click To ask</a></td></tr>";
}

mysqli_close($con);
?>
					
					
					
					
					                          
</tr>

</table>

						</p>
						</content>
					
				</article>

			</div>
<aside class="top-sidebar">
					<article>
					<h2>Welcome: <?php echo $_SESSION['name']/*Echo the username */ ?></h2>
					<li><a href="logout.php">Logout</a></li>
					
					<p></p>
				    </article>
				</aside>	
		</div>
			
				
	</div>
	
	<footer class="mainFooter">
		<p>Project Design by:<a href="http://1stwebdesigner.com">Vaibhav,Mukesh,Kaustubh</a></p>
	</footer>

</body>
</html>