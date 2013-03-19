<?php 

	include("products.php");
	session_start();

	$cat = $_GET['cat'];
	$item = $_GET['item'];
	$itemarr = array();
	if (strcmp($cat, "all") == 0) $prodlist = mysql_query("SELECT * from product");
	else if (strcmp($cat, "men") == 0) $prodlist = mysql_query("SELECT * from product where gender_type = 'MALE'");
	else if (strcmp($cat, "women") == 0) $prodlist = mysql_query("SELECT * from product where gender_type = 'FEMALE'");

	while ($curritem = mysql_fetch_array($prodlist, MYSQL_NUM)) array_push($itemarr, $curritem[0]);
	$result = mysql_query("select * from product where id = ".$itemarr[$item]);
	$row = mysql_fetch_array($result);
		

	mysql_close($con);
?>

<html>

	<head>
		<title>UPBeat</title>
		<link rel = "stylesheet" type = "text/css" href = "CSS/local.css">
		<link rel = "stylesheet" type = "text/css" href = "CSS/product.css">
		<script type = "text/javascript" src = "SCRIPTS/jquery.js"></script>
		<script type = "text/javascript" src = "SCRIPTS/validate.js"></script>
	</head>

	<body>
		<div id = 'header'>

			<form name = 'searchform' method = 'post' action = 'store.php?cat=search&start=0&page=1'>
				<div id = 'srchline'>
					<input id = 'sbutton' type = 'submit' name = 'sbutton' value = ''/>
					<input id = 'stxtbox' type = 'text' name = 'stxtbox' value = 'Search' />
				</div>
			</form>

			<div id = 'menuline'>

				<ul id = 'menulist'>

					<li id = 'last'>
						<?php
							
							if (isset($_SESSION['uname'])){ echo "Hi ".$_SESSION['fname']."!";}
							else echo "Log in";
						?>
					</li>

					<li><a class = 'link' href = 'viewcart.php'>Cart</a></li>
					<li><a class = 'link' href = 'store.php?cat=all&start=0&page=1'>Store</a></li>
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
					echo "<ul id = 'accountline'>
						<li id = 'currentpage'>View Account</li>
						<li><a class = 'link' href = 'editaccount.php'>Edit Account</a></li>
						<li id = 'del'>Delete Account</li>
						<li><a class = 'link' href = 'process.php?out=1'>Log out</a></li>
					</ul>";
				}
			?>

		</div>

		<?php

			if (isset($_SESSION['type']))
			{
				if(strcmp($_SESSION['type'], "administrator") == 0)
				{
					echo "<div id = 'adsubmenu'>
						<ul id = 'adminaccount'>
							<li><a class = 'link' href = 'addadmin.php'>Add Administrator</a></li>
							<li id = 'addprod'>Add Product</li>
							<li><a class = 'link' href = 'viewcustomers.php?start=0&page=1'>View Customers</a></li>
							<li><a class = 'link' href = 'vieworders.php?start=0&page=1'>View Orders</a></li>
							<li>View Inventory</li>
						</ul>
					</div>";
				}
			}
		?>

		<div id = 'maincontent'>

			<?php
				echo "<div id = 'prodleft'>";

					if (strcmp($cat,"men") == 0) $products = $menproducts;
					else if (strcmp($cat,"women") == 0) $products = $womenproducts;

					if ($item != 0) $left = $item - 1;
					else $left = 0;
					if ($item != ($products-1)) $right = $item + 1;
					else $right = $products-1;
					$result1 = mysql_query("select * from product where id =".$itemarr[$left]);
					$row1 = mysql_fetch_array($result);
					$result2 = mysql_query("select * from product where id =".$itemarr[$right]);
					$row2 = mysql_fetch_array($result);
	
					echo "
						<div id = 'prevpic'>
							<a href = 'viewproduct.php?cat=".$cat."&item=".$left."'><img class = 'prodimg' src = 'IMAGES/".$row1[2]."'/></a>
						</div>
						
						<div id = 'current'>
							<a href = 'viewproduct.php?cat=".$cat."&item=".$item."'><img class = 'prodimg' src = 'IMAGES/".$row[2]."'/></a>
						</div>
						
						<div id = 'nextpic'>
							<a href = 'viewproduct.php?cat=".$cat."&item=".$right."'><img class = 'prodimg' src = 'IMAGES/".$row2[2]."'/></a>
						</div>
				</div>

				<div id = 'prodesc'>

					<div id = 'upper'>
						Product Name: ".$row[1]."<br/>
						Product Description: ".$row[3]."<br/>
						Gender Type: ".$row[4]."<br/>";

					echo "</div>";

					if (isset($_SESSION['type']))
					{
						echo "<div id = 'lower'>";

							if ($_SESSION['type'] == "customer")
							{
								echo "<form name = 'addtocart' method = 'post' action = 'process.php?pid=".$row[0]."'>

										<input type = 'text' name = 'quantity' value = '1' size = '5'/>
										<select name = 'productsize'>";

											$result = mysql_query("select * from product where id=".$item);
											$row = mysql_fetch_array($result);
											$result2 = mysql_query("select * from product_size where prod_id = ".$row[0]);

											while($row2 = mysql_fetch_array($result2, MYSQL_NUM))
											{
												echo "<option value = '".$row2[1]."'>".$row2[1]."</option>";
											}
										echo	"</select>
										<input type = 'submit' name = 'addcart' value = 'Add to Cart'/>

									</form>";
							}

							else echo "<a class = 'link' href='editproduct.php?id=".$row[0]."'>
								<input id = 'custombutton' type = 'submit' name = 'edit' value = 'Edit Product'></a>
								<a class = 'link' href='process.php?delpro=1&id=".$row[0]."'>Delete</a>
						</div>";
					}
				echo "</div>";
			?>
			
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
                    	$("#adsubmenu").slideDown();
                    	$("#submenu").slideUp();
                    });

                    $("li#last").mouseover(function()
                    {
                    	$("#submenu").slideDown();
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

</html>