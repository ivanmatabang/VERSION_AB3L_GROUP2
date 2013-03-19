<?php

	include("products.php");
	session_start();

	if(isset($_SESSION['uname']))
	{
		if(strcmp($_SESSION['type'], "administrator") == 0) header("Location:admin.php");
		
		$result = mysql_query("SELECT * FROM orderr where custom_id=".$_SESSION['id']." AND is_delivered='NO'");
		$result5 = mysql_query("SELECT SUM(quantity), SUM(price) from orderr where custom_id=".$_SESSION['id']." AND is_delivered='NO'");
		$row5 = mysql_fetch_array($result5);
	}
	else header("Location:signup.php");

?>

<html>

	<head>
		<title>UPBeat</title>
		<link rel = "stylesheet" type = "text/css" href = "CSS/local.css">
		<link rel = "stylesheet" type = "text/css" href = "CSS/cart.css">
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

			<ul id = 'adminaccount'>
				<li><a class = 'link' href = 'addadmin.php'>Add Administrator</a></li>
				<li id = 'addprod'>Add Product</li>
				<li><a class = 'link' href = 'viewcustomers.php?start=0&page=1'>View Customers</a></li>
				<li><a class = 'link' href = 'vieworders.php?start=0&page=1'>View Orders</a></li>
				<li>View Inventory</li>
			</ul>

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


		<div id = 'maincontent'>

			<div id = 'customlist'>

				<ul class = 'topline'>
					<li class = 'smallcol'>Preview</li>
					<li>Name</li>
					<li>Date Ordered</li>
					<li>Quantity</li>
					<li>Price</li>
					<li></li>
				</ul>
				
				<?php

					while($row = mysql_fetch_array($result, MYSQL_NUM))
					{
						$result2 = mysql_query("SELECT * FROM product where id=".$row[1]);
						$row2 = mysql_fetch_array($result2);
						echo "<ul class = 'line'>
							<li class = 'smallcol'><img src='IMAGES/product/".$row2[2]."' alt='' width='50px' height='50px'></li>
							<li>".$row2[1]."</li>
							<li>".$row[6]."</li>
							<li>".$row[3]."</li>
							<li>".$row[4]."</li>
							<li class = 'smallcol'>
								<a href = 'process.php?delcart=1&&pid=".$row[0]."'>
									<input id = 'remove' type = 'submit' name = 'remove' value = 'Remove'/>
								</a>
							</li>
						</ul>";
						
					}
				?>
				
				<ul class = 'topline'>
					<li class = 'smallcol'>Total</li>
					<li></li>
					<li></li>
					<li><?php echo $row5[0];?></li>
					<li><?php echo $row5[1];?></li>
				</ul>

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
               	$("#prompt").fadeIn(500);
               	$("#prompt").delay(500).fadeOut();

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

                    $("#circle1").click(function()
                    {
                    	$("img#image2").hide();
                    	$("img#image3").hide();
                    	$("img#image1").fadeIn(1000);
                    });

                    $("#circle2").click(function()
                    {
                    	$("img#image1").hide();
                    	$("img#image3").hide();
                    	$("img#image2").fadeIn(1000);
                    });

                    $("#circle3").click(function()
                    {
                    	$("img#image1").hide();
                    	$("img#image2").hide();
                    	$("img#image3").fadeIn(1000);
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

                    $("#maincontent").mouseover(function()
                    {
                    	$("#submenu").slideUp();
                    	$("#adsubmenu").slideUp();
                    });

               });

		</script>

	</body>

</html>

<?php mysql_close($con);	?>