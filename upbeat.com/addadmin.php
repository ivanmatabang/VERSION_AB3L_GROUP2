<?php
	
	include("products.php");
	session_start();
	mysql_close($con);

?>
<html>

	<head>
		<title>UPBeat</title>
		<link rel = "stylesheet" type = "text/css" href = "CSS/local.css">
		<link rel = "stylesheet" type = "text/css" href = "CSS/addadmin.css">
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

		<div id = 'maincontent'>
		
			<form name = 'addadministrator' method = 'post' action = 'process.php'>


				<div id = 'accountdiv'>

					<div id = 'viewdiv'>
						<center>
							<table class = 'account'>

								<tr><td >First Name <span id = 'adminfname'></td></tr>
								<tr><td><input class = 'inputxt' type = 'text' name = 'adminfname' size = '15' value=''/></td></tr>
								<tr><td>Last Name <span id = 'adminlname'></td></tr>
								<tr><td><input class = 'inputxt' type = 'text' name = 'adminlname' size = '15' value=''/></td></tr>
								<tr><td>Username <span id = 'adminuname'></td></tr>
								<tr><td><input class = 'inputxt' type = 'text' name = 'adminuname' size = '15' value=''/></td></tr>
								<tr><td>Password <span id = 'adminpword'></td></tr>
								<tr><td><input class = 'inputxt' type = 'password' name = 'adminpword' size = '15' value=''/></td></tr>
								<tr><td>Confirm Password <span id = 'adminconpword'></td></tr>
								<tr><td><input class = 'inputxt' type = 'password' name = 'adminconpword' size = '15' value=''/></td></tr>
								<tr><td><input type = 'hidden' name = 'unamearr' value = '<?php echo $uname_array ?>'/></td></td>
								<tr><td class = 'tdcenter'><input type = 'submit' name = 'addadmin' onclick = 'return validAdmin();' value = 'Add Administrator'/></td></tr>

							</table>
						</center>

					</div>

				</div>

			</form>

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