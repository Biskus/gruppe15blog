<?php	
	//php@hinv12
	//gruppe15
	//kark.hin.no:3306
	//åpne connection til mysql server
	$dbadr = 'kark.hin.no';
	$dbname = 'gruppe15';
	$username = 'gruppe15';
	$password = 'php@hinv12';
		
	$dbc = mysql_connect($dbadr,$username,$password);
	
	if (!$dbc)
	{
		die('Not connected' . mysql_error());
	}
		
	$selected = mysql_select_db($dbname,$dbc)
	or die("Could not select gruppe15");
	
	// This SQL statement will get the 5 most recently added new items from the database
	$sql = 'SELECT * ';
	$sql .= 'FROM `Brukere` ';
	$sql .= 'ORDER BY `id` DESC LIMIT 0, 5';
		
	
	$result = mysql_query($sql) or die("Query failed : " . mysql_error());
	
	while ($row = mysql_fetch_array($result)) {
		echo "ID:".$row{'id'}." Name:".$row{'brukernavn'}."
		".$row{'passord'}."<br>";
	}	
	
