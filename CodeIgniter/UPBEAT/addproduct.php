<?php
	session_start();

?>
<html>
	<head>

	</head>

	<body>
	<form name = 'addproduct' method = 'post' action = 'process.php'>
		Code: <input type = 'text' name = 'addcode' size = '15' value=''/><br />
		Image: <input type = 'text' name = 'addimage' size = '15' value=''/><br />
		Price: <input type = 'text' name = 'addprice' size = '15' value=''/><br />
		Description: <input type = 'text' name = 'adddesc' size = '15' value=''/><br />
		Gender Type: <input type = 'text' name = 'addgender' size = '15' value=''/><br />
		Shirt Type: <input type = 'text' name = 'addshirt' size = '15' value=''/><br />

	
		Colors: <input type = 'text' name = 'addcolors' size = '15' value=''/><br />
		Sizes: <input type = 'text' name = 'addsizes' size = '15' value=''/><br />
		Keys: <input type = 'text' name = 'addkeys' size = '15' value=''/><br />
		<input type = 'submit' name = 'addpro' value='Add to Shop'/>
	</form>
	</body>



</html>