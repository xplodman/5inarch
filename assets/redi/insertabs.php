<meta charset="utf-8">

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	require 'sqlcon.php';

	
	$date=$_POST['date'];
	$students_stid=$_POST['students_stid'];
	$material_matid=$_POST['material_matid'];

	
	$len = count($students_stid);
	for($x=0 ; $x < $len ; $x++){
	  $result1 = mysqli_query($sqlcon, "INSERT INTO `5inarch`.`absence` (`absid`, `date`, `students_stid`, `material_matid`) VALUES (NULL, '$date', '$students_stid[$x]', '$material_matid');");
	}
		
				}

		

	if ( $result1 ) 
	{ 
	header('Location: ../../absence.php?backresult=1');
	$fh = fopen('/tmp/track.txt','a');
	fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
	fclose($fh);}
	else
	{ 
	header('Location: ../../absence.php?backresult=0');
	$fh = fopen('/tmp/track.txt','a');
	fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
	fclose($fh);
}  
?>
