<?php
	session_start();
	$username = "root";
	$password = "";
	$hostname = "localhost"; 
	
	if(isset($_POST['submit_signup']))
	{

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
		
		$result = mysql_query("INSERT INTO customer (name, username, email_address, address, contact_number, password, type) VALUES ('".$_POST['upfname']."', '".$_POST['upuname']."', '".$_POST['upemail']."', '".$_POST['upaddre']."', ".$_POST['upconta'].", '".$_POST['upword']."', 'customer')");
		if($result)
		{
   			echo "<br>Sign up succesful.";
   			$_SESSION['uname'] = $_POST['upuname'];
   			$_SESSION['fname'] = $_POST['upfname'];
			$_SESSION['email'] = $_POST['upemail'];
			$_SESSION['address'] = $_POST['upaddre'];
			$_SESSION['contact'] = $_POST['upconta'];
			$_SESSION['type'] = "customer";
			$_SESSION['password'] = $_POST['upword'];
		}
		else
		{
			echo "<br>Sign up error.";
		}

		mysql_close($con);
		header("Location:home.php");

	}

	if(isset($_POST['submit_login']))
	{

		$uname = $_POST['uname'];
		echo $uname;
		$pword = $_POST['pword'];
		$_SESSION['uname'] = $uname;
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

  		$result = mysql_query("SELECT * from customer where username='".$uname."'");
  		if($result)
		{
			$info = mysql_fetch_array($result);
			$_SESSION['fname'] = $info['name'];
			$_SESSION['email'] = $info['email_address'];
			$_SESSION['address'] = $info['address'];
			$_SESSION['contact'] = $info['contact_number'];
			$_SESSION['type'] = $info['type'];
			$_SESSION['password'] = $info['password'];
   			if(strcmp($info['password'], $pword) == 0)
   			{
   				echo "<br>Log in successful.";
   				header("Location:home.php");
   			}
   			else
   			{
   				echo "<br>Log in error.";
				session_destroy();
				header("Location:home.php");
   			}
		}
		else
		{
			echo "<br>Log in error.";
			session_destroy();
			header("Location:home.php");
		}

		mysql_close($con);

	}

	if(isset($_POST['submit_saveacc']))
	{
		
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
		
		$result = mysql_query("UPDATE customer SET name='".$_POST['acfname']."', username='".$_POST['acuname']."', email_address='".$_POST['acemail']."', address='".$_POST['acaddre']."', contact_number=".$_POST['acconta'].", password='".$_POST['acwordb']."' where username='".$_POST['acuname']."'");
		if($result)
		{
   			echo "<br>Updating Account succesful.";
   			$_SESSION['uname'] = $_POST['acuname'];
   			$_SESSION['fname'] = $_POST['acfname'];
			$_SESSION['email'] = $_POST['acemail'];
			$_SESSION['address'] = $_POST['acaddre'];
			$_SESSION['contact'] = $_POST['acconta'];
			$_SESSION['type'] = "customer";
			$_SESSION['password'] = $_POST['acwordb'];
		}
		else
		{
			echo "<br>Update account error.";
		}

		mysql_close($con);
		header("Location:home.php");
	}

	if(isset($_POST['submit_deleteacc']))
	{
		
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
		
		$result = mysql_query("DELETE from customer where username='".$_SESSION['uname']."'");
		if($result)
		{
   			echo "<br>Delete Account succesful.";
		}
		else
		{
			echo "<br>Delete account error.";
		}

		mysql_close($con);
		header("Location:index.php");
	}
?>