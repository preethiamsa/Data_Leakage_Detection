<!DOCTYPE html>
<html lang="en">
<head>
	<title>Data Lekage Detaction</title>
	<meta charset="utf-8" />
	
	<link rel="stylesheet" href="style.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<?php $row=""; $con = mysqli_connect("localhost","root","","dataleakage"); if (!$con) { die('Could not connect: ' . mysqli_error()); } else { $sql = 'SELECT * FROM presentation'; $retval = mysqli_query($con, $sql); if (!$retval) { die('Could not get data: ' . mysqli_error($con)); } while ($row = mysqli_fetch_assoc($retval)) { echo "<tr bgcolor='white'><td> {$row['subject']} </td> " . "<td> {$row['Topic']} </td> " . "<td> {$row['fname']} </td> " . "<td> {$row['time']} </td> " . "<td><a href='m_article.php?id=". "{$row['subject']}'>{$row['subject']}</a>" . "</td>" ; } } mysqli_close($con); ?>
<body class="body">
	
	<header class="mainHeader">
		<img src="img/logo.gif">
		<nav><ul>
			<li ><a href="admin.php">Home</a></li>
			<li><a href="upload.php">Publish Article</a></li>
			<li class="active"><a href="viewfile.php">View File</a></li>
			<li ><a href="leakfile.php">Leak User</a></li>
			<li ><a href="sendkey.php">SendKey</a></li>
			
			
		</ul></nav>
	</header>
		
	<div class="mainContent1">
		<div class="content">	
				<article class="topcontent1">	
					<header>
						<h2><a href="#" rel="bookmark" title="Permalink to this POST TITLE">Admin Menu</a></h2>
					</header>
					
					<footer>
						<p class="post-info">Delete the users. </p>
					</footer>
					
					<content>
						<p>
							<table align="center" cellpadding="9" cellspacing="2" width="10"><tr bgcolor="green">
							<td >Article Subject</td><td>Article Key</td><td>File Name</td><td>Upload Date</td><td><a href="m_article.php">Delete</a></td></tr>
							<?php
							session_start();
$con = mysqli_connect("localhost","root","","dataleakage");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT * FROM presentation";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr bgcolor='white'><td>".$row['subject']."</td><td>".$row['Topic']."</td><td>".$row['fname']."</td><td>".$row['time']."</td><td><a href='m_article.php?id=".$row['subject']."'>".$row['subject']."</a></td>";
  }
} else {
  echo "0 results";
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