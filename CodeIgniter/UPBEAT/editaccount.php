<?php

	session_start();

	if(isset($_SESSION['uname']))
	{
		$username = "root";
		$password = "";
		$hostname = "localhost"; 

		$con = mysql_connect($hostname, $username, $password);
				
		if (!$con) die('Could not connect: ' . mysql_error());
		
		$db = mysql_select_db("upbeat", $con);
		
		if (!$db) die('Could not connect: ' . mysql_error());

		if(strcmp($_SESSION['type'], "customer") == 0)
			$result = mysql_query("SELECT * from customer where id=".$_SESSION['id']);
		else
			$result = mysql_query("SELECT * from administrator where id=".$_SESSION['id']);	
		
		$row = mysql_fetch_array($result);
		$pass = $_SESSION["password"];
	}

?>

<html>

	<head>

		<title>UPBeat Online Shop</title>
		<link rel = "stylesheet" type = "text/css" href = "CSS/local.css">
		<link rel = "stylesheet" type = "text/css" href = "CSS/account.css">
		<script type = "text/javascript" src = "SCRIPTS/validate.js"></script>

		<script type="text/javascript">

			function srch() {document.searchform.searchbox.value = "";}

		</script>

	</head>

	<body>

		<div id = 'header'>
			<div id = 'logo'></div>

			<div id = 'accheader'>
				
				<?php
					if(isset($_SESSION['uname']))
					{
						echo "Welcome, "."<a href = 'account.php'>".$_SESSION['fname']."</a>";
					}
					else echo "Welcome | <a href = 'register.php'>Account</a>";
				?> |

				<a href = 'viewcart.php'>Cart</a>
			</div>

			<div id = 'menuheader'>

				<ul id = 'menu'>

					<?php

						if(isset($_SESSION['type']))
						{
							if(strcmp($_SESSION['type'], "administrator") == 0)
								{ echo "<a class = 'link' href = 'admin.php'><li>HOME</li></a>";}
							else
								{ echo "<a class = 'link' href = 'home.php'><li>HOME</li></a>";}
						}
						else { echo "<a class = 'link' href = 'home.php'><li>HOME</li></a>";}
					?>

					<a class = 'link' href = 'collections.php?all=1'><li>COLLECTIONS</li></a>
					<a class = 'link' href = 'store.php?all=1'><li>STORE</li></a>
					
					<?php

						if(isset($_SESSION['uname']))
							{ echo "<a class = 'link' href = 'process.php?out=1'><li>LOG OUT</li></a>";}
						else
							{ echo "<a class = 'link' href = 'register.php'><li>LOG IN</li></a>";}
					?>
					

					<li>
						<form name = 'searchform' action = 'results.php' method = 'post'>
							<div id = 'searchline'>
								<input type = 'text' value = 'Search' name = 'searchbox' id = 'boxsize' onClick = 'return srch(this);'/>
								<input type = 'submit' name = 'sbox' value = '' id = 'srchbutton'/>
							</div>
						</form>
					</li>
				</ul>

			</div>

			<div id = 'catheader'>HOME > Account > Edit Account</div>
			
		</div>

		<div id = 'mainaccount'>

			<div id = 'accleft'></div>

			<div id = 'accountdiv'>
					
				<?php
				
					if(strcmp($_SESSION['type'], "customer") == 0)
					{
						echo "

							<form name = 'editaccount' method = 'post' action = 'process.php'>

								<table>

									<tr>
										<td>First Name</td>
										<td><input type = 'text' name = 'acfname' value='".$row[1]."'></td>
										<td><span id = 'editfname'></span></td>
									</tr>

									<tr>
										<td>Last Name</td>
										<td><input type = 'text' name = 'aclname' value='".$row[2]."'></td>
										<td><span id = 'editlname'></span></td>
									</tr>

									<tr>
										<td>Username</td>
										<td><input type = 'text' name = 'acuname' value='".$row[3]."'></td>
										<td><span id = 'edituname'></span></td>
									</tr>

									<tr>
										<td>Email Address</td>
										<td><input type = 'email' name = 'acemail' value='".$row[4]."'></td>
										<td><span id = 'editemail'></span></td>
									</tr>

									<tr>
										<td>Address</td>
										<td><input type = 'text' name = 'acaddre' value='".$row[5]."'></td>
										<td><span id = 'editaddress'></span></td>
									</tr>

									<tr>
										<td>Contact Number</td>
										<td><input type = 'text' name = 'acconta' value='".$row[6]."'></td>
										<td><span id = 'editcontact'></span></td>
									</tr>

									<tr>
										<td>Current Password</td>
										<td><input type = 'password' name = 'acpword'/></td>
										<td><span id = 'editpword'></span></td>
									</tr>

									<tr>
										<td>New Password</td>
										<td><input type = 'password' name = 'acnewword'/></td>
										<td><span id = 'editnewword'></span></td>
									</tr>

									<tr>
										<td>Confirm Password</td>
										<td><input type = 'password' name = 'acconpword'/></td>
										<td><span id = 'editconpword'></span></td>
									</tr>

									<tr>
										<td colspan = '2'><input type = 'hidden' name = 'hidepword' value = '".$pass."'</td>
									</tr>

									<tr>
										<td></td>
										<td><input type = 'submit' name = 'editacc' onclick = 'return validEdit();' value = 'Save Changes'/></td>
									</tr>

								</table>

							</form>

						";
					}

					else
					{
						echo "

							<form name = 'editaccountadmin' method = 'post' action = 'process.php'>

								<table>

									<tr>
										<td>First Name</td>
										<td><input type = 'text' name = 'acfname' value='".$row[1]."'></td>
										<td><span id = 'editfname'></span></td>
									</tr>

									<tr>
										<td>Last Name</td>
										<td><input type = 'text' name = 'aclname' value='".$row[2]."'></td>
										<td><span id = 'editlname'></span></td>
									</tr>

									<tr>
										<td>Username</td>
										<td><input type = 'text' name = 'acuname' value='".$row[3]."'></td>
										<td><span id = 'edituname'></span></td>
									</tr>

									<tr>
										<td>Current Password</td>
										<td><input type = 'password' name = 'acpword'/></td>
										<td><span id = 'editpword'></span></td>
									</tr>

									<tr>
										<td>New Password</td>
										<td><input type = 'password' name = 'acnewword'/></td>
										<td><span id = 'editnewword'></span></td>
									</tr>

									<tr>
										<td>Confirm Password</td>
										<td><input type = 'password' name = 'acconword'/></td>
										<td><span id = 'editconpword'></span></td>
									</tr>

									<tr>
										<td colspan = '2'><input type = 'hidden' name = 'hidepword' value = '".$pass."'</td>
									</tr>

									<tr>
										<td></td>
										<td><input type = 'submit' name = 'editacc' onclick = 'return adminEdit();' value='Save Changes'/></td>
									</tr>

								</table>

							</form>

						";
					}
				?>

			</div>
		</div>

	</body>

</html>
<?php
mysql_close($con);	
?>