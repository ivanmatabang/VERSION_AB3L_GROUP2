<?php
	session_start();




	if(isset($_GET['vieword']))
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

		$result = mysql_query("SELECT * from orderr where is_delivered='NO'");
		$result1 = mysql_query("SELECT * from orderr where is_delivered='YES'");
		

		
	}



?>


<home>
	<head>

	</head>

	<body>

		<?php
		while ($row = mysql_fetch_array($result, MYSQL_NUM))
		{
			echo $row[0]." ";
			echo "<a class = 'links' href = 'process.php?approve=1&&oid=".$row[0]."'>Check</a> <br />";
		}
		echo "<br /><br />";
		while ($row = mysql_fetch_array($result1, MYSQL_NUM))
		{
			echo $row[0]." ";
			echo "<a class = 'links' href = 'process.php?uncheck=1&&oid=".$row[0]."'>Uncheck</a><br />";
		}

		?>

	</body>
	<?php
		mysql_close($con);	
	?>
</home>