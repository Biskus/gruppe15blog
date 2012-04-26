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
					$tagg_res = mysql_fetch_array($this->taggnavnByTaggid($row2{'taggId'}));
					$tagger[] = $tagg_res{'taggnavn'};
				}
				
				$kommentarer_sqlres = $this->kommentarerByPostid($row{'id'});
				$kommentarer = array();
				while ($kommentarer_res = mysql_fetch_array($kommentarer_sqlres))
					$kommentarer[] = $kommentarer_res;
				
				$alleInnlegg[$i] = new Innlegg($row{'tittel'},$row{'tekst'}, $tagger, $row{'brukerId'}, $row{'visninger'}, $kommentarer ,$row{'dato'});
				$i++;
			}
		
		return $alleInnlegg;
	}
	
	public function brukereByBrukernavn($brukernavn){
		$sql = 'SELECT * ';
		$sql .= 'FROM `Brukere` ';
		$sql .= "WHERE brukernavn = '$brukernavn' ";
	
		return $this->query($sql);
	}
	
	public function kommentarerByPostid($postId = 1, $low = 0, $high = 10 ){
		$sql = 'SELECT k.*, b.brukernavn ';
		$sql .= 'FROM Kommentarer k, Brukere b ';
		$sql .= 'WHERE k.postId = ' . $postId . ' AND k.brukerId = b.id ';
		$sql .= 'ORDER BY k.dato DESC LIMIT ' . $low . ' , ' . $high;
	
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
	
	public function lagNyBruker($brukernavn, $passord, $isAdmin, $epost){
		$sql = 'INSERT INTO `Brukere` (`brukernavn`, `passord`, `isAdmin`, `epost`) VALUES ';
		$sql .= "('$brukernavn','$passord','$isAdmin','$epost')";		
	
		return $this->query($sql);
	}
	
	public function alleBrukere(){
		$sql = 'SELECT * ';
		$sql .= 'FROM `Brukere` ';		
	
		return $this->query($sql);
	}
	
	public function brukerByBrukerid($brukerid){
		$sql = 'SELECT *';
		$sql .= 'FROM `Brukere` ';
		$sql .= "WHERE id = '$brukerid' ";
	
		return $this->query($sql);
	}
	
	public function skiftPassordByBrukerid($brukerid, $passord){
		$sql = "UPDATE  `Brukere` SET `passord`= '".$passord . "' ";
		$sql .= "WHERE id = '$brukerid' ";
	
		return $this->query($sql);
	}
	public function incrementCounterByPostid($postid){
		$sql = "UPDATE  `Poster` SET `visninger`= visninger+1 ";
		$sql .= "WHERE id = '$postid' ";
	
		return $this->query($sql);
	}
	
	public function taggnavnByTaggid($taggid){
		$sql = 'SELECT *';
		$sql .= 'FROM `Tagger` ';
		$sql .= "WHERE id = '$taggid' ";
	
		return $this->query($sql);
	}
	public function taggIdByTaggnavn($taggnavn){
		$sql = 'SELECT *';
		$sql .= 'FROM `Tagger` ';
		$sql .= "WHERE taggnavn like '$taggnavn' ";
	
		return $this->query($sql);
	}
	
	
	public function lagNyPost($brukerId, $tittel, $tekst, $dato, $taggs, $visninger = '0'){
		$sql = 'INSERT INTO `Poster` (`tittel`, `tekst`, `dato`, `visninger`, `brukerid`) VALUES ';
		$sql .= "('$tittel','$tekst','$dato','$visninger', '$brukerId')";
		
		if (!empty($taggs)){
			
			$this->connect();
			mysql_query($sql);
			$postId = mysql_insert_id();
			mysql_close();

			//Sjekk om tagger eksisterer				
			$res = $this->alleTagger();
			$tagsFromDb = array();	
			$alreadyAddedTags = array();	
			$addedTagsWithIds = array();	
			
			$i = 0;
			while ($row = mysql_fetch_array($res)) {
				$tagsFromDb[$i] = $row{'taggnavn'};
				$i++;
			}			
			
			foreach($taggs as $tagg)
			{
				if(!in_array($tagg, $tagsFromDb))
				{									
					if(!in_array($tagg, $alreadyAddedTags))					
					{
						$this->connect();
						mysql_query($this->lagNyTaggText($tagg));	
						$taggId = mysql_insert_id();
						mysql_close();
						array_push($alreadyAddedTags, $tagg);	
						$addedTagsWithIds[$tagg] = $taggId;
					}
				}
			}			
			//print_r($addedTagsWithIds);
			
			foreach ($taggs as $tagg) {
								
				if(in_array($tagg, $addedTagsWithIds))
				{
					$taggid = $addedTagsWithIds[$tagg];	
					echo "true taggid: " . $taggid;				
				}				
				else 
				{					
					$taggidByTaggnavn = $this->taggIdByTaggnavn($tagg);		
					while ($row = mysql_fetch_array($taggidByTaggnavn)) {
						$taggid = $row{'id'};
					}
				}
				$this->leggTaggTilPostid($postId, $taggid );
			}
		}
		else
			return $this->query($sql);
	}
	
	public function lagNyKommentar($tekst ,$brukerId, $dato, $postid){
		$sql = 'INSERT INTO `Kommentarer` (`tekst`, `brukerid`, `dato`, `postid`) VALUES ';
		$sql .= "('$tekst','$brukerId','$dato','$postid')";
	
		return $this->query($sql);
	}
	
	public function lagNyTagg($taggnavn){
		$sql = 'INSERT INTO `Tagger` (`taggnavn`) VALUES ';
		$sql .= "('$taggnavn')";
	
		return $this->query($sql);
	}
	public function lagNyTaggText($taggnavn){
		$sql = 'INSERT INTO `Tagger` (`taggnavn`) VALUES ';
		$sql .= "('$taggnavn')";
	
		return $sql;
	}
	
	public function leggTaggTilPostid( $postid, $taggid){
		$sql = 'INSERT INTO `Poster_tagger` (`postId`, `taggId`) VALUES ';
		$sql .= "('$postid', '$taggid')";
	
		return $this->query($sql);
	}
	
	public function slettKommentarByKommentarid($kommentarId){
		$sql = 'DELETE ';
		$sql .= 'FROM `Kommentarer` ';
		$sql .= "WHERE Kommentarer.id = '$kommentarId'";	
	
		return $this->query($sql);
	}
	public function slettPostByPostid($postId){
		$sql = 'DELETE ';
		$sql .= 'FROM `Poster` ';
		$sql .= "WHERE Poster.id = '$postId'";
	
		return $this->query($sql);
	}
	
	public function kommentarCountByPostid($postId){
		$sql = 'SELECT count(*) count FROM Kommentarer k , Poster p ';
		$sql .= "WHERE  p.id = k.postid and p.id = '$postId'";
		
		return $this->query($sql);
	}
	public function alleTagger($low = 0, $high = 100 ){
		$sql = 'SELECT * ';
		$sql .= 'FROM `Tagger` ';
		$sql .= 'ORDER BY `taggnavn` DESC LIMIT ' . $low . ' , ' . $high;
	
		return $this->query($sql);
	}	
}
	
	
	
	
	
