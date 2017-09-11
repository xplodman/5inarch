    <meta charset="utf-8">

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
require 'sqlcon.php';

$profileid=$_GET['profileid'];
$matname=$_POST['matname'];
$matyear =$_POST['matyear'];
$matterm =$_POST['matterm'];


$result1 = mysqli_query($sqlcon, "UPDATE `5inarch`.`material` SET `matname` = '$matname', `matyear` = '$matyear', `matterm` = '$matterm' WHERE `material`.`matid` = '$profileid';");			


	}
	
if ( $result1 || $result2 || $result3 ) 
{ 
header('Location: ../../matprofile.php?backresult=1&profileid='.$profileid);
$fh = fopen('/tmp/track.txt','a');
fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
fclose($fh);}
else
{ 
header('Location: ../../matprofile.php?backresult=0&profileid='.$profileid);
$fh = fopen('/tmp/track.txt','a');
fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
fclose($fh);
}  
?>
