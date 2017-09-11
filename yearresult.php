    <meta charset="utf-8">

<?php 
																require 'assets\redi\sqlcon.php';

if($_POST['id'])
	{
		$id=$_POST['id'];

		switch ($id) {
			case "1":
				$cuz='SELECT * FROM `students` WHERE `styear` = "الأولى"';
				break;
			case "2":
				$cuz='SELECT * FROM `students` WHERE `styear` = "الثانية"';
				break;
			case "3":
				$cuz='SELECT * FROM `students` WHERE `styear` = "الثالثة"';
				break;
			case "4":
				$cuz='SELECT * FROM `students` WHERE `styear` = "الرابعة"';
				break;
			case "5":
				$cuz='SELECT * FROM `students`';
				break;
			default:
				echo "Your favorite color is neither red, blue, nor green!";
		}	
		$result2 = mysqli_query($sqlcon, "$cuz");
		while ($row2 = $result2->fetch_assoc()) { 
		?>												
	<option value="<?php echo $row2['stid'] ?>"> <?php echo $row2['stname']." - ".$row2['styear']." - ".$row2['stgroup'] ?> </option>
	<?php }
	}
?>
