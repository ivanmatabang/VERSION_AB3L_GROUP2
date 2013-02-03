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

		<div id = 'menuoptions'>

			

		</div>


		<div id = 'left'></div>
		<div id = 'right'></div>

	</body>

</html>