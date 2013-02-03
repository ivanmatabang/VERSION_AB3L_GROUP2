<?php 



?>

<html>

	<head>

		<title>UPBeat Online Shop</title>
		<link rel="stylesheet" type="text/css" href="CSS/home.css">
		<script type = "text/javascript" src = "SCRIPTS/jquery.js"></script>

		<script type = "text/javascript">

			function srch()
               {
                    document.search.sbox.value = "";
               }

			$(document).ready(function()
               {
               	$("#login").hide();
				$("#collection").hide();
				$("#flash").delay(2000).animate({"opacity": '1'}, {duration: 1000});
				$("#left").animate({"margin-left": '0%'}, {duration: 2000});
               	$("#right").animate({"margin-left": '50%'}, {duration: 2000});

				$("li#1").mouseover(function()
                    {
                    	$("#login").slideUp();
                    	$("#collection").slideUp();
                    });

				$("li#2").mouseover(function()
                    {
                    	$("#login").slideUp();
                    	$("#collection").slideDown();
                    });

                    $("li#3").mouseover(function()
                    {
                    	$("#login").slideDown();
                    	$("#collection").slideUp();
                    });

                    $("li#4").mouseover(function()
                    {
                    	$("#login").slideUp();
                    	$("#collection").slideUp();
                    });

                    $("#flash").click(function()
                    {
                    	$("#flash").fadeOut(1500);
                    	$("#left").delay(1000).animate({"margin-left": '-50%'}, {duration: 2000});
                    	$("#right").delay(1000).animate({"margin-left": '100%'}, {duration: 2000});
                    });
               });

		</script>

	</head>

	<body>

		<div id = 'collection'>
			
			<li><a class = 'links' href = 'shirts.php'>Shirts</a></li>
			<li><a class = 'links' href = 'jackets.php'>Jackets</a></li>
			<li><a class = 'links' href = 'viewall.php'>View All</a></li>

		</div>

		<div id = 'login'>

			<li>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-mail
				<input type = 'email' class = 'input' name = 'email' size = '15'/>
			</li>
			<li>Password <input type = 'password' class = 'input' name = 'password' size = '15'/></li>
			<li>
				<input type = 'submit' id = 'logbut' name = 'login' value = 'LOG IN'/> or
				<a class = 'links' href = 'signup.php'>SIGN UP</a>
			</li>

		</div>

		<div id = 'header'>

			<div id = 'label'></div>

			<ul id = 'menu'>

				<li id = '1'>HOME</li>
				<li id = '2'>COLLECTION</li>
				<li id = '3'><a class = 'links' href = 'login.php'>LOG IN</a></li>
				<li id = '4'><a class = 'links' href = 'cart.php'>CART</a></li>
				<li id = 'slist'>
					<form method = 'post' action = 'results.php' name = 'search'>
						<input type = 'text' id = 'sid' name = 'sbox' value = 'SEARCH' onClick = 'return srch(this);'/>
					</form>
				</li>

			</ul>

		</div>

		<div id = 'content'>

			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

		</div>

		<div id = 'left'></div>
		<div id = 'right'></div>
		<div id = 'flash'></div>

	</body>

</html>