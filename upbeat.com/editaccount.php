<?php

	include("products.php");
	session_start();

	if(strcmp($_SESSION['type'], "customer") == 0)
		$result = mysql_query("SELECT * from customer where id=".$_SESSION['id']);
	else
		$result = mysql_query("SELECT * from administrator where id=".$_SESSION['id']);	
	
	$row = mysql_fetch_array($result);
	$pass = $_SESSION["password"];

?>

<html>

	<head>

		<title>UPBeat Online Shop</title>
		<link rel = "stylesheet" type = "text/css" href = "CSS/local.css">
		<link rel = "stylesheet" type = "text/css" href = "CSS/editaccount.css">
		<script type = "text/javascript" src = "SCRIPTS/validate.js"></script>

		<script type="text/javascript" src = "SCRIPTS/jquery.js"></script>

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

			<ul id = 'accountline'>
				<li id = 'currentpage'><a class = 'link' href = 'account.php'>View Account</a></li>
				<li><a class = 'link' href = 'editaccount.php'>Edit Account</a></li>
				<li id = 'del'>Delete Account</li>
				<li><a class = 'link' href = 'process.php?out=1'>Log out</a></li>
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

		<?php
					
			if(isset($_SESSION['type']))
			{
				if(strcmp($_SESSION['type'], "administrator") == 0)
				{
					echo "<div id = 'maincontent'>

						<div id = 'editdiv'>

							<form name = 'editaccountadmin' method = 'post' action = 'process.php'>
								<center>
									<table class = 'account'>

										<tr><td>First Name <span id = 'editfname'></span></td></tr>
										<tr><td class = 'inputd'><input class = 'inputxt' type = 'text' name = 'acfname' value='".$row[1]."'></td></tr>
										<tr><td>Last Name <span id = 'editlname'></td></tr>
										<tr><td class = 'inputd'><input class = 'inputxt' type = 'text' name = 'aclname' value='".$row[2]."'></td></tr>
										<tr><td>Username <span id = 'edituname'></span></td></tr>
										<tr><td class = 'inputd'><input class = 'inputxt' type = 'text' name = 'acuname' value='".$row[3]."'></td></tr>
										<tr><td>Current Password <span id = 'editpword'></span></td></tr>
										<tr><td class = 'inputd'><input class = 'inputxt' type = 'password' name = 'acpword'/></td></tr>
										<tr><td>New Password <span id = 'editnewword'></td></tr>
										<tr><td class = 'inputd'><input class = 'inputxt' type = 'password' name = 'acnewword'/></td></tr>
										<tr><td>Confirm Password <span id = 'editconpword'></span></td></tr>
										<tr><td class = 'inputd'><input class = 'inputxt' type = 'password' name = 'acconword'/></td></tr>
										<tr><td colspan = '2'><input type = 'hidden' name = 'hidepword' value = '".$pass."'</td></tr>
										<tr><td class = 'tdcenter'><input type = 'submit' name = 'editacc' onclick = 'return adminEdit();' value='Save Changes'/></td></tr>

									</table>
								</center>

							</form>

						</div>

					</div>";
				}
				else
				{
					echo "

						<div id = 'maincontentedit'>

							<div id = 'accountdivedit'>
										
								<center>
									<form name = 'editaccount' method = 'post' action = 'process.php'>
										<table class = 'account'>

											<tr><td>First Name <span id = 'editfname'></span></td></tr>
											<tr><td class = 'inputd'><input class = 'inputxt' type = 'text' name = 'acfname' value='".$row[1]."'></td></tr>
											<tr><td>Last Name <span id = 'editlname'></span></td></tr>
											<tr><td class = 'inputd''><input class = 'inputxt' type = 'text' name = 'aclname' value='".$row[2]."'></td></tr>
											<tr><td>Username <span id = 'edituname'></span></td></tr>
											<tr><td class = 'inputd'><input class = 'inputxt' type = 'text' name = 'acuname' value='".$row[3]."'></td></tr>
											<tr><td>Email Address <span id = 'editemail'></span></td></tr>
											<tr><td class = 'inputd'><input class = 'inputxt' type = 'email' name = 'acemail' value='".$row[4]."'></td></tr>
											<tr><td>Address <span id = 'editaddress'></span></td></tr>
											<tr><td class = 'inputd'><input class = 'inputxt' type = 'text' name = 'acaddre' value='".$row[5]."'></td></tr>
											<tr><td>Contact Number (9xxxxxxxxx) <span id = 'editcontact'></span></td></tr>
											<tr><td class = 'inputd'><input class = 'inputxt' type = 'text' name = 'acconta' onclick = 'return clearfield();' value='".$row[6]."'></td></tr>
											<tr><td>Current Password <span id = 'editpword'></span></td></tr>
											<tr><td class = 'inputd'><input class = 'inputxt' type = 'password' name = 'acpword'/></td></tr>
											<tr><td>New Password <span id = 'editnewword'></span></td></tr>
											<tr><td class = 'inputd'><input class = 'inputxt' type = 'password' name = 'acnewword'/></td></tr>
											<tr><td>Confirm Password <span id = 'editconpword'></span></td></tr>
											<tr><td class = 'inputd'><input class = 'inputxt' type = 'password' name = 'acconpword'/></td></tr>
											<tr><td><input type = 'hidden' name = 'hidepword' value = '".$pass."'</td>
											<tr>
												<td class = 'tdcenter'>
													<input type = 'submit' name = 'editacc' onclick = 'return validEdit();' value = 'SAVE CHANGES'/>
												</td>
											</tr>

										</table>
									</form>
								</center>
							</div>
						</div>
					";
				}
			}
		?>

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