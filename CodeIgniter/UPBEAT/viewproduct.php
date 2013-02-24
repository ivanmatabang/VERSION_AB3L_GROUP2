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


	if(!isset($_GET['all']) && !isset($_GET['gtype']))
	{
		$result = mysql_query("SELECT * FROM PRODUCT WHERE ID=".$_GET['id']);
		$row = mysql_fetch_array($result);
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

				for($i=0; $i<$result_num; $i++)
				{
					$result = mysql_query("select * from product where id=".$result_array[$i]);
					$row = mysql_fetch_array($result);
					if($i == $_GET['cur']) break;
				}
?>

<html>

	<head>

		<title>UPBeat Online Shop</title>
		<link rel = "stylesheet" type = "text/css" href = "CSS/local.css">
		<link rel = "stylesheet" type = "text/css" href = "CSS/viewproduct.css">
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

		<div id = 'container'>
			<?php
			echo "<div id = 'conleft'>";
			if($_GET['cur'] == 0 || (!isset($_GET['all']) && !isset($_GET['gtype']))){echo "<div id = 'previouspic'></div>";}
			else{
			echo "<a href='viewproduct.php?";
				if(isset($_GET['all'])){echo "all=1&&cur=".($_GET['cur']-1);}
				else{
					if(isset($_GET['stype'])){echo "gtype=".$_GET['gtype']."&&stype=".$_GET['stype']."&&cur=".($_GET['cur']-1);}
					else{echo "gtype=".$_GET['gtype']."&&cur=".($_GET['cur']-1);}
				}
				echo "'><div id = 'previouspic'></div></a>";
			}
			echo "<div id = 'currentpic'></div>";
			if($_GET['cur'] == $result_num-1 || (!isset($_GET['all']) && !isset($_GET['gtype']))){ echo "<div id = 'nextpic'></div>";}
			else{
			echo "<a href='viewproduct.php?";
				if(isset($_GET['all'])){echo "all=1&&cur=".($_GET['cur']+1);}
				else{
					if(isset($_GET['stype'])){echo "gtype=".$_GET['gtype']."&&stype=".$_GET['stype']."&&cur=".($_GET['cur']+1);}
					else{echo "gtype=".$_GET['gtype']."&&cur=".($_GET['cur']+1);}
				}
				echo "'><div id = 'nextpic'></div></a>";
			}
			echo "</div>";
			?>
			<div id = 'conright'>

				<div class = 'picture'>
					DESCRIPTION <br />
					<?php
						echo $row[1];
					?>
					<br />
					<?php
					if(isset($_SESSION['type']))
						
					{ if(strcmp($_SESSION['type'], "administrator") == 0){
					?>
					<a class = 'links' href = 'editproduct.php?id=<?php echo $row[0];?>'>Edit Product</a> | 
					<a class = 'links' href = 'process.php?delpro=1&&id=<?php echo $row[0];?>'>Delete Product</a> <br />
					<?php
					}}
					?>
				</div>
				<div class = 'price'>
					<input type = 'text' name = 'quantity' size = '10'/>
					<input type = 'submit' name = 'add' value = 'ADD TO CART'/>
				</div>

			</div>

		</div>

		<div id = 'footer'>Copyright 2013 UPBeat. All Rights Reserved.</div>

	</body>


</html>

<?php
	mysql_close($con);	
?>