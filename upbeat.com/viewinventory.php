<?php
	session_start();

	include("products.php");
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

	$result = mysql_query("SELECT * from product");
	$date = mysql_query("SELECT CURDATE()");
	$datee = mysql_fetch_array($date);
	$year = strtok($datee[0], "-");
	$month = strtok("-");
	$day = strtok("-");
	$productlist = array();
	$saleslist = array();
	$pricelist = array();
	$first = $_GET['start'];
	$spage = $_GET['page'];

	if(!isset($_GET['sortinventory']))
	{
		while ($row = mysql_fetch_array($result, MYSQL_NUM))
		{
			array_push($productlist, $row[1]);
			$result2 = mysql_query("SELECT SUM(quantity), SUM(price) from orderr where is_delivered='YES' AND prod_id=".$row[0]);
			$row2 = mysql_fetch_array($result2);
			if($row2[0] > 0)
			{
				array_push($saleslist, $row2[0]);
				array_push($pricelist, $row2[1]);
			}
			else
			{
				array_push($saleslist, "0");
				array_push($pricelist, "0");
			}
		}
		array_push($productlist, "Total");
		$result3 = mysql_query("SELECT SUM(quantity), SUM(price) from orderr where is_delivered='YES'");
		$row3 = mysql_fetch_array($result3);
		if($row3[0] > 0) array_push($saleslist, $row3[0]);
		else array_push($saleslist, "0");
		if($row3[1] > 0) array_push($pricelist, $row3[1]);
		else array_push($pricelist, "0");
	}
	else
	{
		if(strcmp($_GET['sort'], "all") == 0)
		{
			while ($row = mysql_fetch_array($result, MYSQL_NUM))
			{
				array_push($productlist, $row[1]);
				$result2 = mysql_query("SELECT SUM(quantity), SUM(price) from orderr where is_delivered='YES' AND prod_id=".$row[0]);
				$row2 = mysql_fetch_array($result2);
				if($row2[0] > 0)
				{
					array_push($saleslist, $row2[0]);
					array_push($pricelist, $row2[1]);
				}
				else
				{
					array_push($saleslist, "0");
					array_push($pricelist, "0");
				}
			}
			array_push($productlist, "Total");
			$result3 = mysql_query("SELECT SUM(quantity), SUM(price) from orderr where is_delivered='YES'");
			$row3 = mysql_fetch_array($result3);
			if($row3[0] > 0) array_push($saleslist, $row3[0]);
			else array_push($saleslist, "0");
			if($row3[1] > 0) array_push($pricelist, $row3[1]);
			else array_push($pricelist, "0");
		}
		else if(strcmp($_GET['sort'], "yearly") == 0)
		{
			while ($row = mysql_fetch_array($result, MYSQL_NUM))
			{
				array_push($productlist, $row[1]);
				$result2 = mysql_query("SELECT SUM(quantity), SUM(price), id from orderr where is_delivered='YES' AND prod_id=".$row[0]);
				$row2 = mysql_fetch_array($result2);
				if($row2[0] > 0)
				{
					$result4 = mysql_query("SELECT date_delivered from delivers where order_id=".$row2[2]);
					$row4 = mysql_fetch_array($result4);
					$yearr = strtok($row4[0], "-");
					if(strcmp($_GET['year'], $yearr) == 0)
					{
						array_push($saleslist, $row2[0]);
						array_push($pricelist, $row2[1]);
					}
					else
					{
						array_push($saleslist, "0");
						array_push($pricelist, "0");
					}
				}
				else
				{
					array_push($saleslist, "0");
					array_push($pricelist, "0");
				}
			}
			array_push($productlist, "Total");
			$result3 = mysql_query("SELECT SUM(quantity), SUM(price) from orderr where is_delivered='YES' AND id IN (select order_id from delivers where date_delivered between '".$_GET['year']."-01-01' and '".$_GET['year']."-12-31')");
			$row3 = mysql_fetch_array($result3);
			if($row3[0] > 0) array_push($saleslist, $row3[0]);
			else array_push($saleslist, "0");
			if($row3[1] > 0) array_push($pricelist, $row3[1]);
			else array_push($pricelist, "0");
		}
		else if(strcmp($_GET['sort'], "monthly") == 0)
		{
			while ($row = mysql_fetch_array($result, MYSQL_NUM))
			{
				array_push($productlist, $row[1]);
				$result2 = mysql_query("SELECT SUM(quantity), SUM(price), id from orderr where is_delivered='YES' AND prod_id=".$row[0]);
				$row2 = mysql_fetch_array($result2);
				if($row2[0] > 0)
				{
					$result4 = mysql_query("SELECT date_delivered from delivers where order_id=".$row2[2]);
					$row4 = mysql_fetch_array($result4);
					$yearr = strtok($row4[0], "-");
					$monthh = strtok("-");
					if(strcmp($_GET['year'], $yearr) == 0 && strcmp($_GET['month'], $monthh) == 0)
					{
						array_push($saleslist, $row2[0]);
						array_push($pricelist, $row2[1]);
					}
					else{
						array_push($saleslist, "0");
						array_push($pricelist, "0");
					}
				}
				else
				{
					array_push($saleslist, "0");
					array_push($pricelist, "0");
				}
			}
			array_push($productlist, "Total");
			$result3 = mysql_query("SELECT SUM(quantity), SUM(price), id from orderr where is_delivered='YES'AND id IN (select order_id from delivers where date_delivered between '".$_GET['year']."-".$_GET['month']."-01' and '".$_GET['year']."-".$_GET['month']."-31')");
			$row3 = mysql_fetch_array($result3);
			if($row3[0] > 0) array_push($saleslist, $row3[0]);
			else array_push($saleslist, "0");
			if($row3[1] > 0) array_push($pricelist, $row3[1]);
			else array_push($pricelist, "0");
		}
	}

?>


<html>
	<head>
		<title>UPBeat</title>
		<link rel = "stylesheet" type = "text/css" href = "CSS/local.css">
		<link rel = "stylesheet" type = "text/css" href = "CSS/inventory.css">
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

					<li>Cart</li>
					<li><a class = 'link' href = 'store.php?cat=all&start=0&page=1'>Store</a></li>
					<li><a class = 'link' href = 'collections.php?start=0&page=1'>Collections</a></li>

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
							<li>Product</li>
							<li>Quantity</li>
							<li>Price</li>
						</ul>
					";

					if ($spage == $inventpages) $limit = $first+(($products+1)%10);
					else $limit = $first+10;

					for ($i = $first; $i < $limit; $i++)
					{
						echo "<ul class = 'line'>
								<li>".$productlist[$i]."</li>
								<li>".$saleslist[$i]."</li>
								<li>".$pricelist[$i]."</li>
							</ul>
						";
					}

					echo "<div id = 'custompage'>";

						for ($i = 1; $i <= $inventpages; $i++)
						{
							$first = 10*($i-1);
							if(isset($_GET['sort']))
							echo "<a class = 'link' href = 'viewinventory.php?start=".$first."&page=".$i."&sort=".$_GET['sort']."&year=".$_GET['year']."&month=".$_GET['month']."&sortinventory=Submit'> ".$i." </a>";
							else
							echo "<a class = 'link' href = 'viewinventory.php?start=".$first."&page=".$i."'> ".$i." </a>";
						}

					echo "</div>";

					
				?>

			</div>

		</div>

		<form name = 'viewinventory' method = 'get' action = 'viewinventory.php'>
				<input type = 'hidden' name = 'start' value = '0'/>
				<input type = 'hidden' name = 'page' value = '1'/>
				<input type = 'radio' name = 'sort' value = 'all' <?php if(isset($_GET['sortinventory'])) { if($_GET['sort'] == "all") { echo "checked='true'";}} else { echo "checked='true'";}?>/>All
				<input type = 'radio' name = 'sort' value = 'yearly' <?php if(isset($_GET['sortinventory'])) { if($_GET['sort'] == "yearly") { echo "checked='true'";}}?>/>Yearly
				<input type = 'radio' name = 'sort' value = 'monthly' <?php if(isset($_GET['sortinventory'])) { if($_GET['sort'] == "monthly") { echo "checked='true'";}}?>/>Monthly<br />
				<?php
						echo "Year: <select name = 'year'>";
									while($year >= 2005)
									{
										echo "<option value = '".$year."'>".$year--."</option>";
									}
						echo	"</select>";
						echo "Month: <select name = 'month'>";
							echo "<option value = '01'>January</option>";
							echo "<option value = '02'>February</option>";
							echo "<option value = '03'>March</option>";
							echo "<option value = '04'>April</option>";
							echo "<option value = '05'>May</option>";
							echo "<option value = '06'>June</option>";
							echo "<option value = '07'>July</option>";
							echo "<option value = '08'>August</option>";
							echo "<option value = '09'>September</option>";
							echo "<option value = '10'>October</option>";
							echo "<option value = '11'>November</option>";
							echo "<option value = '12'>December</option>";
						echo	"</select>";
				?>
				<input type = 'submit' name = 'sortinventory' value = 'Submit'/><br />
		</form>

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


	<?php
		mysql_close($con);	
	?>