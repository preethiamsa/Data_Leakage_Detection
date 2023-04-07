<?php 
session_start();

$con = mysqli_connect("localhost","root","","dataleakage");
if (!$con){
    die('Could not connect: ' . mysqli_error($con));
}

$k1 = $_POST['s1'];
$k2 = $_POST['s2'];

if($k1 == $k2) {
    $file = './download/'.$_GET['id'];
    $title = $_GET['id'];

    header("Pragma: public");
    header('Content-disposition: attachment; filename='.$title);
    header('Content-Transfer-Encoding: binary');
    ob_clean();
    flush();

    $chunksize = 1 * (1024 * 1024); // how many bytes per chunk
    if (filesize($file) > $chunksize) {
        $handle = fopen($file, 'rb');
        $buffer = '';

        while (!feof($handle)) {
            $buffer = fread($handle, $chunksize);
            echo $buffer;
            ob_flush();
            flush();
        }

        fclose($handle);
    } else {
        readfile($file);
    }
} else {
    echo "Please contact the administrator.";
    $sql = "INSERT INTO leaker (name, time) VALUES ('$_SESSION[name]', '".date("d/m/Y")."')";
    $result = mysqli_query($con, $sql) or die ("Could not insert data into DB: " . mysqli_error($con));
    header("Location: askadmin.php");
}

mysqli_close($con);
?>

