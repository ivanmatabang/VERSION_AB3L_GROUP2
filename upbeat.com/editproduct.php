<?php
	session_start();




	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
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

		$result = mysql_query("SELECT * from product where id=".$id);
		
		$row = mysql_fetch_array($result);

		$result3 = mysql_query("SELECT * from product_size where prod_id=".$id);

		$result4 = mysql_query("SELECT * from product_key where prod_id=".$id);
		
		$result5 = mysql_query("SELECT count(prod_id) from product_size where prod_id=".$id);
		$row5 = mysql_fetch_array($result5);
	}




?>

<html>
	<head>
		<title>UPBeat Online Shop</title>
		<link rel="stylesheet" type="text/css" href="CSS/local.css">
		<link rel="stylesheet" type="text/css" href="CSS/product.css">
		<script type="text/javascript" src="SCRIPTS/jquery.js"></script> 
		<script type="text/javascript" src="SCRIPTS/validate.js"></script>
		<script>
			function validateProduct(s)
			{
				
				s = s+"";
				var fcount;
				var lcount;
				var number = "0123456789";
				var alpha = "abcdefghijklmnopqrstuvwxyz ";
				var code = document.forms["editproduct"]["edcode"].value;
				var desc = document.forms["editproduct"]["eddesc"].value;

				var keys = document.forms["editproduct"]["edkeys"].value;
				

				var sizes = new Array();
				var prices = new Array();
				var j = "1";
				var k = true;
				for(var i=0; i < s; i++)
				{
					sizes[i] =  document.forms["editproduct"]["edsize"+j].value;
				
					if(!sizes[i]) k = false;
					prices[i] =  document.forms["editproduct"]["edprice"+j].value;
				
					if(!prices[i]) k = false;
					var count = checkInvalid(prices[i],number);
					if(count < prices[i].length) { k = false;document.getElementById("edspanpprice"+(j++)).innerHTML = "Input price is not a number!";}
				
				}

				

				if (!code || !desc || !keys || !k)
					{ document.getElementById("edspanpfull").innerHTML = "Please fill up all fields!"; k = false}
				if(checkInvalid(keys,number+alpha) < keys.length)  { k=false;document.getElementById("edspanptags").innerHTML = "Special character not allowed!";}
				
				return k;
			}
			function checkInvalid(nvalue,compare)
			{
				var i;
				var j;
				var count = 0;

				for (i = 0; i < nvalue.length; i++)
					for (j = 0; j < compare.length; j++)
						if (nvalue[i].toLowerCase() == compare[j]) count++;

				return count;
			}
		</script>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	</head>

	<body>
		<div id = 'header'>

			<div id = 'srchline'>
				<input id = 'sbutton' type = 'submit' name = '' value = ''/>
				<input id = 'stxtbox' type = 'text' name = '' value = 'Search' />
			</div>

			<div id = 'menuline'>

				<ul id = 'menulist'>

					<li id = 'last'>
						<?php
							
							if (isset($_SESSION['uname'])){ echo "Hi ".$_SESSION['fname']."!";}
							else echo "Log in";
						?>
					</li>

					<li>Cart</li>
					<li><a class = 'link' href = 'store.php?start=0&page=1'>Store</a></li>
					<li><a class = 'link' href = 'collections.php'>Collections</a></li>

					<li id = 'home'>
						<?php

							if(isset($_SESSION['type']))
							{
								if(strcmp($_SESSION['type'], "administrator") == 0)
									echo "<a class = 'link' href = 'admin.php'>Home</a>";
								else echo "<a class = 'link' href = 'home.php'>Home</a>";
							}
							else echo "<a class = 'link' href = 'home.php'>Home</a>";
						?>
					</li>
				</ul>
				
			</div>

			<div id = 'logo'></div>
		</div>

		<div id = 'submenu'>

			<?php

				if (!isset($_SESSION['uname']))
				{

					echo "<div id = 'upleft'>Create an account. Sign up now!</div>
					
					<div id = 'logright'>
				
						<form name = 'loginform' method = 'post' action = 'process.php'>
							<center>
								<span id = 'loginerror'></span>
								Username <input type = 'text' name = 'uname' value = ''/>
								Password <input type = 'password' name = 'pword' value = ''/>
								<input type = 'hidden' name = 'unamearr' value = '".$uname_array."'/>
								<input type = 'hidden' name = 'pwordarr' value = '".$pword_array."'/>
								<input class = 'buttondiv' type = 'submit' name = 'loginbutton' value = 'LOG IN' onclick = 'return validateLogin();'/>
							</center>
						</form>
					</div>";
				}
				else
				{
					echo "<ul id = 'adminaccount'>
						<li><a class = 'link' href = 'addadmin.php'>Add Administrator</a></li>
						<li id = 'addprod'>Add Product</li>
						<li><a class = 'link' href = 'viewcustomers.php?start=0&page=1'>View Customers</a></li>
						<li><a class = 'link' href = 'vieworders.php?start=0&page=1'>View Orders</a></li>
						<li>View Inventory</li>
					</ul>";
				}
			?>

		</div>

		<div id = 'adsubmenu'>

			<?php

				echo "<ul id = 'accountline'>
					<li id = 'currentpage'><a class = 'link' href = 'account.php'>View Account</a></li>
					<li><a class = 'link' href = 'editaccount.php'>Edit Account</a></li>
					<li id = 'del'>Delete Account</li>
					<li><a class = 'link' href = 'process.php?out=1'>Log out</a></li>
				</ul>";
			?>

		</div>

		<div id = 'maincontent>'>
			<div id = 'proddiv'>		 <!--product.css added -->
			<!--	<div id = 'viewdiv'> -->
				<form name = 'editproduct' enctype='multipart/form-data' method = 'post' action = 'process.php?id=<?php echo $id;?>&&n=<?php echo $row5[0];?>'>			
					
					<table>
						<tr>
							<td><span id = 'edspanpfull'></td>
						</tr>
						<tr>
							<td><span id = 'spanpfull'></td>
						</tr>
						<tr>
							<td>Item Code:</td>
							<td><input type = 'text' name = 'edcode' size = '15' value='<?php echo $row[1]; ?>'/></td>
							<td><span id = 'edspanitemcode'></td>
						</tr>
						<br />

						<tr>
							<td>Image:</td>

							<td><input src='<?php echo "C:/wamp/www/upbeat.com/IMAGES/product/".$row[2]; ?>' type = 'file' name = 'uploadpic'  ></td>
						</tr>
						<br />

						<tr>
							<td>Description:</td>
							<td><input type = 'text' name = 'eddesc' size = '15' value='<?php echo $row[3]; ?>'/><br /></td>
							<td><span id = 'edspanpdesc'></td>
						</tr>
						<br />

						<tr>
							<td>Gender Type:</td>
							<td><input type = 'radio' name = 'edgender' value='male' <?php if(strcmp($row[4] , 'Male') == 0){ echo "checked = 'true'";}?> />Male    
							 <input type = 'radio' name = 'edgender' value='female'<?php if(strcmp($row[4] , 'Female') == 0){ echo "checked = 'true'";}?>/>Female</td>
						</tr>
						<br />

						<tr>
							<td>Shirt Type:</td>
							<td><select name = 'edshirt' >
									<option value = 'T-shirt' <?php if($row[5] == 'T-shirt') echo "selected";?>>Shirt</option>
									<option value = 'Jacket' <?php if($row[5] == 'Jacket') echo "selected";?>>Jacket</option>
								</select></td>
						</tr>
						<br />

					<?php

						$yey = 1;
						while ($row3 = mysql_fetch_array($result3, MYSQL_NUM))
						{
							echo "<tr>";
							echo "<td>Size:</td>";
							echo "<td><input type = 'text' name = 'edsize".$yey."' size = '15' value='".$row3[1]."' /></td>";
							echo "<td>Price:</td>";
							echo "<td><input type = 'text' name = 'edprice".$yey."' size = '15' value='".$row3[2]."' /></td>";
							echo "<td><span id = 'edspanpprice".$yey++."'></td>";
							echo "<td><a href= 'process.php?delsize=1&&id=".$id."&&size=".$row3[1]."'>Delete</a></td>";
							echo "<td><span id = 'edspanpprice'></td>";
							echo "</tr>";
						}
					?>

						<tr>
						<td>Tags:</td>
						<td><input type = 'text' name = 'edkeys' size = '15' value='<?php 
						while ($row4 = mysql_fetch_array($result4, MYSQL_NUM))
						{
							echo $row4[1]." ";
						}
					?>'/></td>
							<td><span id = 'edspanptags'></td>
						</tr>
						<br />

						<tr>
							<td><input type = 'submit' name = 'editpro' value='Save Changes' onclick = 'return validateProduct(<?php echo $row5[0];?>);'/></td>
						</tr>
						<tr>
							<td></td>
						</tr>					
					</table>
				</form>
		<!--	</div> -->
			</div>
		</div>

		<div id = 'footer'>(c) UPBeat Online Shop | All Rights Reserved. 2013.</div>

		<div id = 'blackcover'></div>

		<div id = 'deletebox'>
			<br/>
			Are you sure you want to delete?
			<br/><br/>
			<a class = 'link' href = 'process.php?delacc=1'> <input type = 'submit' id = 'yes' value = 'YES' onclick = ''> </a>
			<input type = 'submit' id = 'no' value = 'NO'>
		</div>

		<form name = 'sizeadd' action = 'addproduct.php' method = 'post'>
			<div id = 's'>
				Enter number of sizes: <input type = 'text' name = 's' size = '5' value = '1'/>
				<br/><br/><input type = 'submit' id = 'cancel' onclick = 'return false;' value = 'Cancel'/>
				<input type = 'submit' name = 'continue' value = 'Continue'/>
			</div>
		</form>

		<script type = "text/javascript">

			$(document).ready(function()
               {
               	$("#s").hide();
               	$("#blackcover").hide();
               	$("#deletebox").hide();
               	$("#submenu").hide();
               	$("#adsubmenu").hide();
               	$("#prompt").fadeIn(1000);
               	$("#prompt").delay(1000).fadeOut();

               	$("#addprod").click(function()
                    {
                    	$("#blackcover").fadeIn();
                    	$("#s").fadeIn(500);
                    });

                    $("#cancel").click(function()
                    {
                    	$("#s").fadeOut(500);
                    	$("#blackcover").delay(500).fadeOut();
                    });

                    $("#del").click(function()
				{
					$("#blackcover").fadeIn();
					$("#deletebox").delay(500).fadeIn();
				});

				$("#no").click(function()
                    {
                    	$("#deletebox").fadeOut();
					$("#blackcover").delay(500).fadeOut();
                    });

                    $("li#home").mouseover(function()
                    {
                    	$("#adsubmenu").slideUp();
                    	$("#submenu").slideDown();
                    });

                    $("li#last").mouseover(function()
                    {
                    	$("#submenu").slideUp();
                    	$("#adsubmenu").slideDown();
                    });

                    $("#proddiv").mouseover(function()
                    {
                    	$("#submenu").slideUp();
                    	$("#adsubmenu").slideUp();
                    });

                    $("#maincontent").mouseover(function()
                    {
                    	$("#submenu").slideUp();
                    	$("#adsubmenu").slideUp();
                    });

               });

		</script>
	</body>


	<?php
	mysql_close($con);	

	?>
</html>