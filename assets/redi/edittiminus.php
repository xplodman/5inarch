<meta charset="utf-8">

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		require 'sqlcon.php';

		$receiptid=$_GET['receiptid'];
		$number=$_POST['number'];
		$recipient=$_POST['recipient'];
		$donor=$_POST['donor'];
		$realdate=$_POST['realdate'];
		$description=$_POST['description'];
		$amount=$_POST['amount'];
		$reason=$_POST['tireason'];

		

		$result1 = mysqli_query($sqlcon, "UPDATE `5inarch`.`tickets` SET `tiamount` = '$amount', `tidonor` = '$donor', `tirecipient` = '$recipient', `tirealdate` = '$realdate', `tireason` = '$reason', `tinumber` = '$number', `tidescription` = '$description' WHERE `tickets`.`tiid` = $receiptid;"); 
	}

	if ( $result1 ) 
		{ 
		header('Location: ../../receipt.php?backresult=1&receiptid='.$receiptid);
		$fh = fopen('/tmp/track.txt','a');
		fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
		fclose($fh);
		}
		else
		{ 
		header('Location: ../../receipt.php?backresult=0&receiptid='.$receiptid);
		$fh = fopen('/tmp/track.txt','a');
		fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
		fclose($fh);
	}  
?>
