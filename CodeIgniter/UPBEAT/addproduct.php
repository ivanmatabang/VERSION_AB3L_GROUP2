<?php
	session_start();

?>
<html>
	<head>

	</head>

	<body>
	<form name = 'addproduct' method = 'post' action = 'process.php'>
		<table>
			<tr>
				<td>Item Code:</td>
				<td><input type = 'text' name = 'addcode' size = '15' value=''/></td>
			</tr>
			<br />

			<tr>
				<td>Image:</td>
				<td><input type = 'text' name = 'addimage' size = '15' value=''/></td>
			</tr>
			<br />

			<tr>
				<td>Price:</td>
				<td><input type = 'text' name = 'addprice' size = '15' value=''/></td>
			</tr>
			<br />

			<tr>
				<td>Description:</td>
				<td><input type = 'text' name = 'adddesc' size = '15' value=''/></td>
			</tr>
			<br />

			<tr>
				<td>Gender Type:</td>
				<td><input type = 'radio' name = 'addgender' value='male'/>Male     <input type = 'radio' name = 'addgender' value='female'/>Female</td>
			</tr>
			<br />

			<tr>
				<td>Shirt Type:</td>
				<td><select name = 'addshirt'>
						<option value = 'typeshirt'>Shirt</option>
						<option value = 'type3/4'>3/4 Sleeves</option>
						<option value = 'typejacket'>Jacket</option>
						<option value = 'typecaps'>Cap</option>
					</select></td>
			</tr>
			<br />	

			<tr>
				<td>Colors:</td>
				<td><input type = 'text' name = 'addcolors' size = '15' value=''/></td>
			</tr>
			<br />

			<tr>
				<td>Sizes:</td>
				<td><select name = 'addsizes'>
						<option value = 'sizexs'>XS</option>
						<option value = 'sizes'>S</option>
						<option value = 'sizem'>M</option>
						<option value = 'sizel'>L</option>
						<option value = 'sizexl'>XL</option>
						<option value = 'sizexxl'>XXL</option>
					</select></td>
			</tr>
			<br />

			<tr>
				<td>Keys:</td>
				<td><input type = 'text' name = 'addkeys' size = '15' value=''/></td>
			</tr>
			<br />

			<tr>
				<td><input type = 'submit' name = 'addpro' value='Add to Shop'/></td>
			</tr>
		</table>
	</form>
	</body>



</html>