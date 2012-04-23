<?php
/*
 * Here we write all the querys we need.
 */
require_once 'sqldata.class.php';

class SqlQuery extends SqlData{
	public function postsByDate($low = 0, $high = 10){
		$sql = 'SELECT * ';
		$sql .= 'FROM `Poster` ';
		$sql .= 'ORDER BY `dato` DESC LIMIT ' . $low . ' , ' . $high;
	
		return $this->query($sql);
	}
}


//Testdata:
// |
// |
// v

$dsc = new SqlQuery();
$res =$dsc->postByDate();

while ($row = mysql_fetch_array($res)) {
	echo "ID:".$row{'id'}." Tittel:".$row{'tittel'}."
		".$row{'tekst'}."<br>";
}