<?php session_start(); ?>

<html>

	<head>

		<title>UPBeat Online Shop</title>
		<link rel = "stylesheet" type = "text/css" href = "CSS/local.css">
		<script type = "text/javascript" src = "SCRIPTS/validate.js"></script>

		<script type="text/javascript">

			function srch() {document.searchform.searchbox.value = "";}

		</script>

	</head>

	<body>

		<div id = 'header'>
			<div id = 'logo'></div>

			<div id = 'accheader'>
				
				<?php
					if(isset($_SESSION['uname']))
					{
						echo "Welcome, "."<a href = 'account.php'>".$_SESSION['fname']."</a>";
					}
					else echo "Welcome | <a href = 'register.php'>Account</a>";
				?> |

				<a href = 'viewcart.php'>Cart</a>
			</div>

			<div id = 'menuheader'>

				<ul id = 'menu'>

					<?php

						if(isset($_SESSION['type']))
						{
							if(strcmp($_SESSION['type'], "administrator") == 0)
								{ echo "<a class = 'link' href = 'admin.php'><li>HOME</li></a>";}
							else
								{ echo "<a class = 'link' href = 'home.php'><li>HOME</li></a>";}
						}
						else { echo "<a class = 'link' href = 'home.php'><li>HOME</li></a>";}
					?>

					<a class = 'link' href = 'collections.php?all=1'><li>COLLECTIONS</li></a>
					<a class = 'link' href = 'store.php?all=1'><li>STORE</li></a>
					
					<?php

						if(isset($_SESSION['uname']))
							{ echo "<a class = 'link' href = 'process.php?out=1'><li>LOG OUT</li></a>";}
						else
							{ echo "<a class = 'link' href = 'register.php'><li>LOG IN</li></a>";}
					?>
					

					<li>
						<form name = 'searchform' action = 'results.php' method = 'post'>
							<div id = 'searchline'>
								<input type = 'text' value = 'Search' name = 'searchbox' id = 'boxsize' onClick = 'return srch(this);'/>
								<input type = 'submit' name = 'sbox' value = '' id = 'srchbutton'/>
							</div>
						</form>
					</li>
				</ul>

			</div>

			<div id = 'catheader'>HOME > NEWS > ABOUT US</div>

		</div>

		<?php

			if(isset($_SESSION['uname']))
				echo "<div id = 'prompt'>Successfully logged in!</div>";

		?>

	</body>


</html>