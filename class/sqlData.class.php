<?php
/*
 * Takes care of the connection aspects of the datastream
 * Querys must be handeled by child classes
 * 
 * Todo:
 * -loop db-connection to prevent most missconnections
 * -prevent script from getting killed: Useful errorchecing...
 * -lots more that I can't remember.
 */
class SqlData// implements IdataLager
{
	//php@hinv12
	//gruppe15
	//kark.hin.no:3306
	//åpne connection til mysql server
	
	protected $dbadr;
	protected $dbname;
	protected $username;
	protected $password;
	protected $connected;
	protected $dbc;
	
	function __construct($dbadr = 'kark.hin.no', $dbname = 'gruppe15',
						 $username = 'gruppe15', $password = 'php@hinv12'){
		
		$this->dbadr = $dbadr;
		$this->dbname = $dbname;
		$this->username = $username;
		$this->password = $password;
		$this->connected = false;
	}
	
	protected function connect(){
		$this->dbc = mysql_connect($this->dbadr,$this->username,$this->password);
		if (!$this->dbc){
			$this->error('Could not connect');
		}
		mysql_select_db($this->dbname,$this->dbc)
		or $this->error("Could not select gruppe15");
		
		$this->connected = true;
	}

	protected function query($query){
		$this->connect();
		$result = mysql_query($query) or $this->error("Query failed");
		mysql_close();
		
		return $result;
	}
	
	protected function error($error){
		die($error . mysql_error());
	}
	
}


