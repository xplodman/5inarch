<meta charset="utf-8">

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	require 'sqlcon.php';

	$character = array(" ", "(", ")", "-", "/");
	
	$number=$_POST['number'];
	$recipient=$_POST['recipient'];
	$donor=$_POST['donor'];
	$realdate=$_POST['realdate'];
	$description=$_POST['description'];
	$amount=$_POST['amount'];
	$reason=$_POST['tireason'];

	
	
	$result1 = mysqli_query($sqlcon, "INSERT INTO `5inarch`.`tickets` (`tiid`, `tiamount`, `tidonor`, `tidonortype`, `tirecipient`, `tirecipienttype`, `tirealdate`, `tisysdate`, `tireason`, `tinumber`, `tidescription`, `titype`) VALUES (NULL, '$amount', '$donor', '1', '$recipient', '1', '$realdate', now(), '$reason', '$number', '$description', '2');"); 
	
	

	

	
	


		
				}

		

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
