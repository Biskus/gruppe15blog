<?php
require_once 'user.class.php';

class Page{
	private $user;
	private $dataStorage;
	
	private final $S_user = 'user';
	
	function __construct($dataStorage){
		$this->dataStorage = $dataStorage;
		$this->user = null;
		
		session_start();
		if (isset($_SESSION[$this->S_user])){
			$this->user = unserialize($_SESSION['user']);
		}
	}
	
	private function checkUser(){
		if ($this->user != null && $this->user->getUser() =! null){
			if ($this->user->isValid()){
				$this->user->update();
				return true;
			}
			else{
				unset($_SESSION[$this->S_user]);
				return false;
			}
			
			return 'error';
		}
		
		
	}
}