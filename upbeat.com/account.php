<?php 
	
	session_start();

	if(isset($_SESSION['uname']))
	{
		$username = "root";
		$password = "";
		$hostname = "localhost"; 

		$con = mysql_connect($hostname, $username, $password);
				
		if (!$con) die('Could not connect: ' . mysql_error());
		
		$db = mysql_select_db("upbeat", $con);
		
		if (!$db) die('Could not connect: ' . mysql_error());

		if(strcmp($_SESSION['type'], "customer") == 0)
			$result = mysql_query("SELECT * from customer where id=".$_SESSION['id']);
		else
			$result = mysql_query("SELECT * from administrator where id=".$_SESSION['id']);	
		
		$row = mysql_fetch_array($result);
		$pass = $_SESSION["password"];
	}

?>

<html>

	<head>
		<title>UPBeat</title>
		<link rel = "stylesheet" type = "text/css" href = "CSS/local.css">
		<link rel = "stylesheet" type = "text/css" href = "CSS/account.css"> 
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
						<li id = 'currentpage'><a class = 'link' href = 'account.php'>View Account</a></li>
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

			<div id = 'accountdiv'>

				<div id = 'viewdiv'>
			
					<?php
					
						if(strcmp($_SESSION['type'], "customer") == 0)
						{
							echo "<center>
									<table class = 'account'>
										<tr><td>First Name </td></tr>
										<tr><td class = 'tdcustom'>".$row[1]."</td></tr>
										<tr><td>Last Name</td></tr>
										<tr><td class = 'tdcustom'>".$row[2]."</td></tr>
										<tr><td>Username</td></tr>
										<tr><td class = 'tdcustom'>".$row[3]."</td></tr>
										<tr><td>Email Address</td></tr>
										<tr><td class = 'tdcustom'>".$row[4]."</td></tr>
										<tr><td>Address</td></tr>
										<tr><td class = 'tdcustom'>".$row[5]."</td></tr>
										<tr><td>Contact Number</td></tr>
										<tr><td class = 'tdcustom'>(+63) ".$row[6]."</td></tr>
										<tr><td>&nbsp;</td></tr>
									</table>
								</center>
							";
						}
						else
						{
							echo "<center>
									<table class = 'account'>

										<tr><td>First Name </td></tr>
										<tr><td class = 'tdcustom'>".$row[1]."</td></tr>
										<tr><td>Last Name</td></tr>
										<tr><td class = 'tdcustom'>".$row[2]."</td></tr>
										<tr><td>Username</td></tr>
										<tr><td class = 'tdcustom'>".$row[3]."</td></tr>

									</table>
								</center>
							";
						}
					?>
				</div>
				
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

		<script type = "text/javascript">

			$(document).ready(function()
               {
          		$("#blackcover").hide();
          		$("#deletebox").hide();
               	$("#submenu").hide();
               	$("#adsubmenu").hide();
               	$("#prompt").fadeIn(1000);
               	$("#prompt").delay(1000).fadeOut();
	               	
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

	<?php 
			if (isset($_SESSION['edited']))
			{
				if ($_SESSION['edited'] == "1") echo "<div id = 'prompt'>Account successfully edited!</div>";
				$_SESSION['edited'] == "0";
			}
		?>

</html>