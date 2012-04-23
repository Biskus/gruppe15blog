<?php
/*
 * Here we write all the querys we need.
 */
require_once 'sqldata.class.php';

class SqlQuery extends SqlData{
	public function postByDate($low = 0, $high = 10){
		$sql = 'SELECT * ';
		$sql .= 'FROM `Poster` ';
		$sql .= 'ORDER BY `dato` DESC LIMIT ' . $low . ' , ' . $high;
	
		return $this->query($sql);
	}
	
	public function brukereByBrukernavn($brukernavn = 'arvid'){
		$sql = 'SELECT * ';
		$sql .= 'FROM `Brukere` ';
		$sql .= "WHERE brukernavn = '$brukernavn' ";
	
		return $this->query($sql);
	}
	
	public function kommentarerByPostid($postId = 1, $low = 0, $high = 10 ){
		$sql = 'SELECT * ';
		$sql .= 'FROM `Kommentarer` ';
		$sql .= 'WHERE PostId = ' . $postId . ' ';
		$sql .= 'ORDER BY `dato` DESC LIMIT ' . $low . ' , ' . $high;
	
		return $this->query($sql);
	}
	public function taggerByPostid($postId = 1, $low = 0, $high = 10 ){
		$sql = 'SELECT * ';
		$sql .= 'FROM `Tagger`, `Poster_tagger` ';
		$sql .= 'WHERE Tagger.id = Poster_tagger.tagId AND ';
		$sql .= 'Poster_tagger.postId = ' . $postId . ' ';
		$sql .= 'ORDER BY `taggnavn` DESC LIMIT ' . $low . ' , ' . $high;
	
		return $this->query($sql);
	}
	
	public function lagNyBruker($brukernavn = 'kj2', $passord = 'pw2', $isAdmin = '1', $epost = 'epost@post.com' ){
		$sql = 'INSERT INTO `Brukere` (`brukernavn`, `passord`, `isAdmin`, `epost`) VALUES ';
		$sql .= "('$brukernavn','$passord','$isAdmin','$epost')";		
	
		return $this->query($sql);
	}
	
	public function alleBrukere(){
		$sql = 'SELECT * ';
		$sql .= 'FROM `Brukere` ';		
	
		return $this->query($sql);
	}
}


//Testdata:
// |
// |
// v
/*
$dsc = new SqlQuery();
$res =$dsc->postByDate();

while ($row = mysql_fetch_array($res)) {
	echo "ID:".$row{'id'}." Tittel:".$row{'tittel'}."
		".$row{'tekst'}."<br>";
}*/

/*
$dsc = new SqlQuery();
$res =$dsc->taggerByPostid();

while ($row = mysql_fetch_array($res)) {
	echo "Taggnavn: ".$row{'taggnavn'}."<br>";
}
*/
/*
$dsc = new SqlQuery();
$res =$dsc->postByDate();

while ($row = mysql_fetch_array($res)) {
	echo "ID:".$row{'id'}." Tittel:".$row{'tittel'}."
	".$row{'tekst'}."<br>";
*/
$dsc = new SqlQuery();
$res =$dsc->alleBrukere();

while ($row = mysql_fetch_array($res)) {
	echo "ID:".$row{'id'}." Brukernavn:".$row{'brukernavn'}."
	Passord: ".$row{'passord'}."<br>";
}


//brukerer by brukerid
/*
$dsc = new SqlQuery();
$res =$dsc->brukereByBrukernavn();

while ($row = mysql_fetch_array($res)) {
	echo "ID:".$row{'id'}." Brukernavn:".$row{'brukernavn'}."
	"."Epost:" . $row{'epost'}."<br>";
}
*/
	
	
	
	
	
	