<?php
	session_start();




	if(isset($_SESSION['uname']))
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

		if(strcmp($_SESSION['type'], "customer") == 0)
		{
		$result = mysql_query("SELECT * from customer where id=".$_SESSION['id']);
		}
		else
		{
			
		$result = mysql_query("SELECT * from administrator where id=".$_SESSION['id']);	
		}
		$row = mysql_fetch_array($result);

		
	}
	else
	{
		header("Location:register.php");
	}

?>

<html>
	<head>

	</head>

	<body>
		<?php
		if(strcmp($_SESSION['type'], "customer") == 0)
		{
		?>
		First Name: <?php echo $row[1]; ?><br />
		Last Name: <?php echo $row[2]; ?><br />
		Username: <?php echo $row[3]; ?><br />
		Email Address: <?php echo $row[4]; ?><br />
		Address: <?php echo $row[5]; ?><br />
		Contact Number: <?php echo $row[6]; ?><br />
		<a class = 'links' href = 'editaccount.php'>Edit Account</a> | <a class = 'links' href = 'process.php?delacc=1'>Delete Account</a> <br />
		<?php
		}
		else
		{
		?>
		First Name: <?php echo $row[1]; ?><br />
		Last Name: <?php echo $row[2]; ?><br />
		Username: <?php echo $row[3]; ?><br />
		<a class = 'links' href = 'editaccount.php'>Edit Account</a> | <a class = 'links' href = 'process.php?delacc=1'>Delete Account</a> <br />
		<?php
		}

		?>
	</body>

</html>
<?php
mysql_close($con);		
?>