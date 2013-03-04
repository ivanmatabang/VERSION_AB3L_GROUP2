<?php
	session_start();

?>
<html>
	<head>

	</head>

	<body>
	<form name = 'addadministrator' method = 'post' action = 'process.php'>
		<table>
			<tr>
				<td>First Name:</td>
				<td><input type = 'text' name = 'adminfname' size = '15' value=''/><br /></td>
			</tr>

			<tr>
				<td>Last Name:</td>
				<td><input type = 'text' name = 'adminlname' size = '15' value=''/><br /></td>
			</tr>

			<tr>
				<td>Username:</td>
				<td><input type = 'text' name = 'adminuname' size = '15' value=''/><br /></td>
			</tr>

			<tr>
				<td>Password:</td>
				<td><input type = 'password' name = 'adminpword' size = '15' value=''/><br /></td>
			</tr>

			<tr>
				<td>Confirm Password:</td>
				<td><input type = 'password' name = 'adminconpword' size = '15' value=''/><br /></td>
			</tr>
		</table>

		<input type = 'submit' name = 'addadmin' value='Add Administrator'/>
	</form>
	</body>



</html>