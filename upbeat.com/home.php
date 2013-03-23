<?php 

	include("products.php");
	session_start();
	mysql_close($con);
?>

<html>

	<head>
		<title>UPBeat</title>
		<link rel = "stylesheet" type = "text/css" href = "CSS/local.css">
		<link rel = "stylesheet" type = "text/css" href = "CSS/home.css">
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

					<li>
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

		<div id = 'maincontent'>

			<div id = 'slideshow'>
				<img id = 'image1' class = 'image' src = 'IMAGES/cover3.jpg'></img>
				<img id = 'image2' class = 'image' src = 'IMAGES/cover4.jpg'></img>
				<img id = 'image3' class = 'image' src = 'IMAGES/cover2.jpg'></img>
			</div>

			<div id = 'switcher'>
				<div id = 'circle1' class = 'circles'></div>
				<div id = 'circle2' class = 'circles'></div>
				<div id = 'circle3' class = 'circles'></div>
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
               	$("#prompt").fadeIn(1000);
               	$("#prompt").delay(1000).fadeOut();

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
					$("#submenu").show();
					$("#blackcover").fadeIn();
					$("#deletebox").delay(500).fadeIn();
				});

				$("#no").click(function()
                    {
                    	$("#deletebox").fadeOut();
					$("#blackcover").delay(500).fadeOut();
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

		<?php 
			if (isset($_SESSION['logged']))
			{
				if ($_SESSION['logged'] == "1")
				{
					echo "<div id = 'prompt'>Successfully logged in!</div>";
					$_SESSION['logged'] = "0";
				}
				else if ($_SESSION['logged'] == "2")
				{
					echo "<div id = 'prompt'>You've been successfully logged out.</div>";
					session_destroy();
				}
			}
		?>

	</body>

</html>