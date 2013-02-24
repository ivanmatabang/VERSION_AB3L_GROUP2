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

		$result = mysql_query("INSERT INTO customer (id, fname, lname, username, email, address, contact, password, type) 
							VALUES (NULL, '".
								$_POST['upfname']."', '".
								$_POST['uplname']."', '".
								$_POST['upuname']."', '".
								$_POST['upemail']."', '".
								$_POST['upaddress']."', ".
								$_POST['upcontact'].", '".
								$_POST['upword']."', 'customer')");
		
		if($result)
		{
   			echo "<br>Sign up succesful.";
   			$result2 = mysql_query("SELECT LAST_INSERT_ID()");
   			$row = mysql_fetch_array($result2);
   			$_SESSION['id'] = $row[0];
   			$_SESSION['uname'] = $_POST['upuname'];
   			$_SESSION['fname'] = $_POST['upfname'];
   			$_SESSION['lname'] = $_POST['uplname'];
			$_SESSION['email'] = $_POST['upemail'];
			$_SESSION['address'] = $_POST['upaddress'];
			$_SESSION['contact'] = $_POST['upcontact'];
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
		if(strcmp($_POST['uname'], "") != 0 && strcmp($_POST['pword'], "") != 0)
		{

		
		$_SESSION['uname'] = $uname;

  		$result = mysql_query("SELECT * from customer where username='".$uname."'");
  		if($result) echo ":(";
  		$result2 = mysql_query("SELECT * from administrator where username='".$uname."'");
  		if($result && $result2)
		{
			$info = mysql_fetch_array($result); 
			$info2 = mysql_fetch_array($result2); 
   			if(strcmp($info['password'], $pword) == 0)
   			{
   				$_SESSION['id'] = $info['id'];
				$_SESSION['fname'] = $info['fname'];
				$_SESSION['lname'] = $info['lname'];
				$_SESSION['type'] = $info['type'];
				$_SESSION['password'] = $info['password'];
   				echo "<br>Log in successful1.";
   			
				$_SESSION['email'] = $info['email'];
				$_SESSION['address'] = $info['address'];
				$_SESSION['contact'] = $info['contact'];
   				header("Location:home.php");
   				
   			}
   			else if(strcmp($info2['password'], $pword) == 0)
   			{
   				$_SESSION['id'] = $info2['id'];
				$_SESSION['fname'] = $info2['fname'];
				$_SESSION['lname'] = $info2['lname'];
				$_SESSION['type'] = $info2['type'];
				$_SESSION['password'] = $info2['password'];
   				echo "<br>Log in successful1.";
   				header("Location:admin.php");
   			}
   			else
   			{
   				echo "<br>Log in error1.";
				session_destroy();
				header("Location:register.php");
   			}
		}
		else
		{
			echo "<br>Log in error2.";
			session_destroy();
			header("Location:register.php");
		}
		}
		else
		{
						echo "<br>Log in error2.";
			session_destroy();
			header("Location:register.php");
		}
		mysql_close($con);

	}

	if(isset($_POST['editacc']))
	{
		if(strcmp($_SESSION['type'], "customer") == 0)
		{
			$result = mysql_query("UPDATE customer SET fname='".$_POST['acfname']."', lname='".$_POST['aclname']."', username='".$_POST['acuname']."', email='".$_POST['acemail']."', address='".$_POST['acaddre']."', contact=".$_POST['acconta'].", password='".$_POST['acnewword']."' where username='".$_SESSION['uname']."'");
		}
		else
		{
			$result = mysql_query("UPDATE administrator SET fname='".$_POST['acfname']."', lname='".$_POST['aclname']."', username='".$_POST['acuname']."', password='".$_POST['acnewword']."' where username='".$_SESSION['uname']."'");
		}
		if($result)
		{
   			echo "<br>Updating Account succesful.";
   			$_SESSION['uname'] = $_POST['acuname'];
   			$_SESSION['fname'] = $_POST['acfname'];
   			$_SESSION['lname'] = $_POST['aclname'];
   			if(strcmp($_SESSION['type'], "customer") == 0)
			{
			$_SESSION['email'] = $_POST['acemail'];
			$_SESSION['address'] = $_POST['acaddre'];
			$_SESSION['contact'] = $_POST['acconta'];
			}
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
		if(strcmp($_SESSION['type'], "customer") == 0)
		{
		$result = mysql_query("DELETE from customer where id=".$_SESSION['id']);
		}
		else
		{
		$result = mysql_query("DELETE from administrator where id=".$_SESSION['id']);
		}
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

	if(isset($_GET['delpro']))
	{
		echo "haha";
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
		
		$result = mysql_query("DELETE from product where id=".$_GET[id]);
		if($result)
		{
   			echo "<br>Delete Product succesful.";
		}
		else
		{
			echo "<br>Delete Producterror.";
		}
		$result = mysql_query("DELETE from product_color where prod_id=".$_GET[id]);
		if($result)
		{
   			echo "<br>Delete Product succesful.";
		}
		else
		{
			echo "<br>Delete Producterror.";
		}
		$result = mysql_query("DELETE from product_size where prod_id=".$_GET[id]);
		if($result)
		{
   			echo "<br>Delete Product succesful.";
		}
		else
		{
			echo "<br>Delete Producterror.";
		}
		$result = mysql_query("DELETE from product_key where prod_id=".$_GET[id]);
		if($result)
		{
   			echo "<br>Delete Product succesful.";
		}
		else
		{
			echo "<br>Delete Producterror.";
		}

		mysql_close($con);
		header("Location:home.php");
	}

	if(isset($_POST['editpro']))
	{
		echo "haha";
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
		
		$result = mysql_query("UPDATE product SET code='".$_POST['edcode']."', image='".$_POST['edimage']."', price=".$_POST['edprice'].", description='".$_POST['eddesc']."', gender_type='".$_POST['edgender']."', shirt_type='".$_POST['edshirt']."' where id=".(int)$_GET['id']);
		echo "UPDATE product SET code='".$_POST['edcode']."', image='".$_POST['edimage']."', price=".$_POST['edprice'].", description='".$_POST['eddesc']."', gender_type='".$_POST['edgender']."', shirt_type='".$_POST['edshirt']."' where id=".(int)$_GET['id'];
		if($result)
		{
   			echo "<br>Edit Product succesful.";
		}
		else
		{
			echo "<br>Edit Product dderror.";
		}
		$id = $_GET['id'];
		$result = mysql_query("DELETE from product_color where prod_id=".$id);

		$colors = $_POST['edcolors'];
		$token = strtok($colors, " ");

		while ($token != false)
	 	{
	 		echo "INSERT INTO product_color (prod_id, prod_color) VALUES (".$id.", '".$token."')";
	 		$result = mysql_query("INSERT INTO product_color (prod_id, prod_color) VALUES (".$id.", '".$token."')");
	 		$token = strtok(" ");
	 	}

	 	$result = mysql_query("DELETE from product_size where prod_id=".$id);
		$sizes = $_POST['edsizes'];
		$token = strtok($sizes, " ");

		while ($token != false)
	 	{
	 		$result = mysql_query("INSERT INTO product_size (prod_id, prod_size) VALUES (".$id.", '".$token."')");
	 		$token = strtok(" ");
	 	} 
	 	$result = mysql_query("DELETE from product_key where prod_id=".$id);
		$keys = $_POST['edkeys'];
		$token = strtok($keys, " ");

		while ($token != false)
	 	{
	 		$result = mysql_query("INSERT INTO product_key (prod_id, prod_key) VALUES (".$id.", '".$token."')");
	 		echo "INSERT INTO product_key (prod_id, prod_key) VALUES (".$id.", '".$token."')";
	 		$token = strtok(" ");
	 	} 

		mysql_close($con);
		header("Location:collections.php?all=1");
	}

	if(isset($_GET['delcus']))
	{
		echo "haha";
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
		
		$result = mysql_query("DELETE from customer where id=".$_GET['id']);
		if($result)
		{
   			echo "<br>Delete Product succesful.";
		}
		else
		{
			echo "<br>Delete Producterror.";
		}

		mysql_close($con);
		header("Location:viewcustomers.php?viewcus=1");
	}


	if(isset($_POST['addpro']))
	{
		echo "INSERT INTO product (id, code, image, price, description, gender_type, shirt_type) 
							VALUES (NULL, '".
								$_POST['addcode']."', '".
								$_POST['addimage']."','".
								$_POST['addprice'].", '".
								$_POST['adddesc']."', '".
								$_POST['addgender']."', '".
								$_POST['addshirt']."')";
		$result = mysql_query("INSERT INTO product (id, code, image, price, description, gender_type, shirt_type) 
							VALUES (NULL, '".
								$_POST['addcode']."', '".
								$_POST['addimage']."',".
								$_POST['addprice'].", '".
								$_POST['adddesc']."', '".
								$_POST['addgender']."', '".
								$_POST['addshirt']."')");
		
		if($result)
		{
   			echo "<br>Sign up succesful.";
		}
		else
		{
			echo "<br>Sign up error.";
		}
		$result2 = mysql_query("SELECT LAST_INSERT_ID()");
   		$row = mysql_fetch_array($result2);
		$colors = $_POST['addcolors'];
		$token = strtok($colors, " ");
		while ($token != false)
	 	{
	 		echo "INSERT INTO product_color (prod_id, prod_color) VALUES (".$row[0].", '".$token."')";
	 		$result = mysql_query("INSERT INTO product_color (prod_id, prod_color) VALUES (".$row[0].", '".$token."')");
	 		$token = strtok(" ");
	 	}
		$sizes = $_POST['addsizes'];
		$token = strtok($sizes, " ");
		while ($token != false)
	 	{
	 		$result = mysql_query("INSERT INTO product_size (prod_id, prod_size) VALUES (".$row[0].", '".$token."')");
	 		$token = strtok(" ");
	 	} 
		$keys = $_POST['addkeys'];
		$token = strtok($keys, " ");
		while ($token != false)
	 	{
	 		$result = mysql_query("INSERT INTO product_key (prod_id, prod_key) VALUES (".$row[0].", '".$token."')");
	 		echo "INSERT INTO product_key (prod_id, prod_key) VALUES (".$row[0].", '".$token."')";
	 		$token = strtok(" ");
	 	} 
		mysql_close($con);
		header("Location:admin.php");

	}

	if(isset($_POST['addadmin']))
	{
		$result = mysql_query("INSERT INTO administrator (id, fname, lname, username, password, type) 
							VALUES (NULL, '".
								$_POST['adminfname']."', '".
								$_POST['adminlname']."', '".
								$_POST['adminuname']."', '".
								$_POST['adminpword']."', 'administrator')");
		
		if($result)
		{
   			echo "<br>Sign up succesful.";
		}
		else
		{
			echo "<br>Sign up error.";
		}
		mysql_close($con);
		header("Location:admin.php");

	}
?>