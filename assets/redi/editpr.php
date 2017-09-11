    <meta charset="utf-8">

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
require 'sqlcon.php';
$character = array(" ", "	", "(", ")", "-", "/");

$profileid=$_GET['profileid'];
$materials=$_POST['duallistbox_demo1'];
$prname=$_POST['prname'];
$prmob =$_POST['prmob'];
$prmob = str_replace($character, "", $prmob);
$prtel =$_POST['prtel'];
$prtel = str_replace($character, "", $prtel);
$prparentname =$_POST['prparentname'];
$prparentmob =$_POST['prparentmob'];
$prparentmob = str_replace($character, "", $prparentmob);
$premail =$_POST['premail'];

$result1 = mysqli_query($sqlcon, "UPDATE `5inarch`.`professors` SET `prname` = '$prname', `prmob` = '$prmob', `prtel` = '$prtel', `prparentname` = '$prparentname', `prparentmob` = '$prparentmob', `premail` = '$premail' WHERE `professors`.`prid` ='$profileid';");			

$result2 = mysqli_query($sqlcon, "DELETE FROM prmat WHERE professors_prid='$profileid';");


$len = count($materials);
for($x=0 ; $x < $len ; $x++){
$result3 = mysqli_query($sqlcon, "INSERT INTO `5inarch`.`prmat` (`prmatid`, `professors_prid`, `material_matid`) VALUES (NULL, '$profileid', '$materials[$x]');");
	}
			}
	
if ( $result1 || $result2 || $result3 ) 
{ 
header('Location: ../../prprofile.php?backresult=1&profileid='.$profileid);
$fh = fopen('/tmp/track.txt','a');
fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
fclose($fh);}
else
{ 
header('Location: ../../prprofile.php?backresult=0&profileid='.$profileid);
$fh = fopen('/tmp/track.txt','a');
fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
fclose($fh);
}  
?>
