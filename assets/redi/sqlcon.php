<?php
		// Configure connection settings
		$db = '5inarch';
		$db_admin = 'root';
		$db_password = 'root';
		$sqlcon = mysqli_connect("localhost", "$db_admin", "$db_password", "$db");
		
		// show arabic result
		$arabicsql= 'SET CHARACTER SET utf8'; 
		mysqli_query($sqlcon,$arabicsql); 
?>