<?php session_start(); ?>

<html>

	<head>

		<title>UPBeat Online Shop</title>
		<link rel = "stylesheet" type = "text/css" href = "CSS/local.css">
		<script type = "text/javascript" src = "SCRIPTS/jquery.js"></script>

	</head>

	<body>

		<div id = 'header'>
			<div id = 'logo'></div>

			<div id = 'accheader'
			>Welcome | 
			<a href = 'account.php'>Account</a> | 
			<a href = 'viewcart.php'>Cart</a>
			</div>

			<div id = 'menuheader'>

				<ul id = 'menu'>
					<?php
						if(isset($_SESSION['type']))
						{
							if(strcmp($_SESSION['type'], "administrator") == 0)
							{
					?>
						<a class = 'link' href = 'admin.php'><li>HOME</li></a>
					<?php
							}
							else
							{
					?>
						<a class = 'link' href = 'home.php'><li>HOME</li></a>
					<?php			
							}
						}
						else
						{
					?>
						<a class = 'link' href = 'home.php'><li>HOME</li></a>
					<?php
						}
					?>
					<a class = 'link' href = 'collections.php?all=1'><li>COLLECTIONS</li></a>
					<a class = 'link' href = 'store.php'><li>STORE</li></a>
					
					
						<li>

							<?php

								if(isset($_SESSION['uname']))
								{
							?>
								<a class = 'link' href = 'process.php?out=1'>LOGOUT</a>
							<?php
								}
								else
								{
							?>
								<a class = 'link' href = 'register.php'>LOGIN</a>
							<?php
								}

							?>

						</li>
					

					<li>
						<form name = 'searchform' action = 'collections.php' method = 'post'>
							<div id = 'searchline'>
								<input type = 'text' value = 'Search' name = 'searchbox' id = 'boxsize'/>
								<input type = 'submit' name = 'sbox' id = 'srchbutton'/>
							</div>
						</form>
					</li>
				</ul>

			</div>

			<div id = 'catheader'>HOME > NEWS > ABOUT US</div>
		</div>

	</body>


</html>