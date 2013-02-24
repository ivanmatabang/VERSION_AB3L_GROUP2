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




?>

<html>
	<head>

	</head>

	<body>
	<form name = 'editaccount' method = 'post' action = 'process.php'>
		<?php
		if(strcmp($_SESSION['type'], "customer") == 0)
		{
		?>
		First Name: <input type = 'text' name = 'acfname' size = '15' value='<?php echo $row[1]; ?>'/><br />
		Last Name: <input type = 'text' name = 'aclname' size = '15' value='<?php echo $row[2]; ?>'/><br />
		Username: <input type = 'text' name = 'acuname' size = '15' value='<?php echo $row[3]; ?>'/><br />
		Email Address: <input type = 'text' name = 'acemail' size = '15' value='<?php echo $row[4]; ?>'/><br />
		Address: <input type = 'text' name = 'acaddre' size = '15' value='<?php echo $row[5]; ?>'/><br />
		Contact Number: <input type = 'text' name = 'acconta' size = '15' value='<?php echo $row[6]; ?>'/><br />
		Current Password: <input type = 'password' name = 'acword' size = '15'/><br />
		New Password: <input type = 'password' name = 'acnewword' size = '15'/><br />
		Confirm Password: <input type = 'password' name = 'acconword' size = '15'/><br />
		<input type = 'submit' name = 'editacc' value='Save Changes'/>
		<?php
		}
		else
		{
		?>
		First Name: <input type = 'text' name = 'acfname' size = '15' value='<?php echo $row[1]; ?>'/><br />
		Last Name: <input type = 'text' name = 'aclname' size = '15' value='<?php echo $row[2]; ?>'/><br />
		Username: <input type = 'text' name = 'acuname' size = '15' value='<?php echo $row[3]; ?>'/><br />
		Current Password: <input type = 'password' name = 'acword' size = '15'/><br />
		New Password: <input type = 'password' name = 'acnewword' size = '15'/><br />
		Confirm Password: <input type = 'password' name = 'acconword' size = '15'/><br />
		<input type = 'submit' name = 'editacc' value='Save Changes'/>
		<?php
		}
		?>
	</form>
	</body>

</html>
<?php
mysql_close($con);	
?>