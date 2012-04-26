<?php
require_once 'conf.php';
require_once 'user.class.php';

class Page{
	private $user;
	private $dataStorage;
	
	function __construct(SqlQuery $dataStorage){
		$this->dataStorage = $dataStorage;
		$this->user = null;
		
		session_start();
		if (isset($_SESSION[session::user])){
			$this->user = unserialize($_SESSION[session::user]);
		}
	}
	
	private function validUser(){
		$valid = false;
		if ($this->user != null){
			if (!($valid = $this->user->isValid() ))
				$this->logout();				
		}
		return $valid;
		
	}
	
	public function currentUser(){
		$user = null;
		if ($this->user != $user)
			$user = $this->user->getUser();
		return $user;
	}
	
	public function getUserId(){
		if ($this->validUser()){
			return $this->user->getUserId();
		}
		return null;
	}
	
	public function logout(){
		$this->user = null;
		unset($_SESSION[session::user]);
	}
	
	function lastThing(){
		if ($this->user != null)
			$_SESSION[session::user] = serialize($this->user);
	}
	
	public function lagreInnlegg(Innlegg $innlegg){
		$this->dataStorage->lagNyPost($innlegg->hentBrukerId(), $innlegg->hentTittel(), $innlegg->hentTekst(),
									  $innlegg->hentDato(), $innlegg->hentTagger());
		
	}
	
	public function logInn($username, $password){
		$this-> user = User::logInn(strip_tags($username), strip_tags($password));
		return ($this->user != null);
	}
	
	public function alleTaggNavn(){
		$res = $this->dataStorage->alleTagger(0,40000);
		$taggNavn = array();
		while ($tagg = mysql_fetch_array($res)){
			$taggNavn[] = $tagg{'taggnavn'};
		}
		
		return $taggNavn;
	}
	
	public function isAdmin(){
		return $this->user->isAdmin();
	}
}