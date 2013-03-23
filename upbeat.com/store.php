<?php 

	include("products.php");
	session_start();
	$first = $_GET['start'];
	$spage = $_GET['page'];
	$category = $_GET['cat'];

	$searcharray = array();
	$totalsearchproduct = 0;
	$searchpages = 0;
	$keyarray = array();
	$key = 0;

	if(isset($_POST['sbutton']) || isset($_POST['stxtbox']))
	{
		
		
		$token = strtok($_POST['stxtbox'], " ");
		while ($token != false)
	 	{
	 		array_push($keyarray, $token);
	 		//echo $keyarray[$key];
		  	$key++;
	 		$token = strtok(" ");
	 	} 
	 	//var_dump($token);
		$searchprodarray = mysql_query("SELECT * from product");

		while($row = mysql_fetch_array($searchprodarray, MYSQL_NUM))
		{
			$result = mysql_query("SELECT * from product_key where prod_id=".$row[0]);
			while($row1 = mysql_fetch_array($result, MYSQL_NUM))
			{
				//ssecho $row1[1];
				for($i=0;$i<$key;$i++)
				{
					if(strcmp($keyarray[$i], $row1[1]) == 0)
					{
						//echo "HA";
						array_push($searcharray, $row[0]);
						$totalsearchproduct++;
						goto end;
					}
				}
			}
			end:
		}
		//echo $totalsearchproduct;
		if ($totalsearchproduct%4 == 0) $searchpages = ($totalsearchproduct/4)%(($totalsearchproduct/4)+1);
		else $searchpages = ($totalsearchproduct/4)%(($totalsearchproduct/4)+1)+1;
		//sssecho $searchpages;
		//header("Location:store.php?cat=search&start=0&page=1");
	}
	else if (isset($_GET['search'])) 
	{
		//echo "WAAAAH";
		$token = strtok($_GET['search'], " ");
		while ($token != false)
	 	{
	 		array_push($keyarray, $token);
	 		//echo $keyarray[$key];
		  	$key++;
	 		$token = strtok(" ");
	 	} 
		$searchprodarray = mysql_query("SELECT * from product");

		while($row = mysql_fetch_array($searchprodarray, MYSQL_NUM))
		{
			$result = mysql_query("SELECT * from product_key where prod_id=".$row[0]);
			while($row1 = mysql_fetch_array($result, MYSQL_NUM))
			{
				//echo $key;
				for($i=0;$i<$key;$i++)
				{
					if(strcmp($keyarray[$i], $row1[1]) == 0)
					{
						
						array_push($searcharray, $row[0]);

						$totalsearchproduct++;

						goto end2;
					}
				}
			}
			end2:
		}
		if ($totalsearchproduct%4 == 0) $searchpages = ($totalsearchproduct/4)%(($totalsearchproduct/4)+1);
		else $searchpages = ($totalsearchproduct/4)%(($totalsearchproduct/4)+1)+1;
	}

	//echo $searchpages;

	$itemarr = array();
	if (strcmp($category, "all") == 0) $prodlist = mysql_query("SELECT * from product");
	else if (strcmp($category, "men") == 0) $prodlist = mysql_query("SELECT * from product where gender_type = 'Male'");
	else if (strcmp($category, "women") == 0) $prodlist = mysql_query("SELECT * from product where gender_type = 'Female'");
	else if (strcmp($category, "search") == 0) $itemarr = $searcharray;

	if (strcmp($category, "search") != 0){
	while ($curritem = mysql_fetch_array($prodlist, MYSQL_NUM)) {array_push($itemarr, $curritem[0]);}
}

?>

<html>

	<head>
		<title>UPBeat</title>
		<link rel = "stylesheet" type = "text/css" href = "CSS/local.css">
		<link rel = "stylesheet" type = "text/css" href = "CSS/store.css">
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

			<?php

				if (!isset($_SESSION['uname']))
				{

					echo "<div id = 'upleft'>Create an account. Sign up now!</div>
					
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

		<?php

			if (isset($_SESSION['type']))
			{
				if(strcmp($_SESSION['type'], "administrator") == 0)
				{
					echo "<div id = 'adsubmenu'>
						<ul id = 'adminaccount'>
							<li><a class = 'link' href = 'addadmin.php'>Add Administrator</a></li>
							<li id = 'addprod'>Add Product</li>
							<li><a class = 'link' href = 'viewcustomers.php?start=0&page=1'>View Customers</a></li>
							<li><a class = 'link' href = 'vieworders.php?start=0&page=1'>View Orders</a></li>
							<li>View Inventory</li>
						</ul>
					</div>";
				}
			}
		?>

		<ul id = 'storecat'>
			<li><a class = 'link' href = 'store.php?cat=all&start=0&page=1'>View All</a></li>
			<li><a class = 'link' href = 'store.php?cat=men&start=0&page=1'>Men</a></li>
			<li><a class = 'link' href = 'store.php?cat=women&start=0&page=1'>Women</a></li>
		</ul>

		<div id = 'maincontent'>

			<div id = 'productlist'>

				<?php 
				if(strcmp($_GET['cat'], "search") != 0){
				if($_GET['page'] != 1 ) {echo "<a href = 'store.php?cat=".$_GET['cat']."&start=".(($_GET['page']-2)*4)."&page=".($_GET['page']-1)."'><div id = 'prev'></div></a>";}
						else {echo "<div id = 'prev'></div>";}
					}
					else{
						if($_GET['page'] != 1 ) {echo "<a href = 'store.php?cat=".$_GET['cat']."&start=".(($_GET['page']-2)*4)."&page=".($_GET['page']-1)."&search=";
								for($j=0;$j<$key-1;$j++)
							{
								echo $keyarray[$j]."+";
							}
							echo $keyarray[$j];
						echo "'><div id = 'prev'></div></a>";}
						else {echo "<div id = 'prev'></div>";}
					}

						?>

				<?php 

					if (strcmp($category, "all") == 0)
					{
						if ($spage == $pages && $products%4 != 0) $limit = $first+($products%4);
						else $limit = $first+4;
					}
					else if (strcmp($category, "men") == 0)
					{
						if ($spage == $menpages && $menproducts%4 != 0) $limit = $first+($menproducts%4);
						else $limit = $first+4;
					}
					else if (strcmp($category, "women") == 0)
					{
						if ($spage == $womenpages && $womenproducts%4 != 0) $limit = $first+($womenproducts%4);
						else $limit = $first+4;
					}
					else if (strcmp($category, "search") == 0)
					{
						if ($spage == $searchpages && $totalsearchproduct%4 != 0) $limit = $first+($totalsearchproduct%4);
						else $limit = $first+4;
					}
				
					echo "<div id = 'container'>";

						for ($i = $first; $i < $limit; $i++)
						{
							$result = mysql_query("select * from product where id = ".$itemarr[$i]);
							$row8 = mysql_fetch_array($result, MYSQL_NUM);
							if(strcmp($category, "search") != 0){
							echo "
								<div class = 'prod'>
									<a class = 'link' href = 'viewproduct.php?cat=".$category."&item=".$i."'><img class = 'prodimg2' src = 'IMAGES/product/".$row8[2]."'/></a>
									<div class = 'prodesc'>
										".$row8[1]."<br/>
										<a class = 'link' href = 'viewproduct.php?cat=".$category."&item=".$i."'><input type = 'submit' value = 'Add to Cart'/></a>
									</div>
								</div>
							";
							}
							else{
							echo "
								<div class = 'prod'>
									<a class = 'link' href = 'viewproduct.php?cat=".$category."&item=".$i."&search=";
					for($j=0;$j<$key-1;$j++)
							{
								echo $keyarray[$j]."+";
							}
							echo $keyarray[$j];

									echo "'><img class = 'prodimg2' src = 'IMAGES/product/".$row8[2]."'/></a>
									<div class = 'prodesc'>
										".$row8[1]."<br/>
										<input type = 'submit' value = 'Add to Cart'/>
									</div>
								</div>
							";								
							}
						}

					echo "</div>";
				?>
	
				<?php 
				if (strcmp($category, "men") == 0) $pages = $menpages;
					else if (strcmp($category, "women") == 0) $pages = $womenpages;
					else if (strcmp($category, "search") == 0) $pages = $searchpages;
				if(strcmp($_GET['cat'], "search") != 0){
				if($_GET['page'] != $pages) {echo "<a href = 'store.php?cat=".$_GET['cat']."&start=".(($_GET['page'])*4)."&page=".($_GET['page']+1)."'><div id = 'next'></div></a>";}
						else {echo "<div id = 'next'></div>";}
					}
					else{
						if($_GET['page'] != $pages) {echo "<a href = 'store.php?cat=".$_GET['cat']."&start=".(($_GET['page'])*4)."&page=".($_GET['page']+1)."&search=";
								for($j=0;$j<$key-1;$j++)
							{
								echo $keyarray[$j]."+";
							}
							echo $keyarray[$j];
						echo "'><div id = 'next'></div></a>";}
						else {echo "<div id = 'next'></div>";}
					}

						?>


			</div>

			<div id = 'items'>

				<?php 

					if (strcmp($category, "men") == 0) $pages = $menpages;
					else if (strcmp($category, "women") == 0) $pages = $womenpages;
					else if (strcmp($category, "search") == 0) $pages = $searchpages;
					for ($i = 1; $i <= $pages; $i++)
					{
						$first = 4*($i-1);
						if (strcmp($category, "search") == 0)
						{
							echo "<a class = 'link' href = 'store.php?cat=".$category."&start=".$first."&page=".$i."&search=";
							for($j=0;$j<$key-1;$j++)
							{
								echo $keyarray[$j]."+";
							}
							echo $keyarray[$j];
							echo "'>".$i." </a>";
						}
						else
						{
							echo "<a class = 'link' href = 'store.php?cat=".$category."&start=".$first."&page=".$i."'>".$i." </a>";
						}
					}
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
               	$("#s").hide();
               	$("#blackcover").hide();
               	$("#deletebox").hide();
               	$("#adsubmenu").hide();	
               	$("#submenu").hide();

               	$("#del").click(function()
				{
					$("#submenu").show();
					$("#blackcover").fadeIn();
					$("#deletebox").delay(500).fadeIn();
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

	<?php mysql_close($con); ?>

</html>