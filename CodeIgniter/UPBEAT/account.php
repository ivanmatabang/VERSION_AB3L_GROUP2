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
	}

	else header("Location:register.php");

?>

<html>

	<head>

		<title>UPBeat Online Shop</title>
		<link rel = "stylesheet" type = "text/css" href = "CSS/local.css">
		<link rel = "stylesheet" type = "text/css" href = "CSS/account.css">

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

			<div id = 'catheader'>HOME > Account</div>
			
		</div>

		<?php

			if(!isset($_POST['editacc']))
				echo "<div id = 'prompt'>Successfully edited account!</div>";

		?>

		<div id = 'mainaccount'>

			<div id = 'accleft'></div>

			<div id = 'accountdiv'>

				<?php
				
					if(strcmp($_SESSION['type'], "customer") == 0)
					{

						echo "

							<table>

								<tr>
									<td>First Name </td>
									<td>".$row[1]."</td>
								</tr>

								<tr>
									<td>Last Name</td>
									<td>".$row[2]."</td>
								</tr>

								<tr>
									<td>Username</td>
									<td>".$row[3]."</td>
								</tr>

								<tr>
									<td>Email Address</td>
									<td>".$row[4]."</td>
								</tr>

								<tr>
									<td>Address</td>
									<td>".$row[5]."</td>
								</tr>

								<tr>
									<td>Contact Number</td>
									<td>".$row[6]."</td>
								</tr>

								<tr><td colspan = '2'>&nbsp;</td></tr>

								<tr>
									<td><a href = 'editaccount.php'><input type = 'submit' name = 'editacc' value = 'EDIT ACCOUNT'/></a></td>
									<td><a href = 'process.php?delacc=1'><input type = 'submit' name = 'delacc' value = 'DELETE ACCOUNT'/></a></td>
								</tr>

							</table>

						";
					}
					else
					{
						echo "

							<table>

								<tr>
									<td>First Name </td>
									<td>".$row[1]."</td>
								</tr>

								<tr>
									<td>Last Name</td>
									<td>".$row[2]."</td>
								</tr>

								<tr>
									<td>Username</td>
									<td>".$row[3]."</td>
								</tr>

								<tr><td colspan = '2'>&nbsp;</td></tr>

								<tr>
									<td><a href = 'editaccount.php'><input type = 'submit' name = 'editacc' value = 'EDIT ACCOUNT'/></a></td>
									<td><a href = 'process.php?delacc=1'><input type = 'submit' name = 'delacc' value = 'DELETE ACCOUNT'/></a></td>
								</tr>

							</table>

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