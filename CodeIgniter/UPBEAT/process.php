<?php
	session_start();
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


	if(isset($_POST['signupbutton']))
	{

		$result = mysql_query("INSERT INTO customer (id, fname, lname, username, email, address, contact, password, type) VALUES (".$_POST['upid'].", '".$_POST['upfname']."', '".$_POST['uplname']."', '".$_POST['upuname']."', '".$_POST['upemail']."', '".$_POST['upaddre']."', ".$_POST['upconta'].", '".$_POST['upword']."', 'customer')");
		
		if($result)
		{
   			echo "<br>Sign up succesful.";
   			$_SESSION['id'] = $_POST['upid'];
   			$_SESSION['uname'] = $_POST['upuname'];
   			$_SESSION['fname'] = $_POST['upfname'];
   			$_SESSION['lname'] = $_POST['uplname'];
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

	if(isset($_POST['loginbutton']))
	{

		$uname = $_POST['uname'];
		$pword = $_POST['pword'];
		$_SESSION['uname'] = $uname;

  		$result = mysql_query("SELECT * from customer where username='".$uname."'");
  		if($result)
		{
			$info = mysql_fetch_array($result);
			$_SESSION['id'] = $info['id'];
			$_SESSION['fname'] = $info['fname'];
			$_SESSION['lname'] = $info['lname'];
			$_SESSION['email'] = $info['email'];
			$_SESSION['address'] = $info['address'];
			$_SESSION['contact'] = $info['contact'];
			$_SESSION['type'] = $info['type'];
			$_SESSION['password'] = $info['password'];
   			if(strcmp($info['password'], $pword) == 0)
   			{
   				echo "<br>Log in successful.";
   				header("Location:home.php");
   			}
   			else
   			{
   				echo "<br>Log in error1.";
				session_destroy();
				header("Location:home.php");
   			}
		}
		else
		{
			echo "<br>Log in error2.";
			session_destroy();
			header("Location:home.php");
		}

		mysql_close($con);

	}

	if(isset($_POST['editacc']))
	{
		
		$result = mysql_query("UPDATE customer SET fname='".$_POST['acfname']."', lname='".$_POST['aclname']."', username='".$_POST['acuname']."', email='".$_POST['acemail']."', address='".$_POST['acaddre']."', contact=".$_POST['acconta'].", password='".$_POST['acnewword']."' where username='".$_SESSION['uname']."'");
		if($result)
		{
   			echo "<br>Updating Account succesful.";
   			$_SESSION['uname'] = $_POST['acuname'];
   			$_SESSION['fname'] = $_POST['acfname'];
   			$_SESSION['lname'] = $_POST['aclname'];
			$_SESSION['email'] = $_POST['acemail'];
			$_SESSION['address'] = $_POST['acaddre'];
			$_SESSION['contact'] = $_POST['acconta'];
			$_SESSION['type'] = "customer";
			$_SESSION['password'] = $_POST['acnewword'];
		}
		else
		{
			echo "<br>Update account error.";
		}

		mysql_close($con);
		header("Location:account.php");
	}

	if(isset($_GET['delacc']))
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
		session_destroy();
		header("Location:home.php");
	}

	if(isset($_GET['out']))
	{
		
		session_destroy();
		header("Location:home.php");
	}
?>