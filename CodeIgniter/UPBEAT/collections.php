<?php
	session_start();

	$username = "root";
	$password = "";
	$hostname = "localhost"; 
	$result_num =0;
	$result_array = array();	
	$con = mysql_connect($hostname, $username, $password);
			
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}

	$db = mysql_select_db("upbeat", $con);
	if (!$db)
	{
	 	die('Could not connect: ' . mysql_error());
	}


	if(isset($_POST['sbox']) || isset($_POST['searchbox']))
	{
		
			
		$product_array = array();
		$product = $_POST['searchbox'];
		$word_num = 0;
		$result_num = 0;

		$token = strtok($product, " ");

		while ($token != false)
	 	{
	 		//echo $token;
	 		array_push($product_array, $token);
		  	$word_num++;
	 		$token = strtok(" ");
	 	} 

		if(isset($_POST['submit_filter']))
		{
			if($_POST['filtermin'] != NULL && $_POST['filtermax'] != NULL)
			{	
				$result = mysql_query("SELECT * from product where price>=".$_POST['filtermin']." AND price<=".$_POST['filtermax']);
			}
			else if($_POST['filtermin'] != NULL)
			{
				$result = mysql_query("SELECT * from product where price>=".$_POST['filtermin']);
			}
			else
			{
				$result = mysql_query("SELECT * from product where price<=".$_POST['filtermax']);
			}
		}
		else
		{
			$result = mysql_query("SELECT * from product");
		}
		while ($row = mysql_fetch_array($result, MYSQL_NUM))
		{
			$result2 = mysql_query("SELECT * from product_key where prod_id=".$row[0]);
			while ($row2 = mysql_fetch_array($result2, MYSQL_NUM))
			{
				for($j=0; $j<$word_num; $j++)
			 	{
			 		if(strcmp(strtolower($product_array[$j]), strtolower($row2[1])) == 0)
			 		{
			 			//echo $row2[0];
			 			array_push($result_array, $row2[0]);
			 			$result_num++;
			 			break;
			 		}
			 	}
			}
		}
		mysql_free_result($result);



				
	}
	else if(isset($_GET['stype']) && isset($_GET['gtype']))
	{
		if(isset($_POST['submit_filter']))
		{
			if($_POST['filtermin'] != NULL && $_POST['filtermax'] != NULL)
			{
				$result = mysql_query("SELECT * from product where shirt_type='".$_GET['stype']."' AND gender_type='".$_GET['gtype']."' AND price>=".$_POST['filtermin']." AND price<=".$_POST['filtermax']);
			}
			else if($_POST['filtermin'] != NULL)
			{
				$result = mysql_query("SELECT * from product where shirt_type='".$_GET['stype']."' AND gender_type='".$_GET['gtype']."' AND price>=".$_POST['filtermin']);
			}
			else
			{	$result = mysql_query("SELECT * from product where shirt_type='".$_GET['stype']."' AND gender_type='".$_GET['gtype']."' AND price<=".$_POST['filtermax']);

			}
		}
		else
		{
			$result = mysql_query("SELECT * from product where shirt_type='".$_GET['stype']."' AND gender_type='".$_GET['gtype']."'");
		}
		$result_array = array();
		$result_num = 0;
		while ($row = mysql_fetch_array($result, MYSQL_NUM))
		{
			array_push($result_array, $row[0]);
			$result_num++;
		}

		
	}
	else if(isset($_GET['gtype']))
	{
		if(isset($_POST['submit_filter']))
		{
			if($_POST['filtermin'] != NULL && $_POST['filtermax'] != NULL)
			{
				$result = mysql_query("SELECT * from product where gender_type='".$_GET['gtype']."' AND price>=".$_POST['filtermin']." AND price<=".$_POST['filtermax']);
			}
			else if($_POST['filtermin'] != NULL)
			{
				$result = mysql_query("SELECT * from product where gender_type='".$_GET['gtype']."' AND price>=".$_POST['filtermin']);
			}
			else
			{
				$result = mysql_query("SELECT * from product where gender_type='".$_GET['gtype']."' AND price<=".$_POST['filtermax']);
			}
		}
		else
		{
			$result = mysql_query("SELECT * from product where gender_type='".$_GET['gtype']."'");
		}
		$result_array = array();
		$result_num = 0;
		while ($row = mysql_fetch_array($result, MYSQL_NUM))
		{
			array_push($result_array, $row[0]);
			$result_num++;
		}

		
	}
	else if(isset($_GET['all']))
	{
		if(isset($_POST['submit_filter']))
		{
			if($_POST['filtermin'] != NULL && $_POST['filtermax'] != NULL)
			{	
				$result = mysql_query("SELECT * from product where price>=".$_POST['filtermin']." AND price<=".$_POST['filtermax']);
			}
			else if($_POST['filtermin'] != NULL)
			{
				$result = mysql_query("SELECT * from product where price>=".$_POST['filtermin']);
			}
			else
			{
				$result = mysql_query("SELECT * from product where price<=".$_POST['filtermax']);
			}
		}
		else
		{
			$result = mysql_query("SELECT * from product");
		}

		$result_array = array();
		$result_num = 0;
		while ($row = mysql_fetch_array($result, MYSQL_NUM))
		{
			array_push($result_array, $row[0]);
			$result_num++;
		}

			
	}
?>

<html>

	<head>

		<title>UPBeat Online Shop</title>
		<link rel = "stylesheet" type = "text/css" href = "CSS/local.css">
		<link rel = "stylesheet" type = "text/css" href = "CSS/collections.css">
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
			
	
			<div id = 'catheader'>
				<?php
				if(isset($_GET['all']))
				{
					echo "<a href = 'collections.php?all=1'>COLLECTIONS</a> > 
					<a href = 'collections.php?gtype=male'>MEN</a> > 
					<a href = 'collections.php?gtype=female'>WOMEN</a>";
				}
				else if(isset($_GET['stype']) && isset($_GET['gtype']))
				{
					echo "<a href = 'collections.php?all=1'>COLLECTIONS</a> > ";
					if(strcmp($_GET['gtype'], "male") == 0)
					{
					echo "<a href = 'collections.php?gtype=male'>MEN</a> > 
					<a href = 'collections.php?gtype=male&&stype=t-shirt'>T-shirt</a> >
					<a href = 'collections.php?gtype=male&&stype=jacket'>Jacket</a>";
					}
					else
					{
					echo "<a href = 'collections.php?gtype=female'>WOMEN</a> > 
					<a href = 'collections.php?gtype=female&&stype=t-shirt'>T-shirt</a> >
					<a href = 'collections.php?gtype=female&&stype=jacket'>Jacket</a>";
					}
				}
				else if(isset($_GET['gtype']))
				{
					echo "<a href = 'collections.php?all=1'>COLLECTIONS</a> > ";
					if(strcmp($_GET['gtype'], "male") == 0)
					{
					echo "<a href = 'collections.php?gtype=male'>MEN</a> > 
					<a href = 'collections.php?gtype=male&&stype=t-shirt'>T-shirt</a> >
					<a href = 'collections.php?gtype=male&&stype=jacket'>Jacket</a>";
					}
					else
					{
					echo "<a href = 'collections.php?gtype=female'>WOMEN</a> > 
					<a href = 'collections.php?gtype=female&&stype=t-shirt'>T-shirt</a> >
					<a href = 'collections.php?gtype=female&&stype=jacket'>Jacket</a>";
					}
				}
				?>
			</div>
		</div>

		<ul id = 'container'>

			<?php

		
				for($i=0; $i<$result_num; $i++)
				{
					$result = mysql_query("select * from product where id=".$result_array[$i]);
					$row = mysql_fetch_array($result);
					if(isset($_POST['sbox']) || isset($_POST['searchbox']))
					{
					echo "<li><a href = 'viewproduct.php?id=".$row[0]."&&cur=".$i."'>".$row[1]."</a></li>";
					}
					else if(isset($_GET['all']))
					{
					echo "<li><a href = 'viewproduct.php?all=1&&id=".$row[0]."&&cur=".$i."'>".$row[1]."</a></li>";
					}
					else if(isset($_GET['stype']) && isset($_GET['gtype']))
					{
					echo "<li><a href = 'viewproduct.php?gtype=".$_GET['gtype']."&&stype=".$_GET['stype']."&&id=".$row[0]."&&cur=".$i."'>".$row[1]."</a></li>";
					}
					else if(isset($_GET['gtype']))
					{
					echo "<li><a href = 'viewproduct.php?gtype=".$_GET['gtype']."&&id=".$row[0]."&&cur=".$i."'>".$row[1]."</a></li>";
					}
				}
			?>

		</ul>

		<div id = 'footer'>Copyright 2013 UPBeat. All Rights Reserved.</div>

	</body>


</html>

<?php
	mysql_close($con);	
?>