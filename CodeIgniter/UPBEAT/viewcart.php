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
		//echo $_SESSION['id'];
		$result = mysql_query("SELECT * FROM orderr where custom_id=".$_SESSION['id']." AND is_delivered='NO'");
		//echo "SELECT * FROM orderr where custom_id=".$_SESSION['id'];
		if($result)
		{

   			//echo "<br/>yey";
		}
		else
		{
			//echo "<br/>Delete Producterror.";
		}

		
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
	while($row = mysql_fetch_array($result, MYSQL_NUM))
	{
		echo $row[0]."  ".$row[1]."   ";
		echo "<a href = 'process.php?delcart=1&&pid=".$row[0]."'>Remove</a><br />";
	}
?>
</body>

</html>


<?php

mysql_close($con);	
?>