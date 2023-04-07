<?php
$con = mysqli_connect("localhost","root","","dataleakage");
if (!$con) {
    die('Could not connect: ' . mysqli_error());
}

$qry = "SELECT * FROM askkey WHERE reciver='admin' AND status='no'";
$result = mysqli_query($con, $qry);

while ($row = mysqli_fetch_array($result)) {
    echo '<tr bgcolor="white">
              <td>'.$row["id"].'</td>
              <td>'.$row["user"].'</td>
              <td>'.$row["filename"].'</td>
          </tr>';
}

mysqli_close($con);
?>
						