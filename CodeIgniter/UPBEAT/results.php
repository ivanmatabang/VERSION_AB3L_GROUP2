<?php
	session_start();

	$username = "root";
	$password = "";
	$hostname = "localhost"; 

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


	if(isset($_POST['sbox']))
	{
		
		$result_array = array();		
		$product_array = array();
		$product = $_POST['sbox'];
		$word_num = 0;
		$result_num = 0;

		$token = strtok($product, " ");

		while ($token != false)
	 	{
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
			for($i=1; $i<7; $i++)
			{	
		   		$temp_array = array();
		   		$token = strtok($row[$i], " ");

				while ($token != false)
			 	{
			 		for($j=0; $j<$word_num; $j++)
			 		{
			 			if(strcmp(strtolower($product_array[$j]), strtolower($token)) == 0)
			 			{
			 				array_push($result_array, $row[0]);
			 				$result_num++;
			 				goto end;
			 			}
			 		}
			 		$token = strtok(" ");
			 	}
		 	}
		 	end:
		}
		mysql_free_result($result);

		for($i=0; $i<$result_num; $i++)
		{
			$result = mysql_query("select * from product where id=".$result_array[$i]);
			$row = mysql_fetch_array($result);
			echo $row['code']."<br />";
		}

		mysql_close($con);			
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
		while ($row = mysql_fetch_array($result, MYSQL_NUM))
		{
			echo $row[1]."<br />";
		}

		mysql_close($con);		
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
		while ($row = mysql_fetch_array($result, MYSQL_NUM))
		{
			echo $row[1]."<br />";
		}

		mysql_close($con);		
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

		while ($row = mysql_fetch_array($result, MYSQL_NUM))
		{
			echo $row[1]."<br />";
		}

		mysql_close($con);		
	}
?>

<html>
	<head>

	</head>

	<body>
		<br />
		<form method = 'post' action = 'results.php' name = 'search'>
			
		</form>
		<form method = 'post' action ='<?php

										if(isset($_POST['sbox']))
										{echo "results.php";}
										else if(isset($_GET['stype']) && isset($_GET['gtype']))
										{echo "results.php?stype=".$_GET['stype']."&gtype=".$_GET['gtype'];}
										else if(isset($_GET['gtype']))
										{echo "results.php?gtype=".$_GET['gtype'];} 
										else if(isset($_GET['all']))
										{}?>' name = 'filter'>
									<input type = 'hidden' id = 'sinput' name = 'sbox' value = "<?php if(isset($_POST['sbox']))
																	{echo $_POST['sbox'];} ?>" onClick = 'return srch(this);'/>
			MIN: <input type = 'text' id = 'minfilter' name = 'filtermin'/>
			MAX: <input type = 'text' id = 'maxfilter' name = 'filtermax'/>
			<input type = 'submit' id = 'fbutton' name = 'submit_filter' value = 'Filter'/>
		</form>

	</body>

</html>