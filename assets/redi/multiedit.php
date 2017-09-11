<meta charset="utf-8">

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	require 'sqlcon.php';

	
	$balance=$_POST['balance'];
	$students_stid=$_POST['students_stid'];
	$material_matid=$_POST['material_matid'];
	$styear=$_POST['styear'];
	$stterm=$_POST['stterm'];
	$sttype2=$_POST['sttype2'];

	$len = count($students_stid);
	for($z=0 ; $z < $len ; $z++){
		$resu1 = mysqli_query($sqlcon, "UPDATE `5inarch`.`stmat` SET `status` = '0' WHERE `students_stid` = '$students_stid[$z]';");
		$resu2 = mysqli_query($sqlcon, "UPDATE `5inarch`.`students` SET `stbalance` = `stbalance`+$balance WHERE `students`.`stid` = '$students_stid[$z]';");
		$resu2 = mysqli_query($sqlcon, "UPDATE `5inarch`.`students` SET `styear` = $styear WHERE `students`.`stid` = '$students_stid[$z]';");
		$resu2 = mysqli_query($sqlcon, "UPDATE `5inarch`.`students` SET `stterm` = $stterm WHERE `students`.`stid` = '$students_stid[$z]';");
		$resu2 = mysqli_query($sqlcon, "UPDATE `5inarch`.`students` SET `sttype2` = '$sttype2' WHERE `students`.`stid` = '$students_stid[$z]';");

		};
		
	$len1 = count($students_stid);
	for($x=0 ; $x < $len1 ; $x++){
		
		$len2 = count($material_matid);
		for($y=0 ; $y < $len2 ; $y++){
			

			$result2 = mysqli_query($sqlcon, "INSERT INTO `5inarch`.`stmat` (`stmatid`, `material_matid`, `students_stid`, `status`) VALUES (NULL, '$material_matid[$y]', '$students_stid[$x]','1');");

			};
		
		
	}
		
				}

		

	if ( $result2 ) 
	{ 
	header('Location: ../../students.php?backresult=1');
	$fh = fopen('/tmp/track.txt','a');
	fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
	fclose($fh);}
	else
	{ 
	header('Location: ../../students.php?backresult=0');
	$fh = fopen('/tmp/track.txt','a');
	fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
	fclose($fh);
}  
?>
