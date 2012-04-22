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
		$this->dbc = mysql_connect($this->dbadr,$this->username,$this->password);
		if (!$this->dbc){
			$this->error('Could not connect');
		}
		mysql_select_db($this->dbname,$this->dbc)
		or $this->error("Could not select gruppe15");
		
		$this->connected = true;
	}

	public function query($query){
		$this->connect();
		$result = mysql_query($query) or $this->error("Query failed");
		mysql_close();
		
		return $result;
	}
	
	private function error($error){
		die($error . mysql_error());
	}
	
	public function postByDate($low = 0, $high = 10){
		$sql = 'SELECT * ';
		$sql .= 'FROM `Poster` ';
		$sql .= 'ORDER BY `dato` DESC LIMIT ' . $low . ' , ' . $high;
		
		return $this->query($sql);
		}
}

$dsc = new sqlData();
$res =$dsc->postByDate();

while ($row = mysql_fetch_array($res)) {
	echo "ID:".$row{'id'}." Tittel:".$row{'tittel'}."
		".$row{'tekst'}."<br>";
}
