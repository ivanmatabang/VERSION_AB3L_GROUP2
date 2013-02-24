<?php ?>

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

			<div id = 'accheader'
			>Welcome | 
			<a href = 'account.php'>Account</a> | 
			<a href = 'viewcart.php'>Cart</a>
			</div>

			<div id = 'menuheader'>

				<ul id = 'menu'>
					<?php
						if(isset($_SESSION['type']))
						{
							if(strcmp($_SESSION['type'], "administrator") == 0)
							{
					?>
						<a class = 'link' href = 'admin.php'><li>HOME</li></a>
					<?php
							}
							else
							{
					?>
						<a class = 'link' href = 'home.php'><li>HOME</li></a>
					<?php			
							}
						}
						else
						{
					?>
						<a class = 'link' href = 'home.php'><li>HOME</li></a>
					<?php
						}
					?>
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

				Welcome to UPBeat! Register now!<br/><br/>

				<form id = 'signup' action = 'process.php' method = 'post' name = 'signup' onsubmit = 'return validateForm();'>

					<table>

						<tr>
							<td>Username</td>
							<td><input type = 'text' name = 'upuname' id = 'upuname'></td>						
							<td><span id = 'unameerror'></span></td>
						</tr>

						<tr>
							<td>First Name</td>
							<td><input type = 'text' name = 'upfname' id = 'upfname'></td>
							<td><span id = 'fnameerror'></span></td>
						</tr>

						<tr>
							<td>Last Name</td>
							<td><input type = 'text' name = 'uplname' id = 'uplname'></td>						
							<td><span id = 'lnameerror'></span></td>
						</tr>

						<tr>
							<td>Mailing Address</td>
							<td><input type = 'text' name = 'upaddress' id = 'upaddress'></td>
							<td><span id = 'addresserror'></span></td>
						</tr>

						<tr>
							<td>Contact Number</td>
							<td><input type = 'text' onClick = "return empty(this);" name = 'upcontact' id = 'upcontact'></td>
							<td><span id = 'contacterror'></span></td>
						</tr>

						<tr>
							<td>E-mail</td>
							<td><input type = 'text' name = 'upemail' id = 'upemail'></td>						
							<td><span id = 'emailerror'></span></td>
						</tr>

						<tr>
							<td>Confirm E-mail</td>
							<td><input type = 'text' name = 'upconemail' id = 'upconemail'></td>
							<td><span id = 'conemailerror'></span></td>
						</tr>		

						<tr>
							<td>Password</td>
							<td><input type = 'password' name = 'upword' id = 'upword'></td>						
							<td><span id = 'passerror'></span></td>
						</tr>

						<tr>
							<td>Confirm Password</td>
							<td><input type = 'password' name = 'upconpword' id = 'upconpword'></td>
							<td><span id = 'conpasserror'></span></td>
						</tr>

						<tr>
							<td colspan = '3'></td>
						</tr>

						<tr>
							<td></td>
							<td colspan = '3'><input type = "submit" name = "signupbutton" value = "SIGN UP!"></td>
						</tr>

					</table>

				</form>

			</div>
			
			<div id = 'mainright'>

				LOG IN!<br/><br/>

				<form name = 'loginform' method = 'post' action = 'process.php'>

					Username: <input type = 'text' name = 'uname'/><br/><br/>
					Password: <input type = 'password' name = 'pword'/><br/><br/>
					<input type = 'submit' name = 'loginbutton' value = 'LOG IN'/>

				</form>

			</div>

		</div>

		<div id = 'footer'>Copyright 2013 UPBeat. All Rights Reserved.</div>

	</body>


</html>