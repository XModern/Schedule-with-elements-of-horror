<?php
	$db_host = "127.0.0.1";
	$db_user = "root";
	$db_user_pass = "root";
	$db_name = "schedule";
	$db_coding = "cp1251";
	
	try
	{
		$server_connect_pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host.";", $db_user, $db_user_pass);
	}
	catch(PDOException $e)
	{
		exit("Aaaaaa, error '".$e->getMessage()."' chto je nam delat'!!!!");
	}
	/*if(!$server_connect)
	{
		exit("<p>Can't connect to the server</p>");
	}*/
	
	$db_sql_coding = $server_connect_pdo->query("SET NAMES '".$db_coding."'");
?>