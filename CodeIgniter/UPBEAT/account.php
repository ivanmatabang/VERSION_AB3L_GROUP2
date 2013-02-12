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

		$result = mysql_query("SELECT * from customer where username='".$_SESSION['uname']."'");
		
		$row = mysql_fetch_array($result);
		$rowfname = $row[1];
		$rowlname = $row[2];
		$rowuname = $row[3];
		$rowemail = $row[4];
		$rowaddress = $row[5];
		$rowcontact = $row[6];
		mysql_close($con);		
	}

?>

<html>
	<head>

	</head>

	<body>
		First Name: <?php echo $rowfname; ?><br />
		Last Name: <?php echo $rowlname; ?><br />
		Username: <?php echo $rowuname; ?><br />
		Email Address: <?php echo $rowemail; ?><br />
		Address: <?php echo $rowaddress; ?><br />
		Contact Number: <?php echo $rowcontact; ?><br />
		<a class = 'links' href = 'editaccount.php'>Edit Account</a> | <a class = 'links' href = 'process.php?delacc=1'>Delete Account</a> <br />
	</body>

</html>