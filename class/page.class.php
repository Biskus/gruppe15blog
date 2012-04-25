<?php
require_once 'conf.php';
require_once 'user.class.php';

class Page{
	private $user;
	private $dataStorage;
	
	function __construct($dataStorage){
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
	
	public function logout(){
		$this->user = null;
		unset($_SESSION[session::user]);
	}
	
	function __destruct(){
		if ($this->user != null)
			$_SESSION[session::user] = serialize($this->user);
	}
}