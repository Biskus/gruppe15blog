<?php
class Page{
	private $user;
	private $dataStorage;
	
	function __construct($dataStorage){
		$this->dataStorage = $dataStorage;
		$this->user = null;
		
		session_start();
		if (isset($_SESSION["brukernavn"]))
		{}
		
	}
}