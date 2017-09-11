<meta charset="utf-8">

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	require 'sqlcon.php';

	$character = array(" ", "(", ")", "-", "/");
	
	$number=$_POST['number'];
	$recipient=$_POST['recipient'];
	$donor=$_POST['donor'];
	$percent=$_POST['percent'];
	$amount=$_POST['amount'];
	$amount=$percent/100*$amount;
	$amountconv=$amount;
	$amount=$amount*-1;
	$realdate=$_POST['realdate'];
	$description=$_POST['description'];
	
	
	
	$result1 = mysqli_query($sqlcon, "INSERT INTO `5inarch`.`tickets` (`tiid`, `tiamount`, `tidonor`, `tidonortype`, `tirecipient`, `tirecipienttype`, `tirealdate`, `tisysdate`, `tireason`, `tinumber`, `tidescription`, `titype`) VALUES (NULL, '$amount', '$donor', '1', '$recipient', '2', '$realdate', now(), 'm0', '$number', '$description', '$percent');"); 
		
				}
				
	$result123 = mysqli_query($sqlcon, "UPDATE `5inarch`.`students` SET `stbalance` = `stbalance`+$amountconv WHERE `students`.`stid` = $recipient;");
		

	if ( $result1 ) 
	{ 
	header('Location: ../../receipts.php?backresult=1');
	$fh = fopen('/tmp/track.txt','a');
	fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
	fclose($fh);}
	else
	{ 
	header('Location: ../../receipts.php?backresult=0');
	$fh = fopen('/tmp/track.txt','a');
	fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
	fclose($fh);
}  
?>
