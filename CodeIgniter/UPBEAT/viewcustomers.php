<?php
	session_start();




	if(isset($_GET['viewcus']))
	{
		
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

		$result = mysql_query("SELECT * from customer");
		

		
	}



?>


<home>
	<head>

	</head>

	<body>

		<?php
		while ($row = mysql_fetch_array($result, MYSQL_NUM))
		{
			echo "<a class = 'links' href = 'viewcustomer.php?id=".$row[0]."'>".$row[3]."</a> ";
			echo "<a class = 'links' href = 'process.php?delcus=1&&id=".$row[0]."'>Delete Customer</a> <br />";
		}

		?>

	</body>
	<?php
		mysql_close($con);	
	?>
</home>