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
   			$_SESSION['logged'] = "1";
   			$_SESSION['uname'] = $_POST['upuname'];
   			$_SESSION['fname'] = $_POST['upfname'];
   			$_SESSION['lname'] = $_POST['uplname'];
			$_SESSION['email'] = $_POST['upemail'];
			$_SESSION['address'] = $_POST['upaddress'];
			$_SESSION['contact'] = $_POST['upcontact'];
			$_SESSION['type'] = "customer";
			$_SESSION['password'] = $_POST['upword'];
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
				$_SESSION['logged'] = "1";
   				header("Location:home.php");
   				
   			}
   			else if(strcmp($info2['password'], $pword) == 0)
   			{
   				$_SESSION['haha'] = "1";
   				$_SESSION['id'] = $info2['id'];
				$_SESSION['fname'] = $info2['fname'];
				$_SESSION['lname'] = $info2['lname'];
				$_SESSION['type'] = $info2['type'];
				$_SESSION['password'] = $info2['password'];
   				$_SESSION['logged'] = "1";
   				header("Location:admin.php");
   			}
   			else
   			{
   				echo "<br>Log in error1.";
				session_destroy();
				header("Location:signup.php");
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
			$_SESSION['edited'] = "1";
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
		session_start();
		$_SESSION['logged'] = "2";
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

  		//$result = mysql_query("UPDATE product SET available='NO' where id=".$_GET['id']);

		
		$result = mysql_query("DELETE from product where id=".$_GET[id]);
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
		//echo "haha";
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
		


		define('UPLOAD_PATH', $_SERVER['DOCUMENT_ROOT'] . 'upbeat.com/IMAGES/product/');
define('DISPLAY_PATH', 'IMAGES/product/');
define('MAX_FILE_SIZE', 2000000);
$permitted = array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif', 'image/jpg');



	$fileName = $_FILES['uploadpic']['name'];
	$tmpName = $_FILES['uploadpic']['tmp_name'];
	$fileSize = $_FILES['uploadpic']['size'];
	$fileType = $_FILES['uploadpic']['type'];

	echo $fileName;

	// get the file extension 
	$ext = substr(strrchr($fileName, "."), 1);
	// generate the random file name
	$randName = md5(rand() * time());

	// image name with extension
	$myfile = $randName . '.' . $ext;
	// save image path
	$path = UPLOAD_PATH . $myfile;

	if (in_array($fileType, $permitted) && $fileSize > 0 && $fileSize <= MAX_FILE_SIZE) {
		//store image to the upload directory
		$result = move_uploaded_file($tmpName, $path);

		if (!$result) {
			echo "Error uploading image file";
			exit;
		} else {
		$result = mysql_query("UPDATE product SET code='".$_POST['edcode']."', image='".$myfile."', description='".$_POST['eddesc']."', gender_type='".$_POST['edgender']."', shirt_type='".$_POST['edshirt']."' where id=".$_GET['id']);
		}
	} else {
		echo 'error upload file';
	}







		
	

		$id = $_GET['id'];
		$result = mysql_query("DELETE from product_size where prod_id=".$id);

	 	for($i=0;$i<$_GET['n'];$i++)
	 	{
			if(strcmp($_POST['edsize'.($i+1)], "") != 0 && strcmp($_POST['edprice'.($i+1)], "") != 0)
			{
			//	echo "<br />INSERT INTO product_size (prod_id, prod_size, price) VALUES (".$id.", '".$_POST['edsize'.($i+1)]."', ".$_POST['edprice'.($i+1)].")";
				$result3 = mysql_query("INSERT INTO product_size (prod_id, prod_size, price) VALUES (".$id.", '".$_POST['edsize'.($i+1)]."', ".$_POST['edprice'.($i+1)].")");
				if($result3){echo "yey";}else{echo "aww";}
			}
	 	}

	 	$result = mysql_query("DELETE from product_key where prod_id=".$id);
		$keys = $_POST['edkeys'];
		$token = strtok($keys, " ");

		while ($token != false)
	 	{
	 		$result = mysql_query("INSERT INTO product_key (prod_id, prod_key) VALUES (".$id.", '".$token."')");
	 	//echo "INSERT INTO product_key (prod_id, prod_key) VALUES (".$id.", '".$token."')";
	 		$token = strtok(" ");
	 	} 

		mysql_close($con);
		header("Location:collections.php?all=1");
	}

	if(isset($_GET['delcus']))
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
		$_SESSION['deletecustom'] = "1";
		header("Location:viewcustomers.php?start=0&page=1");
	}


	if(isset($_POST['addpro']))
	{
	
		

		

		echo $_SERVER['DOCUMENT_ROOT']."<br/>";
		define('UPLOAD_PATH', $_SERVER['DOCUMENT_ROOT'] . 'upbeat.com/IMAGES/product/');
define('DISPLAY_PATH', 'IMAGES/product/');
define('MAX_FILE_SIZE', 2000000);
$permitted = array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif', 'image/jpg');

	$fileName = $_FILES['uploadpic']['name'];
	echo $fileName;
	$tmpName = $_FILES['uploadpic']['tmp_name'];
	$fileSize = $_FILES['uploadpic']['size'];
	$fileType = $_FILES['uploadpic']['type'];
	if(!$fileName){
$result = mysql_query("INSERT INTO product (id, code, image, description, gender_type, shirt_type, available) 
							VALUES (NULL, '".
								$_POST['addcode']."', 'default.png', '".
								$_POST['adddesc']."', '".
								$_POST['addgender']."', '".
								$_POST['addshirt']."', 'YES')");
	}
	else{


	// get the file extension 
	$ext = substr(strrchr($fileName, "."), 1);
	// generate the random file name
	$randName = md5(rand() * time());

	// image name with extension
	$myfile = $randName . '.' . $ext;
	// save image path
	$path = UPLOAD_PATH . $myfile;
	echo $path;
	if (in_array($fileType, $permitted) && $fileSize > 0 && $fileSize <= MAX_FILE_SIZE) {
		//store image to the upload directory
		$result = move_uploaded_file($tmpName, $path);

		if (!$result) {
			echo "Error uploading image file";
			exit;
		} else {

		$result = mysql_query("INSERT INTO product (id, code, image, description, gender_type, shirt_type, available) 
							VALUES (NULL, '".
								$_POST['addcode']."', '".
								$myfile."', '".
								$_POST['adddesc']."', '".
								$_POST['addgender']."', '".
								$_POST['addshirt']."', 'YES')");
		}
	} else {
		echo 'error upload file';
	}
}

$result2 = mysql_query("SELECT LAST_INSERT_ID()");
   		$row = mysql_fetch_array($result2);
		$keys = $_POST['addkeys'];
		$token = strtok($keys, " ");
		while ($token != false)
	 	{
	 		$result = mysql_query("INSERT INTO product_key (prod_id, prod_key) VALUES (".$row[0].", '".$token."')");
	 	//	echo "INSERT INTO product_key (prod_id, prod_key) VALUES (".$row[0].", '".$token."')";
	 		$token = strtok(" ");
	 	} 
		
		

		for($i=0;$i<$_GET['s'];$i++)
		{
			
			if(strcmp($_POST['addsize'.($i+1)], "") != 0 && strcmp($_POST['addprice'.($i+1)], "") != 0)
			{
			//	echo "<br />INSERT INTO product_size (prod_id, prod_size, price) VALUES (".$row[0].", '".$_POST['addsize'.($i+1)]."', ".$_POST['addprice'.($i+1)].")";
				$result3 = mysql_query("INSERT INTO product_size (prod_id, prod_size, price) VALUES (".$row[0].", '".$_POST['addsize'.($i+1)]."', ".$_POST['addprice'.($i+1)].")");
				if($result3){echo "yey";}else{echo "aww";}
			}
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
		
		mysql_close($con);
		header("Location:admin.php");

	}

	if(isset($_POST['addcart']))
	{
		$result2 = mysql_query("select * from product_size where prod_id=".$_GET['pid']." AND prod_size='".$_POST['productsize']."'");
		$row2 = mysql_fetch_array($result2);
		$price = $row2[2]*$_POST['quantity'];
		$result = mysql_query("INSERT INTO orderr (id, prod_id, custom_id, quantity, price, is_delivered, date_ordered, time_ordered) 
							VALUES (NULL, ".
								$_GET['pid'].", ".
								$_SESSION['id'].", ".
								$_POST['quantity'].", ".
								$price.", 'NO', 
								CURDATE(), CURTIME())");
		echo  "INSERT INTO orderr (id, prod_id, custom_id, quantity, is_delivered, date_ordered, time_ordered) 
							VALUES (NULL, ".
								$_GET['pid'].", ".
								$_SESSION['id'].", ".
								$_POST['quantity'].", 'NO', 
								'CURDATE()', 'CURTIME()')";
		if($result)
		{
   			echo "<br>Sign up succesful.";
		}
		else
		{
			echo "<br>Sign up error.";
		}
		mysql_close($con);
		header("Location:store.php?cat=all&start=0&page=1");
	}


	if(isset($_GET['delcart']))
	{
		echo "DELETE from orderr where id=".$_GET['pid'];
		$result = mysql_query("DELETE from orderr where id=".$_GET['pid']);
		if($result)
		{
   			echo "<br>Delete Product succesful.";
		}
		else
		{
			echo "<br>Delete Producterror.";
		}

		mysql_close($con);
		header("Location:viewcart.php");
	}

	if(isset($_GET['approve']))
	{
		$result = mysql_query("UPDATE orderr SET is_delivered='YES' where id=".$_GET['oid']);
		if($result)
		{
   			echo "<br>Delete Product succesful.";
		}
		else
		{
			echo "<br>Delete Producterror.";
		}
		$result = mysql_query("INSERT INTO delivers (order_id, date_delivered, time_delivered) VALUES (".$_GET['oid'].", CURDATE(), CURTIME())");
		mysql_close($con);
		$_SESSION['checkorder'] = "1";
		header("Location:vieworders.php?start=0&page=1");
	}

	if(isset($_GET['uncheck']))
	{
		$result = mysql_query("UPDATE orderr SET is_delivered='NO' where id=".$_GET['oid']);
		if($result)
		{
   			echo "<br>Delete Product succesful.";
		}
		else
		{
			echo "<br>Delete Producterror.";
		}
		$result = mysql_query("DELETE from delivers where order_id=".$_GET['oid']);
		mysql_close($con);
		header("Location:vieworders.php?vieword=1");
	}

	if(isset($_GET['delsize']))
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
		
		$result = mysql_query("DELETE from product_size where prod_id=".$_GET['id']." AND prod_size='".$_GET['size']."'");
		if($result)
		{
   			echo "<br>Delete Product succesful.";
		}
		else
		{
			echo "<br>Delete Producterror.";
		}

		mysql_close($con);
		header("Location:editproduct.php?id=".$_GET['id']);
	}
?>