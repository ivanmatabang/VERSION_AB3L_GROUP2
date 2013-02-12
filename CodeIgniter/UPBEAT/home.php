<?php 
	session_start();

?>

<html>
	<head>
		<title>UPBeat Online Shop</title>
		<link rel = "stylesheet" type = "text/css" href = "CSS/local.css">
		<script type = "text/javascript" src = "SCRIPTS/jquery.js"></script>

		<script type = "text/javascript">

			function srch() { document.searchform.sbox.value = ""; }

			$(document).ready(function()
               {
               
               	$("li#option1").mouseover(function()
                    {
                    	$("#menbox").animate({"opacity":'0'},{duration: 200});
                    	$("#womenbox").animate({"opacity":'0'},{duration: 200});
                    	$("#login").animate({"margin-top":'20%'},{duration: 500});
                    	$("ul#category").animate({"margin-top":'20%'},{duration: 500});
               	});

				$("li#option2").mouseover(function()
                    {
                    	$("#menbox").animate({"opacity":'0'},{duration: 200});
                    	$("#womenbox").animate({"opacity":'0'},{duration: 200});
                    	$("ul#category").animate({"margin-top":'60%'},{duration: 500});
                    	$("#login").animate({"margin-top":'20%'},{duration: 500});
               	});

               	$("li#option3").mouseover(function()
                    {
                    	$("#menbox").animate({"opacity":'0'},{duration: 200});
                    	$("#womenbox").animate({"opacity":'0'},{duration: 200});
                    	$("#login").animate({"margin-top":'20%'},{duration: 500});
                    	$("ul#category").animate({"margin-top":'20%'},{duration: 500});
               	});

               	$("li#option4").mouseover(function() // LOGIN
                    {
                    	$("#menbox").animate({"opacity":'0'},{duration: 200});
                    	$("#womenbox").animate({"opacity":'0'},{duration: 200});
                    	$("ul#category").animate({"margin-top":'20%'},{duration: 500});
                    	$("#login").animate({"margin-top":'60%'},{duration: 500});
               	});


               	$("li#option5").mouseover(function()
                    {
                    	$("#menbox").animate({"opacity":'0'},{duration: 200});
                    	$("#womenbox").animate({"opacity":'0'},{duration: 200});
                    	$("#login").animate({"margin-top":'20%'},{duration: 500});
                    	$("ul#category").animate({"margin-top":'20%'},{duration: 500});
               	});

               	$("#upbutton").click(function()
                    {
                    	$("ul#category").animate({"margin-top":'20%'},{duration: 500});
                    	$("#upcontain").animate({"opacity":'1'},{duration: 500});
               	});

               	$("li#catmen").mouseover(function()
                    {
               		$("div#menbox").animate({"opacity":'1'},{duration: 500});
               		$("div#womenbox").animate({"opacity":'0'},{duration: 200});
               		$("#msthumbox").animate({"opacity":'1'},{duration: 1500});
               		$("#mjthumbox").animate({"opacity":'1'},{duration: 2000});
          		});

          		$("li#catwomen").mouseover(function()
                    {
                    $("div#menbox").animate({"opacity":'0'},{duration: 200});
               		$("div#womenbox").animate({"opacity":'1'},{duration: 500});
               		$("#wsthumbox").animate({"opacity":'1'},{duration: 1500});
               		$("#wjthumbox").animate({"opacity":'1'},{duration: 2000});
          		});
				
               	$("#mainbody, #news").mouseover(function()
                    {
                    	$("#menbox").animate({"opacity":'0'},{duration: 200});
                    	$("#womenbox").animate({"opacity":'0'},{duration: 200});
                    	$("#login").animate({"margin-top":'20%'},{duration: 500});
                    	$("ul#category").animate({"margin-top":'20%'},{duration: 500});
               	});
               });

          </script>
	</head>

	<body>

		<div id = 'mainbody'>
			
		</div>

		<div id = 'news'>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			<br/><br/>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			<br/><br/>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</div>

		<div id = 'topmost'>
			<div id = 'logo'></div>
			
			<div id = 'account'>
				<div id = 'acctext'>
					Welcome | <a class = 'links' href = 'account.php'>Account</a></li> | Cart
				</div>
			</div>

			<?php

				if (isset($_POST['logbutton']))
				{
					$uname = $_POST['uname'];

					if ($uname == null)
					{
						echo "<div id = 'checker'>
							Username must be filled.
						</div>";
					}
				}
			?>

			<ul id = 'category'>
				<a class = 'links' href = 'results.php?gtype=male&&coll=1'><li id = 'catmen'>Men</li></a>
				<a class = 'links' href = 'results.php?gtype=female&&coll=1'><li id = 'catwomen'>Women</li></a>
			</ul>

			<div id = 'login'>
					<div id = 'create'>Create an account. <input type = 'submit' id = 'upbutton' value = 'SIGN UP'/></div>
					
					<form name = 'loginform' method = 'post' action = 'process.php'>
						<div id = 'namediv'>Username <input type = 'text' name = 'uname' size = '15'/></div>
						<div id = 'passdiv'>Password <input type = 'password' name = 'pword' size = '15'/></div>
						<div id = 'button'><input type = 'submit' name = 'loginbutton' value = 'LOG IN'/></div>
		
					</form>
			</div>
			
			<div id = 'menu'>
				<form name = 'searchform' method = 'post' action = 'results.php'>
					<ul id = 'options'>
						<li id = 'option1'>HOME</li>
						<li id = 'option2'><a class = 'links' href = 'results.php?all=1&&coll=1'>COLLECTION</a></li>
						<li id = 'option3'><a class = 'links' href = 'results.php?all=1&&store=1'>STORE</a></li>
						<?php
						if(isset($_SESSION['uname']))
						{
						?>
							<li id = 'option4b'><a class = 'links' href = 'process.php?out=1'>LOG OUT</a></li>
						<?php
						}
						else
						{
						?>
							<li id = 'option4'>LOG IN</li>
						<?php
						}
						?>
						
						<li id = 'option5'><input type = 'text' name = 'sbox' value = 'Search' onClick = 'return srch(this);' ></li>
					</ul>
				</form>
			</div>
		</div>

		<div id = 'menbox'>
			<div id = 'msthumb'>
				<a class = 'links' href = 'results.php?gtype=male&&stype=t-shirt&&coll=1'>
					<div id = 'msthumbox'>
						<div class = 'slabel'>
						</div>
					</div>
				</a>
			</div>
			
			<div id = 'mjthumb'>
				<a class = 'links' href = 'results.php?gtype=male&&stype=jacket&&coll=1'>
					<div id = 'mjthumbox'>
						<div class = 'jlabel'>
						</div>
					</div>
				</a>
			</div>
		</div>

		<div id = 'womenbox'>
			<div id = 'wsthumb'>
				<a class = 'links' href = 'results.php?gtype=female&&stype=t-shirt&&coll=1'>
					<div id = 'wsthumbox'>
						<div class = 'slabel'>
						</div>
					</div>
				</a>
			</div>
			
			<div id = 'wjthumb'>
				<a class = 'links' href = 'results.php?gtype=female&&stype=jacket&&coll=1'>
					<div id = 'wjthumbox'>
						<div class = 'jlabel'>
						</div>
					</div>
				</a>	
			</div>
		</div>

		<div id = 'upcontain'>
			<div id = 'upcontent'>

				<form method = 'post' action = 'process.php' name = 'signupform'>

					<div id = 'upmain'>

						<br/><table id = 'up'>

							<tr>
								<td>First Name</td>
								<td><input type = 'text' name = 'upfname'></td>
								<td>Last Name</td>
								<td><input type = 'text' name = 'uplname'></td>
							</tr>

							<tr>
								<td>Username</td>
								<td><input type = 'text' name = 'upuname'></td>
								<td>Contact Number</td>
								<td><input type = 'text' name = 'upconta'></td>
							</tr>

							<tr>
								<td>Mailing Address</td>
								<td><input type = 'text' name = 'upaddre'></td>
								<td>ID</td>
								<td><input type = 'text' name = 'upid'></td>
							</tr>

							<tr>
								<td>E-mail</td>
								<td><input type = 'text' name = 'upemail'/></td>
								<td>Confirm E-mail</td>
								<td><input type = 'text' name = 'upconemail'></td>
							</tr>

							<tr>
								<td>Password</td>
								<td><input type = 'password' name = 'upword'></td>
								<td>Confirm Password</td>
								<td><input type = 'text' name = 'upconword'></td>
							</tr>

							<tr>
								<td colspan = '3'><input type = 'submit' name = 'signupbutton' value = 'SIGN UP!'></td>
							</tr>

						</table>

					</div>

				</form>
				
			</div>
		</div>

	</body>
</html>