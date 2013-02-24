<?php
	session_start();
	
	$id = $_GET['id'];
	//echo $_GET['id'];
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
	//echo "SELECT * FROM customer WHERE id=".$id;
	$result = mysql_query("SELECT * FROM customer WHERE id=".$id);

	$row = mysql_fetch_array($result);
	

?>

<home>

	<head>

	</head>

	<body>
			<?php
				echo $row[0]."<br />";
				echo $row[1]."<br />";
				echo $row[2]."<br />";
			?>

			<a class = 'links' href = 'process.php?delcus=1&&id=<?php echo $id;?>'>Delete Customer</a> <br />
	</body>


</home>

<?php
	mysql_close($con);	

?>