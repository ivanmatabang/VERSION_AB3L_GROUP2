<?php

	include("products.php");
	session_start();
	$first = $_GET['start'];
	$spage = $_GET['page'];
	$orderlist = array();
	$customlist = array();
	$productlist = array();

	$result = mysql_query("SELECT * from orderr where is_delivered = 'NO'");
	while ($row = mysql_fetch_array($result, MYSQL_NUM))
	{
		array_push($orderlist, $row[0]);
		array_push($customlist, $row[2]);
		array_push($productlist, $row[1]);
	}
?>


<html>

	<head>
		<title>UPBeat</title>
		<link rel = "stylesheet" type = "text/css" href = "CSS/local.css">
		<link rel = "stylesheet" type = "text/css" href = "CSS/order.css">
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

				<?php

					echo "
						<ul class = 'topline'>
							<li>Customer Name</li>
							<li class = 'smallcol'>Product</li>
							<li>Date Ordered</li>
							<li>Time Ordered</li>
							<li class = 'smallcol'>Quantity</li>
							<li class = 'smallcol'>Price</li>
						</ul>
					";

					if ($spage == $orderpages) $limit = $first+($orders%10);
					else $limit = $first+10;

					for ($i = $first; $i < $limit; $i++)
					{
						$result1 = mysql_query("SELECT * from orderr where id = ".$orderlist[$i]);
						$result2 = mysql_query("SELECT * from customer where id = ".$customlist[$i]);
						$result3 = mysql_query("SELECT * from product where id = ".$productlist[$i]);

						$row1 = mysql_fetch_array($result1);
						$row2 = mysql_fetch_array($result2);
						$row3 = mysql_fetch_array($result3);

						echo "<ul class = 'line'>
								<li>".$row2[1]." ".$row2[2]."</li>
								<li class = 'smallcol'>".$row3[1]."</li>
								<li>".$row1[6]."</li>
								<li>".$row1[7]."</li>
								<li class = 'smallcol'>".$row1[3]."</li>
								<li class = 'smallcol'>".$row1[4]."</li>
								<li class = 'smallcol'>
									<a class = 'links' href = 'process.php?approve=1&oid=".$row1[0]."'><input id ='check' type = 'submit' name = 'check' value = 'CHECK'/></a>
								</li>
							</ul>
						";
					}

					echo "<div id = 'custompage'>";

						for ($i = 1; $i <= $orderpages; $i++)
						{
							$first = 10*($i-1);
							echo "<a class = 'link' href = 'vieworders.php?start=".$first."&page=".$i."'> ".$i." </a>";
						}

					echo "</div>";

					mysql_close($con);
				?>

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

		<?php 

			if (isset($_SESSION['checkorder']))
			{
				if ($_SESSION['checkorder'] == "1")
				{
					echo "<div id = 'prompt'>Product successfully delivered!</div>";
					$_SESSION['deletecustom'] = "0";
				}
			}

		?>

	</body>

</html>