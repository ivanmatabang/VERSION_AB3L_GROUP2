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

		$result = mysql_query("SELECT * from product where id=".(int)$id);
		
		$row = mysql_fetch_array($result);

		$result2 = mysql_query("SELECT * from product_color where prod_id=".(int)$id);

		$result3 = mysql_query("SELECT * from product_size where prod_id=".(int)$id);

		$result4 = mysql_query("SELECT * from product_key where prod_id=".(int)$id);
		
			
	}




?>

<html>
	<head>

	</head>

	<body>
	<form name = 'editproduct' method = 'post' action = 'process.php?id=<?php echo $id;?>'>
		Code: <input type = 'text' name = 'edcode' size = '15' value='<?php echo $row[1]; ?>'/><br />
		Image: <input type = 'text' name = 'edimage' size = '15' value='<?php echo $row[2]; ?>'/><br />
		Price: <input type = 'text' name = 'edprice' size = '15' value='<?php echo $row[3]; ?>'/><br />
		Description: <input type = 'text' name = 'eddesc' size = '15' value='<?php echo $row[4]; ?>'/><br />
		Gender Type: <input type = 'text' name = 'edgender' size = '15' value='<?php echo $row[5]; ?>'/><br />
		Shirt Type: <input type = 'text' name = 'edshirt' size = '15' value='<?php echo $row[6]; ?>'/><br />

	
		Colors: <input type = 'text' name = 'edcolors' size = '15' value='<?php 
			while ($row2 = mysql_fetch_array($result2, MYSQL_NUM))
			{
				echo $row2[1]." ";


			}
	?>'/><br />
		Sizes: <input type = 'text' name = 'edsizes' size = '15' value='<?php 
			while ($row3 = mysql_fetch_array($result3, MYSQL_NUM))
			{
				echo $row3[1]." ";
			}
		?>'/><br />
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