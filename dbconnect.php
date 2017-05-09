<?php

	error_reporting( ~E_DEPRECATED & ~E_NOTICE );
	
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBNAME', 'db_mypet');
	
	$conn = mysql_connect(DBHOST,DBUSER,DBPASS);
	mysql_set_charset('utf8',$conn);
	$dbcon = mysql_select_db(DBNAME);

	if ( !$conn ) {
		die("Connection failed : " . mysql_error());
	}
	
	if ( !$dbcon ) {
		die("Database Connection failed : " . mysql_error());
	}