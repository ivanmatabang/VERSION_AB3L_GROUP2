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
	<form name = 'editaccount' method = 'post' action = 'process.php'>
		First Name: <input type = 'text' name = 'acfname' size = '15' value='<?php echo $rowfname; ?>'/><br />
		Last Name: <input type = 'text' name = 'aclname' size = '15' value='<?php echo $rowlname; ?>'/><br />
		Username: <input type = 'text' name = 'acuname' size = '15' value='<?php echo $rowuname; ?>'/><br />
		Email Address: <input type = 'text' name = 'acemail' size = '15' value='<?php echo $rowemail; ?>'/><br />
		Address: <input type = 'text' name = 'acaddre' size = '15' value='<?php echo $rowaddress; ?>'/><br />
		Contact Number: <input type = 'text' name = 'acconta' size = '15' value='<?php echo $rowcontact; ?>'/><br />
		Current Password: <input type = 'password' name = 'acword' size = '15'/><br />
		New Password: <input type = 'password' name = 'acnewword' size = '15'/><br />
		Confirm Password: <input type = 'password' name = 'acconword' size = '15'/><br />
		<input type = 'submit' name = 'editacc' value='Save Changes'/>
	</form>
	</body>

</html>