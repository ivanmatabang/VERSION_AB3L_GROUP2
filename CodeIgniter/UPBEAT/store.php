<?php 

?>

<html>
	<head>
		<title>UPBeat Online Shop</title>
		<link rel = "stylesheet" type = "text/css" href = "CSS/store.css">
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
               		$("#menbox").animate({"opacity":'1'},{duration: 500});
               		$("#womenbox").animate({"opacity":'0'},{duration: 200});
               		$("#msthumbox").animate({"opacity":'1'},{duration: 1500});
               		$("#mjthumbox").animate({"opacity":'1'},{duration: 2000});
          		});

          		$("li#catwomen").mouseover(function()
                    {
                    	$("#menbox").animate({"opacity":'0'},{duration: 200});
               		$("#womenbox").animate({"opacity":'1'},{duration: 500});
               		$("#wsthumbox").animate({"opacity":'1'},{duration: 1500});
               		$("#wjthumbox").animate({"opacity":'1'},{duration: 2000});
          		});

               	$("#mainbody, ul#products li, #upcontain").mouseover(function()
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

			<ul id = 'products'>
				<li>a</li>
				<li>b</li>
				<li>c</li>
				<li>d</li>
				<li>e</li>
				<li>a</li>
				<li>b</li>
				<li>c</li>
				<li>d</li>
				<li>e</li>
				<li>a</li>
				<li>b</li>
				<li>c</li>
				<li>d</li>
				<li>e</li>
				<li>a</li>
				<li>b</li>
				<li>c</li>
				<li>d</li>
				<li>e</li>
			</ul>

		</div>

		<div id = 'topmost'>

			<div id = 'logo'></div>
			
			<div id = 'account'>
				<div id = 'acctext'>
					Welcome | Account | Cart
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

				<li id = 'catmen'>Men</li>
				<li id = 'catwomen'>Women</li>

			</ul>

			<div id = 'login'>

				<div id = 'create'>Create an account. <input type = 'submit' id = 'upbutton' value = 'SIGN UP'/></div>
				
				<form name = 'loginform' method = 'post' action = ''>

					<div id = 'namediv'>Username <input type = 'text' name = 'uname' size = '15'/></div>
					<div id = 'passdiv'>Password <input type = 'password' name = 'pword' size = '15'/></div>
					<div id = 'button'><input type = 'submit' name = 'logbutton' value = 'LOG IN'/></div>
				
				</form>

			</div>
			
			<div id = 'menu'>

				<form name = 'searchform' method = 'post' action = 'results.php'>

					<ul id = 'options'>
						<li id = 'option1'>HOME</li>
						<li id = 'option2'>COLLECTION</li>
						<li id = 'option3'><a class = 'links' href = 'store.php'>STORE</a></li>
						<li id = 'option4'>LOG IN</li>
						<li id = 'option5'><input type = 'text' name = 'sbox' value = 'Search' onClick = 'return srch(this);' size = '15'></li>
					</ul>

				</form>

			</div>

		</div>

		<div id = 'menbox'>

			<div id = 'msthumb'>
				<div id = 'msthumbox'>
					<div class = 'slabel'></div>
				</div>
			</div>

			<div id = 'mjthumb'>
				<div id = 'mjthumbox'>
					<div class = 'jlabel'></div>
				</div>
			</div>

		</div>

		<div id = 'womenbox'>

			<div id = 'wsthumb'>
				<div id = 'wsthumbox'>
					<div class = 'slabel'></div>
				</div>
			</div>

			<div id = 'wjthumb'>
				<div id = 'wjthumbox'>
					<div class = 'jlabel'></div>
				</div>
			</div>

		</div>

		<div id = 'upcontain'>

			<div id = 'upcontent'>

				<form method = 'post' action = '' name = 'signupform'>

					<div id = 'upmain'>

						<br/>
						<table id = 'up'>

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
								<td><input type = 'text' name = 'uplname'></td>
							</tr>

							<tr>
								<td>Mailing Address</td>
								<td><input type = 'text' name = 'maddress'></td>
								<td>Zip Code</td>
								<td><input type = 'text' name = 'uplname'></td>
							</tr>

							<tr>
								<td>E-mail</td>
								<td><input type = 'text' name = 'upemail'/></td>
								<td>Confirm E-mail</td>
								<td><input type = 'text' name = 'uplname'></td>
							</tr>

							<tr>
								<td>Password</td>
								<td><input type = 'password' name = 'upword'></td>
								<td>Confirm Password</td>
								<td><input type = 'text' name = 'uplname'></td>
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