<!DOCTYPE html>
<html lang="en">
<head>
	<title>Data Leakage Detection</title>
	<meta charset="utf-8" />
	
	<link rel="stylesheet" href="style.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body class="body">
	
	<header class="mainHeader">
		<img src="img/logo.gif">
		<nav><ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="register.html">Registration</a></li>
			<li><a href="userlogin.php">User Login</a></li>
			<li class="active"><a href="adminlogin.php">Admin Panel</a></li>
			<li><a href="article.php">Articles</a></li>
		</ul></nav>
	</header>
		
	<div class="mainContent1">
		<div class="content">	
			<article class="topcontent1">	
				<header>
					<h2><a href="#" rel="bookmark" title="Permalink to this POST TITLE"> Admin Login</a></h2>
				</header>
				
				<content>
					<p>		  
						<form name="s" action="check_login.php" method="POST" onsubmit="return valid()">
							<table align="center" cellpadding="" cellspacing="" width="">
								<tr> 
									<td colspan="2" align="center"><font size="2"><b>
									</b></font></td>
								</tr>
								<tr> 
									<td><font face="Courier New" size="+1"><strong>Username</strong></font></td>
									<td>&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="username" id="username" class="b"></td>
								</tr>
								<tr> 
									<td><font face="Courier New" size="+1"><strong>Password</strong></font></td>
									<td>&nbsp;&nbsp;&nbsp;&nbsp; <input type="password" name="password" id="password" class="b"></td>
								</tr>
								<tr> 
									<td></td>
									<td><input type="submit" name="submit" value="Submit" class="b1"> 
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
										<input type="reset" name="reset" value="Clear" class="b1"></td>
								</tr>
							</table>
						</form>
					</p>
				</content>
			</article>
		</div>
	</div>
	
	

</body>
</html> 

