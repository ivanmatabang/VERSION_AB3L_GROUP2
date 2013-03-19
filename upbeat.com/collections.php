<?php 

	include("products.php");
	session_start();

	$new = array();
	$best = array();
	$count = 0;
	$result2 = mysql_query("SELECT * from orderr where is_delivered='YES' GROUP BY prod_id ORDER BY SUM(quantity) desc");
	$result3 = mysql_query("SELECT * from product ORDER BY id desc");
	
	while ($row = mysql_fetch_array($result2, MYSQL_NUM))
	{
		array_push($best, $row[0]);
		$count++;
	}

	for ($i = 0; $i < 5; $i++)
	{
		$row = mysql_fetch_array($result3, MYSQL_NUM);
		array_push($new, $row[0]);
	}

	mysql_close($con);
?>

<html>

	<head>
		<title>UPBeat</title>
		<link rel = "stylesheet" type = "text/css" href = "CSS/local.css">
		<link rel = "stylesheet" type = "text/css" href = "CSS/collections.css">
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

					echo "<div id = 'upleft'>Create an account. <a href = 'signup.php'>Sign up</a> now!</div>
					
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

			<div id = 'bestseller'>
				<div id = 'topbest'>Bestsellers</div>
				<ul id = 'downbest'>
					<?php
						for ($i = 0; $i < $count; $i++)
						{
							echo "<li><a href = 'viewproduct.php?item=".$i."'>
								<img class = 'prodimg' src = 'IMAGES/prod".($i+1).".png'/>
							</a></li>";
						}
					?>
				</ul>
			</div>

			<div id = 'newcoll'>
				<div id = 'topnew'>New Collections</div>
				<ul id = 'downnew'>
					
					<?php
						for ($i = 0; $i < 5; $i++) echo "<li><img class = 'prodimg' src = 'IMAGES/prod".($i+1).".png'/></li>";
					?>

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
               	$("#adsubmenu").hide();	
               	$("#submenu").hide();

               	$("#addprod").click(function()
                    {
                    	$("#s").fadeIn(500);
                    });

                    $("#cancel").click(function()
                    {
                    	$("#s").fadeOut(500);
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

                    $("#del").click(function()
				{
					$("#submenu").show();
					$("#blackcover").fadeIn();
					$("#deletebox").delay(500).fadeIn();
				});

				$("#no").click(function()
                    {
                    	$("#deletebox").fadeOut();
					$("#blackcover").delay(500).fadeOut();
                    });

               });

		</script>

	</body>

</html>