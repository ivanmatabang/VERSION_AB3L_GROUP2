<?php
	session_start();

?>
<html>
	<head>

	</head>

	<body>
	<form name = 'addadministrator' method = 'post' action = 'process.php'>
		First Name: <input type = 'text' name = 'adminfname' size = '15' value=''/><br />
		Last Name: <input type = 'text' name = 'adminlname' size = '15' value=''/><br />
		Username: <input type = 'text' name = 'adminuname' size = '15' value=''/><br />
		Password: <input type = 'password' name = 'adminpword' size = '15' value=''/><br />
		Confirm Password: <input type = 'password' name = 'adminconpword' size = '15' value=''/><br />

		<input type = 'submit' name = 'addadmin' value='Add Administrator'/>
	</form>
	</body>



</html>