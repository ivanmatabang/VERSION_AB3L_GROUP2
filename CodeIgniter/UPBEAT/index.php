<?php
	
	session_start();
	session_destroy();
	session_start();

?>

<html>

	<head>

		<title>UPBeat Online Shop</title>
		<link rel = 'stylesheet' type = 'text/css' href = 'CSS/local.css'>
		<script type = 'text/javascript' src = 'SCRIPTS/jquery.js'></script>

		<script type = "text/javascript">

			function srch() { document.search.sbox.value = ""; }

			$(document).ready(function()
               {
               	$("#sign").hide();
               	$("#cover2").hide();
               	$("#logcontent").hide();
               	$("#colcontent").hide();
               	$("#left").animate({"margin-left":'0%'},{duration: 2000});
               	$("#right").animate({"margin-left":'50%'},{duration: 2000});
               	$("#flash").delay(2000).animate({"opacity":'1'},{duration: 2000});

				$("#enter").click(function()
                    {
                    	$("#flash").animate({"opacity":'0'},{duration: 1000});
                    	$("#left").delay(1000).animate({"margin-left":'-50%'},{duration: 2000});
               		$("#right").delay(1000).animate({"margin-left":'100%'},{duration: 2000});
               		$("#shelf").delay(2000).fadeOut();
                    });

                    $("#login").mouseover(function()
                    {
                    	$("#colcontent").slideUp();
                    	$("#logcontent").slideDown();
                    	$("#cover1").show();
                    	$("ul#category li#cat1").animate({"opacity":'0'});
                    	$("ul#category li#cat2").animate({"opacity":'0'});
                    	$("ul#category li#cat3").animate({"opacity":'0'});
                    	$("ul#category li#cat4").animate({"opacity":'0'});
                    });

                    $("#cover1").mouseover(function()
                    {
                    	$("#logcontent").slideUp();
                    	$("#cover1").hide();
                    });

                    $("#cover2").mouseover(function()
                    {
                    	$("#colcontent").slideUp();
                    	$("#cover2").hide();
                    	$("ul#category li#cat1").animate({"opacity":'0'});
                    	$("ul#category li#cat2").animate({"opacity":'0'});
                    	$("ul#category li#cat3").animate({"opacity":'0'});
                    	$("ul#category li#cat4").animate({"opacity":'0'});
                    });

                    $("#collection").mouseover(function()
                    {
                    	$("#cover2").show();
                    	$("#logcontent").slideUp();
                    	$("#colcontent").slideDown();
                    	$("ul#category li#cat1").delay(200).animate({"opacity":'1'},{duration: 800});
                    	$("ul#category li#cat2").delay(300).animate({"opacity":'1'},{duration: 900});
                    	$("ul#category li#cat3").delay(400).animate({"opacity":'1'},{duration: 1000});
                    	$("ul#category li#cat4").delay(500).animate({"opacity":'1'},{duration: 1100});
               	});

               	$("#upbutton").click(function()
                    {
                    	$("#logcontent").slideUp();
                    	$("#cover1").hide();
                    	$("#shelf").show();
                    	$("#left").animate({"margin-left":'0%'},{duration: 2000});
	               	$("#right").animate({"margin-left":'50%'},{duration: 2000});
	               	$("#sign").delay(2000).slideDown();
                    });
               });

          </script>

	</head>

	<body>

		<div id = 'main'>

			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

		</div>

		<div id = 'logcontent'>

			<div id = 'logleft'>

				<br/><br/>Create an account. <input type = 'submit' id = 'upbutton' name = 'sup' value = 'SIGN UP'/>

			</div>

			<div id = 'logright'>


				<form method = 'post' action = 'process.php' name = 'loginform'>

					<br/><table id = 'log'>

						<tr>
							<td>Username</td>
							<td><input type = 'text' name = 'uname'></td>
						</tr>

						<tr>
							<td>Password</td>
							<td><input type = 'password' name = 'pword'></td>
						</tr>

						<tr>
							<td><input type = 'submit' name = 'submit_login' value = 'Log In!'></td>
						</tr>

					</table>

				</form>

			</div>
			
			<div id = 'cover1'></div>

		</div>

		<div id = 'colcontent'>

			<ul id = 'category'>
				<a href = 'shirts.php'><li id = 'cat1'>Shirts</li></a>
				<li id = 'cat2'>Jacket</li>
				<li id = 'cat3'>Others</li>
				<li id = 'cat4'>View All</li>
			</ul>

			<div id = 'cover2'></div>

		</div>

		<div id = 'header'>

			<div id = 'label'></div>

			<ul id = 'menu'>

				<li id = 'home'><a class = 'links' href = 'home.php'>HOME</a></li>
				<li id = 'collection'>COLLECTION</li>
				<li id = 'login'>LOG IN</li>
				<li id = 'cart'><a class = 'links' href = 'cart.php'>CART</a></li>
				<li id = 'slist'>
					<form method = 'post' action = 'results.php' name = 'search'>
						<input type = 'text' id = 'sinput' name = 'sbox' value = 'SEARCH' onClick = 'return srch(this);'/>
					</form>
				</li>

			</ul>

		</div>

		<div id = 'upper'></div>


		<div id = 'shelf'>
			<div id = 'left'></div>
			<div id = 'right'></div>

			<div id = 'flash'>
				<div id = 'content'>
					<div id = 'enter'>
						<input type = 'submit' id = 'ebutton' name = 'esite' value = 'ENTER SITE'/>
					</div>
				</div>
			</div>
		</div>

		<div id = 'sign'>

			<div id = 'signform'>

				<form method = 'post' action = 'process.php' name = 'signupform'>

					<br/><table id = 'up'>

						<tr>
							<td>Full Name</td>
							<td><input type = 'text' name = 'upfname'></td>
						</tr>

						<tr>
							<td>Username</td>
							<td><input type = 'text' name = 'upuname'></td>
						</tr>

						<tr>
							<td>E-mail</td>
							<td><input type = 'text' name = 'upemail'/></td>
						</tr>

						<tr>
							<td>Address</td>
							<td><input type = 'text' name = 'upaddre'/></td>
						</tr>

						<tr>
							<td>Contact Number</td>
							<td><input type = 'text' name = 'upconta'/></td>
						</tr>

						<tr>
							<td>Password</td>
							<td><input type = 'password' name = 'upword'></td>
						</tr>

						<tr>
							<td><input type = 'submit' name = 'submit_signup' value = 'SIGN UP!'></td>
						</tr>

					</table>

				</form>

			</div>

		</div>

	</body>

</html>