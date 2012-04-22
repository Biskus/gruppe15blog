<?php
class sqlData// implements IdataLager
{
	//php@hinv12
	//gruppe15
	//kark.hin.no:3306
	//åpne connection til mysql server
	
	private $dbadr;
	private $dbname;
	private $username;
	private $password;
	private $connected;
	private $dbc;
	
	function __construct($dbadr = 'kark.hin.no', $dbname = 'gruppe15',
						 $username = 'gruppe15', $password = 'php@hinv12'){
		
		$this->dbadr = $dbadr;
		$this->dbname = $dbname;
		$this->username = $username;
		$this->password = $password;
		$this->connected = false;
	}
	
	public function connect(){
		$this->$dbc = mysql_connect($dbadr,$username,$password);
		if (!$dbc){
			$this->error('Could not connect');
		}
		mysql_select_db($dbname,$dbc)
		or $this->error("Could not select gruppe15");
		
		$this->connected = true;
	}

	public function query($query){
		$this->connect();
		$result = mysql_query($sql) or $this->error("Query failed");
		mysql_close();
	}
	private function error($error){
		die($error . mysql_error());
	}
	
	public function test(){
		$sql = 'SELECT * ';
		$sql .= 'FROM `Brukere` ';
		$sql .= 'ORDER BY `id` DESC LIMIT 0, 5';
		
		$result = $this->query($sql);
		
		while ($row = mysql_fetch_array($result)) {
			echo "ID:".$row{'id'}." Name:".$row{'brukernavn'}."
				".$row{'passord'}."<br>";
				}
			}
}

$dbc = new sqlData();
$dbc->test();

