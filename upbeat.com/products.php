<?php

	$username = "root";
	$password = "";
	$hostname = "localhost"; 
	
	$con = mysql_connect($hostname, $username, $password);
		
	if (!$con) die('Could not connect: ' . mysql_error());
	$db = mysql_select_db("upbeat", $con);
	if (!$db)	die('Could not connect: ' . mysql_error());

	$menprodarray = mysql_query("SELECT COUNT(id) from product where gender_type = 'MALE'");
	$womenprodarray = mysql_query("SELECT COUNT(id) from product where gender_type = 'FEMALE'");
	$productsarray = mysql_query("SELECT COUNT(id) from product");
	$customerarray = mysql_query("SELECT COUNT(id) from customer");
	$ordersarray = mysql_query("SELECT COUNT(id) from orderr where is_delivered = 'NO'");

	$totalmenproducts = mysql_fetch_array($menprodarray);
	$totalwomenproducts = mysql_fetch_array($womenprodarray);
	$totalproducts = mysql_fetch_array($productsarray);
	$totalcustomer = mysql_fetch_array($customerarray);
	$totalorders = mysql_fetch_array($ordersarray);

	$menproducts = $totalmenproducts[0];
	$womenproducts = $totalwomenproducts[0];
	$products = $totalproducts[0];
	$customer = $totalcustomer[0];
	$orders = $totalorders[0];

	$uname_array = "";
	$pword_array = "";

	$unamearr = mysql_query("SELECT username FROM customer");
	$adminarr = mysql_query("SELECT username FROM administrator");
	$pwordarr = mysql_query("SELECT password FROM customer");
	$adpwords = mysql_query("SELECT password FROM administrator");

	while($uname = mysql_fetch_array($unamearr, MYSQL_NUM)) $uname_array = $uname_array.$uname[0]."/";
	while($uname = mysql_fetch_array($adminarr, MYSQL_NUM)) $uname_array = $uname_array.$uname[0]."/";
	while($pword = mysql_fetch_array($pwordarr, MYSQL_NUM)) $pword_array = $pword_array.$pword[0]."/";
	while($pword = mysql_fetch_array($adpwords, MYSQL_NUM)) $pword_array = $pword_array.$pword[0]."/";

	if ($products%4 == 0) $pages = ($products/4)%(($products/4)+1);
	else $pages = ($products/4)%(($products/4)+1)+1;

	if ($menproducts%4 == 0) $menpages = ($menproducts/4)%(($menproducts/4)+1);
	else $menpages = ($menproducts/4)%(($menproducts/4)+1)+1;

	if ($womenproducts%4 == 0) $womenpages = ($womenproducts/4)%(($womenproducts/4)+1);
	else $womenpages = ($womenproducts/4)%(($womenproducts/4)+1)+1;

	if ($customer%10 == 0) $customerpages = ($customer/10)%(($customer/10)+1);
	else $customerpages = ($customer/10)%(($customer/10)+1)+1;
	
	if ($orders%10 == 0) $orderpages = ($orders/10)%(($orders/10)+1);
	else $orderpages = ($orders/10)%(($orders/10)+1)+1;

	if (($products+1)%10 == 0) $inventpages = (($products+1)/10)%((($products+1)/10)+1);
	else $inventpages = (($products+1)/10)%((($products+1)/10)+1)+1;
?>