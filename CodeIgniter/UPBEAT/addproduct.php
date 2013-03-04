
<html>
	<head>

	</head>

	<body>
	<form name = 'addproduct' method = 'post' action = 'process.php?s=<?php echo $_GET['s'];?>'>
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
						<option value = 't-shirt'>Shirt</option>
						<option value = '3/4'>3/4 Sleeves</option>
						<option value = 'jacket'>Jacket</option>
						<option value = 'cap'>Cap</option>
						<option value = 'other'>Other</option>
					</select></td>
			</tr>
			<br />

			<?php
			for($j = 0 ; $j < $_GET['s'] ; $j++)
			{
				?>
			<tr>
				<td>Size:</td>
				<td><input type = 'text' name = 'addsize<?php $k = $j + 1; echo $k;?>' size = '15' /></td>
			
				<td>Price:</td>
				<td><input type = 'text' name = 'addprice<?php $k = $j + 1; echo $k;?>' size = '15' /></td>
			</tr>
			
			<?php
			}
			?>


			<tr>
				<td>Keys:</td>
				<td><input type = 'text' name = 'addkeys' size = '15' value=''/></td>
			</tr>
			<br />

			<tr>
				<td><input type = 'submit' name = 'addpro' value='Add to Shop' /></td>
			</tr>
		</table>
	</form>


		


	</body>



</html>