<?php
/*
 * Here we write all the querys we need.
 */
require_once 'sqldata.class.php';
require_once 'innlegg.class.php';

class SqlQuery extends SqlData{
	public function postByDate($low = 0, $high = 10){
		$sql = 'SELECT * ';
		$sql .= 'FROM `Poster` ';
		$sql .= 'ORDER BY `dato` DESC LIMIT ' . $low . ' , ' . $high;
		$res = $this->query($sql);
		
			$alleInnlegg = array();
			$i = 0;
		
		
			while ($row = mysql_fetch_array($res)) {
				$tagger_sqlres = $this->taggerByPostid($row{'id'});
				$tagger = array();
				while ($row2 = mysql_fetch_array($tagger_sqlres)){
					$tagger[] = $row2{'taggId'};
				}
				$alleInnlegg[$i] = new Innlegg($row{'tittel'},$row{'tekst'}, $tagger, $row{'brukerId'}, $row{'visninger'},$row{'dato'});
				$i++;
			}
		
		return $alleInnlegg;
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
		$sql .= 'WHERE Tagger.id = Poster_tagger.taggId AND ';
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
	
	public function brukerByBrukerid($brukerid = '0'){
		$sql = 'SELECT *';
		$sql .= 'FROM `Brukere` ';
		$sql .= "WHERE id = '$brukerid' ";
	
		return $this->query($sql);
	}
	
	public function skiftPassordByBrukerid($brukerid = '0', $passord = 'kakemons'){
		$sql = "UPDATE  `Brukere` SET `passord`= '".$passord . "' ";
		$sql .= "WHERE id = '$brukerid' ";
	
		return $this->query($sql);
	}
	public function incrementCounterByPostid($postid = '1'){
		$sql = "UPDATE  `Poster` SET `visninger`= visninger+1 ";
		$sql .= "WHERE id = '$postid' ";
	
		return $this->query($sql);
	}
	public function taggnavnByTaggid($taggid = '1'){
		$sql = 'SELECT *';
		$sql .= 'FROM `Tagger` ';
		$sql .= "WHERE id = '$taggid' ";
	
		return $this->query($sql);
	}
	
	public function lagNyPost($tittel = 'Tredjepost', $tekst = 'TEXTMAN', $dato = '2012-04-24 23:10:04', $visninger = '0', $brukerId = '0' ){
		$sql = 'INSERT INTO `Poster` (`tittel`, `tekst`, `dato`, `visninger`, `brukerid`) VALUES ';
		$sql .= "('$tittel','$tekst','$dato','$visninger', '$brukerId')";
	
		return $this->query($sql);
	}
	public function lagNyKommentar($tekst = 'kommentartext',$brukerId = '0', $dato = '2012-04-24 11:11:59', $postid = '1'  ){
		$sql = 'INSERT INTO `Kommentarer` (`tekst`, `brukerid`, `dato`, `postid`) VALUES ';
		$sql .= "('$tekst','$brukerId','$dato','$postid')";
	
		return $this->query($sql);
	}
	
	
}


//Testdata:
// |
// |
// v

$dsc = new SqlQuery();
$res =$dsc->lagNyKommentar();
/*
while ($row = mysql_fetch_array($res)) {
	echo "ID:".$row{'id'}." Taggnavn: ".$row{'taggnavn'}."
		"."<br>";
}
*/

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
/*
$dsc = new SqlQuery();
$res =$dsc->brukereByBrukernavn("stale");

while ($row = mysql_fetch_array($res)) {
	echo "ID:".$row{'id'}."<br /> Brukernavn:".$row{'brukernavn'}."
	<br />Passord: ".$row{'passord'}."<br />";
}
*/


//brukerer by brukerid
/*
$dsc = new SqlQuery();
$res =$dsc->brukereByBrukernavn();

while ($row = mysql_fetch_array($res)) {
	echo "ID:".$row{'id'}." Brukernavn:".$row{'brukernavn'}."
	"."Epost:" . $row{'epost'}."<br>";
}
*/
	
	
	
	
	
	