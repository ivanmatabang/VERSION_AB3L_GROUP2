<?php
	session_start();




	if(isset($_SESSION['uname']))
	{
		if(strcmp($_SESSION['type'], "administrator") == 0)
		{
			header("Location:admin.php");
		}
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