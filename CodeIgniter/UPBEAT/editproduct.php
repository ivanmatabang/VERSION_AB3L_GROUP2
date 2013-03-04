<?php
	session_start();




	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$username = "root";
		$password = "";
		$hostname = "localhost"; 

		$con = mysql_connect($hostname, $username, $password);
				
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}

		$db = mysql_select_db("upbeat", $con);
		if (!$db)
		{
		 	die('Could not connect: ' . mysql_error());
		}

		$result = mysql_query("SELECT * from product where id=".$id);
		
		$row = mysql_fetch_array($result);

		$result3 = mysql_query("SELECT * from product_size where prod_id=".$id);

		$result4 = mysql_query("SELECT * from product_key where prod_id=".$id);
		
		$result5 = mysql_query("SELECT count(prod_id) from product_size where prod_id=".$id);
		$row5 = mysql_fetch_array($result5);
	}




?>

<html>
	<head>

	</head>

	<body>
	<form name = 'editproduct' method = 'post' action = 'process.php?id=<?php echo $id;?>&&n=<?php echo $row5[0];?>'>
		Code: <input type = 'text' name = 'edcode' size = '15' value='<?php echo $row[1]; ?>'/><br />
		Image: <input type = 'text' name = 'edimage' size = '15' value='<?php echo $row[2]; ?>'/><br />
		Description: <input type = 'text' name = 'eddesc' size = '15' value='<?php echo $row[3]; ?>'/><br />
		Gender Type: <input type = 'text' name = 'edgender' size = '15' value='<?php echo $row[4]; ?>'/><br />
		Shirt Type: <input type = 'text' name = 'edshirt' size = '15' value='<?php echo $row[5]; ?>'/><br />

	
		Sizes: 
		<?php
			$yey = 1;
			while ($row3 = mysql_fetch_array($result3, MYSQL_NUM))
			{
				echo "<br /><input type = 'text' name = 'edsize".$yey."' size = '15' value='".$row3[1]."' />";
				echo "<input type = 'text' name = 'edprice".$yey++."' size = '15' value='".$row3[2]."' />";
			}
		?>
		<br />
		Keys: <input type = 'text' name = 'edkeys' size = '15' value='<?php 
			while ($row4 = mysql_fetch_array($result4, MYSQL_NUM))
			{
				echo $row4[1]." ";
			}
		?>'/><br />
		<input type = 'submit' name = 'editpro' value='Save Changes'/>
	</form>
	</body>


	<?php
	mysql_close($con);	

	?>
</html>