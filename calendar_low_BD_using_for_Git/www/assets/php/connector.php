<?php
	$db_host = "127.0.0.1";
	$db_user = "root";
	$db_user_pass = "root";
	$db_name = "minimized_using_db_calendar_db";
	$db_coding = "utf-8";
	
	$server_connect = mysqli_connect($db_host, $db_user, $db_user_pass);
	if(!$server_connect)
	{
		exit("<p>Can't connect to the server</p>");
	}
	
	$db_sql_coding = mysqli_query($server_connect, "SET NAMES '".$db_coding."'");
?>