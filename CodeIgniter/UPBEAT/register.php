<?php 

	session_start();
	$username = "root";
	$password = "";
	$hostname = "localhost"; 
	
	$con = mysql_connect($hostname, $username, $password);
		
	if (!$con) die('Could not connect: ' . mysql_error());
	$db = mysql_select_db("upbeat", $con);
	if (!$db)	die('Could not connect: ' . mysql_error());

?>

<html>

	<head>

		<title>UPBeat Online Shop</title>
		<link rel = "stylesheet" type = "text/css" href = "CSS/local.css">
		<link rel = "stylesheet" type = "text/css" href = "CSS/register.css">
		<script type = "text/javascript" src = "SCRIPTS/jquery.js"></script>
		<script type = "text/javascript" src = "SCRIPTS/validate.js"></script>

	</head>

	<body>

		<div id = 'header'>
			<div id = 'logo'></div>

			<div id = 'accheader'>Welcome | Account | Cart </div>

			<div id = 'menuheader'>

				<ul id = 'menu'>
					<a class = 'link' href = 'home.php'><li>HOME</li></a>
					<a class = 'link' href = 'collections.php'><li>COLLECTIONS</li></a>
					<a class = 'link' href = 'store.php'><li>STORE</li></a>
					<a class = 'link' href = 'register.php'><li>LOG IN</li></a>
					<li>SEARCH</li>
				</ul>

			</div>

			<div id = 'catheader'>HOME > LOG IN</div>
		</div>

		<!-- Please don't edit above codes... Final -->

		<div id = 'maincontainer'>

			<div id = 'mainleft'>

				<br/><div class = 'divspan'>
					<span id = 'filluperror'>

						<?php 
							
							if(isset($_POST['signupbutton']))
							{
								$uname = $_POST['upuname'];
								$_SESSION['uname'] = $uname;

								$result = mysql_query("SELECT * from customer where username='".$uname."'");
					  			$result2 = mysql_query("SELECT * from administrator where username='".$uname."'");
					  			
					  			if ($result && $result2)
					  			{
					  				$info = mysql_fetch_array($result); 
									$info2 = mysql_fetch_array($result2);

									if(strcmp($info['username'], $uname) == 0 || strcmp($info2['username'], $uname) == 0)
						   			{
						   				echo "Username not available!";
						   			}
						   			else
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

										mysql_close($con);
										header("Location:home.php");
						   			}
					  			}

								mysql_close($con);
							}

							else echo "Please fill up all fields.";

						?>

					</span>
				</div>

				<form name = 'signupform' method = 'post' action = '' onsubmit = 'return validateForm();'>

					<table>

						<tr>
							<td class = 'field'>Username</td>
							<td><input type = 'text' class = 'inputbox' name = 'upuname'></td>
						</tr>

						<tr>
							<td class = 'field'>First Name</td>
							<td><input type = 'text' class = 'inputbox' name = 'upfname'></td>
						</tr>

						<tr>
							<td class = 'field'>Last Name</td>
							<td><input type = 'text' class = 'inputbox' name = 'uplname'></td>
						</tr>

						<tr>
							<td class = 'field'>Mailing Address</td>
							<td><input type = 'text' class = 'inputbox' name = 'upaddress'></td>
						</tr>

						<tr>
							<td class = 'field'>Contact Number</td>
							<td><input type = 'text' class = 'inputbox' name = 'upcontact'></td>
						</tr>

						<tr>
							<td class = 'field'>E-mail</td>
							<td><input type = 'email' class = 'inputbox' name = 'upemail'></td>
						</tr>

						<tr>
							<td class = 'field'>Confirm E-mail</td>
							<td><input type = 'text' class = 'inputbox' name = 'upconemail'></td>
						</tr>		

						<tr>
							<td class = 'field'>Password</td>
							<td><input type = 'password' class = 'inputbox' name = 'upword'></td>
						</tr>

						<tr>
							<td class = 'field'>Confirm Password</td>
							<td><input type = 'password' class = 'inputbox' name = 'upconpword'></td>
						</tr>

						<tr>
							<td></td>
							<td colspan = '2'><input type = 'submit' class = 'logdiv' name = 'signupbutton' value = "SIGN UP"></td>
						</tr>

					</table>

				</form>

			</div>
			
			<div id = 'mainright'>

				<br/><div class = 'divspan'>
					
					<span  id = 'fillerror'>

						<?php 
							
							if(isset($_POST['loginbutton']))
							{
								$uname = $_POST['uname'];
								$pword = $_POST['pword'];

								if(strcmp($_POST['uname'], "") != 0 && strcmp($_POST['pword'], "") != 0)
								{
									$_SESSION['uname'] = $uname;
									$result = mysql_query("SELECT * from customer where username='".$uname."'");
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
							   				header("Location:admin.php");
							   			}

							   			else echo "Username/Password did not match!";
									}

									mysql_close($con);
								}
							}

							else echo "Fill in form to log in.";

						?>
					</span>

				</div>

				<form name = 'loginform' method = 'post' action = '' onsubmit = 'return validateLogin();'>

					<table>

						<tr>
							<td>Username </td>
							<td><input type = 'text' class = 'inputbox2' name = 'uname'/></td>
						</tr>

						<tr>
							<td>Password </td>
							<td><input type = 'password' class = 'inputbox2' name = 'pword'/></td>
						</tr>

						<tr><td colspan = '2'>&nbsp;</td></tr>

						<tr>
							<td colspan = '2'><span id = 'fillerror'></span></td>
						</tr>

						<tr>
							<td></td>
							<td><input type = 'submit' class = 'logdiv' name = 'loginbutton' value = 'LOG IN'/></td>
						</tr>

					</table>

				</form>

			</div>

		</div>

		<div id = 'footer'>Copyright 2013 UPBeat. All Rights Reserved.</div>

	</body>

</html>