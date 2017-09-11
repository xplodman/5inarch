    <meta charset="utf-8">

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
require 'sqlcon.php';

$username=$_POST['username'];
$password=$_POST['password'];

$result = mysqli_query($sqlcon, "SELECT * FROM `administrators` WHERE `adusername` = '$username' AND `adpassword` = '$password'");

	};
	
if(mysqli_num_rows($result) == 0) {

	header('Location: ../../login.php?backresult=0');
	$fh = fopen('/tmp/track.txt','a');
	fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
	fclose($fh);
	}
else
{ 
	header('Location: ../../index.php');
	$fh = fopen('/tmp/track.txt','a');
	fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
	fclose($fh);
		session_start();
	$_SESSION['timestamp'] = time();
	$_SESSION["username"] = "$username";
	$_SESSION["authenticate"] = "true";
}  
?>
