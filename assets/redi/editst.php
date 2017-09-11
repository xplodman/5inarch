    <meta charset="utf-8">

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
require 'sqlcon.php';

$character = array(" ", "	", "(", ")", "-", "/");
$profileid=$_GET['profileid'];
$materials=$_POST['duallistbox'];
$stname=$_POST['stname'];
$stcode=$_POST['stcode'];
$stmob=$_POST['stmob'];
$stmob = str_replace($character, "", $stmob);
$sttel=$_POST['sttel'];
$sttel = str_replace($character, "", $sttel);
$stparenttype=$_POST['stparenttype'];
$stparentname=$_POST['stparentname'];
$stparentmob=$_POST['stparentmob'];
$stparentmob = str_replace($character, "", $stparentmob);
$stemail=$_POST['stemail'];
$staddress=$_POST['staddress'];
$stnationalid=$_POST['stnationalid'];
$stnationalid = str_replace($character, "", $stnationalid);
$sttype =$_POST['sttype'];
$sttype2 =$_POST['sttype2'];
$styear =$_POST['styear'];
$stterm =$_POST['stterm'];
$stgroup =$_POST['stgroup'];
$stbalance =$_POST['stbalance'];

$result1 = mysqli_query($sqlcon, "UPDATE `5inarch`.`students` SET `stname` = '$stname',`stcode` = '$stcode', `stmob` = '$stmob', `sttel` = '$sttel', `stparenttype` = '$stparenttype', `stparentname` = '$stparentname', `stparentmob` = '$stparentmob', `stemail` = '$stemail', `staddress` = '$staddress', `stnationalid` = '$stnationalid', `sttype` = '$sttype',`stbalance` = '$stbalance',`sttype2` = '$sttype2', `styear` = '$styear', `stterm` = '$stterm', `stgroup` = '$stgroup' WHERE `students`.`stid` = $profileid;
");	


$result2 = mysqli_query($sqlcon, "UPDATE `5inarch`.`stmat` SET `status` = '0' WHERE `students_stid` = $profileid;");

$len = count($materials);
for($x=0 ; $x < $len ; $x++){
$result3 = mysqli_query($sqlcon, "INSERT INTO `5inarch`.`stmat` (`stmatid`, `students_stid`, `material_matid`, `status`) VALUES (NULL, '$profileid', '$materials[$x]', '1');");
	}
			}
	
if ( $result1 || $result2 || $result3 ) 
{ 
header('Location: ../../stprofile.php?backresult=1&profileid='.$profileid);
$fh = fopen('/tmp/track.txt','a');
fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
fclose($fh);}
else
{ 
header('Location: ../../stprofile.php?backresult=0&profileid='.$profileid);
$fh = fopen('/tmp/track.txt','a');
fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
fclose($fh);
}  
?>
