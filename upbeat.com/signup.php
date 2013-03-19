<?php 

	include("products.php");
	session_start();
	mysql_close($con);
?>

<html>

	<head>
		<title>UPBeat</title>
		<link rel = "stylesheet" type = "text/css" href = "CSS/local.css">
		<link rel = "stylesheet" type = "text/css" href = "CSS/signup.css">
		<script type = "text/javascript" src = "SCRIPTS/jquery.js"></script>
		<script type = "text/javascript" src = "SCRIPTS/validate.js"></script>
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
					<li><a class = 'link' href = 'collections.php?start=0&page=1'>Collections</a></li>

					<li>
						<?php

							if(isset($_SESSION['type']))
							{
								if(strcmp($_SESSION['type'], "admin") == 0)
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

		<div id = 'maincontent'>

			<div id = 'signup'>

				<?php
					
					echo "

						<center>
							<form name = 'signupform' method = 'post' action = 'process.php'>
								
								<table>

									<tr><td>First Name <span id = 'upfname'></span></td></tr>
									<tr><td class = 'inputd'><input class = 'inputxt' type = 'text' name = 'upfname'/></td></tr>

									<tr><td>Last Name <span id = 'uplname'></span></td></tr>
									<tr><td class = 'inputd''><input class = 'inputxt' type = 'text' name = 'uplname'/></td></tr>
									
									<tr><td>Username <span id = 'upuname'></span></td></tr>
									<tr><td class = 'inputd'><input class = 'inputxt' type = 'text' name = 'upuname'/></td></tr>

									<tr><td>Contact Number <span id = 'upcontact'></span></td></tr>
									<tr><td class = 'inputd'><input class = 'inputxt' type = 'text' name = 'upcontact'/></td></tr>
									
									<tr><td>Mailing Address <span id = 'upaddress'></span></td></tr>
									<tr><td class = 'inputd'><input class = 'inputxt' type = 'text' name = 'upaddress'/></td></tr>
										
									<tr><td>Email Address <span id = 'upemail'></span></td></tr>
									<tr><td class = 'inputd'><input class = 'inputxt' type = 'email' name = 'upemail'/></td></tr>

									<tr><td>Confirm Email<span id = 'upconemail'></span></td></tr>
									<tr><td class = 'inputd'><input class = 'inputxt' type = 'email' name = 'upconemail'/></td></tr>
									
									<tr><td>Password <span id = 'upword'></span></td></tr>
									<tr><td class = 'inputd'><input class = 'inputxt' type = 'password' name = 'upword'/></td></tr>

									<tr><td>Confirm Password <span id = 'upconpword'></span></td></tr>
									<tr><td class = 'inputd'><input class = 'inputxt' type = 'password' name = 'upconpword'/></td></tr>
									
									<tr><td colspan = '2'><input type = 'hidden' name = 'unamearr' value = '".$uname_array."'</td></tr>
									<tr><td class = 'tdcenter' colspan = '2'><input type = 'submit' class = 'logdiv' name = 'signupbutton' value = 'SIGN UP' onclick = 'return validateForm();'></td></tr>

								</table>
							</form>
						</center>
					";
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

		<script type = "text/javascript">

			$(document).ready(function()
               {
               	$("#blackcover").hide();
          		$("#deletebox").hide();
               	$("#submenu").hide();

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

                    $("li#last").mouseover(function()
                    {
                    	$("#submenu").slideDown();
                    });

                    $("#maincontent").mouseover(function()
                    {
                    	$("#submenu").slideUp();
                    });

               });

		</script>

	</body>

</html>