<?php
session_start(); // Start the session

if (!isset($_SESSION['name'])) {
    echo "Please Login";
    // $_SESSION['error'] = "Please Login First";
    echo "<script type=\"text/javascript\">alert('Please Login');</script>";
    header("Location: http://localhost/dataleakagedetaction/adminlogin.php"); // Redirect to login page
    exit; // Terminate script execution after redirect
} else {
    define('ADMIN', $_SESSION['name']); // Get the user name from the previously registered super global variable
    header('Content-Type: text/html; charset=utf-8');
    // include 'config.php'; // Include database configuration file if needed
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Data Lekage Detaction</title>
	<meta charset="utf-8" />
	
	<link rel="stylesheet" href="style.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body class="body">
<?php
if (!empty($_POST)) {
    $con = mysqli_connect("localhost", "root", "", "dataleakage");
    if (!$con) {
        die('Could not connect: ' . mysqli_connect_error());
    }

    $sub = mysqli_real_escape_string($con, $_POST['sub']);
    $pre = mysqli_real_escape_string($con, $_POST['pre']);
    $fname = mysqli_real_escape_string($con, $_FILES['file']['name']);
    $date = date("d/m/Y");

    $target_dir = "download/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo '<script language="javascript">alert("Sorry!! Filename Already Exists...")</script>';
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["file"]["size"] > 500000) {
        echo '<script language="javascript">alert("Sorry, your file is too large.")</script>';
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($fileType != "ppt" && $fileType != "pptx" && $fileType != "pdf") {
        echo '<script language="javascript">alert("Sorry, only PPT, PPTX, PDF files are allowed.")</script>';
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo '<script language="javascript">alert("Sorry, your file was not uploaded.")</script>';
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO presentation (subject, topic, fname, time) VALUES ('$sub', '$pre', '$fname', '$date')";
            if (!mysqli_query($con, $sql)) {
                echo 'Error : ' . mysqli_error($con);
            } else {
                echo '<script language="javascript">alert("Thank You!! File Uploaded")</script>';
            }
        } else {
            echo '<script language="javascript">alert("Sorry, there was an error uploading your file.")</script>';
        }
    }

    mysqli_close($con);
}
?>

		
    </head>
	
     <body>
	 <header class="mainHeader">
		<img src="img/logo.gif">
		<nav><ul>
			
			<li ><a href="admin.php">Home</a></li>
			<li><a href="upload.php">Publish Article</a></li>
			<li><a href="view file.php">View File</a></li>
			<li class="active"><a href="leakfile.php">Leak User</a></li>
			
	</ul></nav>
	</header>
		
	<div class="mainContent1">
		<div class="content">	
				<article class="topcontent1">	
					<header>
						<h2><a href="#" rel="bookmark" title="Permalink to this POST TITLE"> Admin Login</a></h2>
					</header>
					
					<footer>
						<p class="post-info">Upload the latest article. </p>
					</footer>
					
					<content>
						<p>	 
						
						
						
        <form id="form3" enctype="multipart/form-data" method="post" action="upload.php">
            <table width="552" height="200" style="border-radius: 10px; box-shadow: 0 0 2px 2px #888;
            	font-family:'Comic Sans MS';font-size: 14px;" >
				

 
                <tr>
                    <td>	<label for="sub">Subject: </label>	</td>
                    <td>	<input type="text" name="sub" id="sub" />	</td>
                </tr>
                <tr>
                    <td valign="top" align="left">Key:</td>
                    <td valign="top" align="left"><input type="text" name="pre" cols="50" rows="10" id="pre"></textarea></td>
                </tr>
                <tr>
                    <td><label for="file">File:</label></td>
                    <td><input type="file" name="file" id="file" /></td>
                </tr>
                <tr>
	                <td colspan="2" align="center"><input type="submit" name="upload" id="upload" value="Upload File" /></td>
                </tr>
            </table>
        </form>
		
		</div>
<aside class="top-sidebar">
					<article>
					<h2>Welcome: <?php echo $_SESSION['name']/*Echo the username */ ?>
					<li><a href="logout.php">Logout</a></li>
					
					</h2>
					<p> <?php
$row = "";
$con = mysqli_connect("localhost", "root", "", "dataleakage");
if (!$con) {
    echo('Could not connect: ' . mysqli_connect_error());
} else {
    $sql = "SELECT * FROM register";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die('Could not get data: ' . mysqli_error($con));
    }
    while ($row = mysqli_fetch_assoc($result)) {
        echo "UserName: " . $row['username'] . "<hr><br>";
    }
    mysqli_close($con);
}
?> </p>
				    </article>
				</aside>	
		</div>
			
				
	</div>
	
	<footer class="mainFooter">
		<p>Project Design by:<a href="http://1stwebdesigner.com">Vaibhav,Mukesh,Kaustubh</a></p>
	</footer>

</body>
</html>