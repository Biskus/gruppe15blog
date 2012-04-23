<?php
require_once 'sqlQuery.class.php';
/*
 * User class
 *
 */
class User{
	private final $timeOut = 300;
	private $user;
	private $timestamp;
	
	//You need the correct password to make a instance
	private function __construct($user){
		$this->user = $user;
		$this->timestamp = time();
	}
	
	public static function logInn($userName, $password){
		//check if username exists
		//if not return null
		//get password
		//md5($password) === dbPassword
		//if everything ok
		return new User($userName);
	}
	
	public static function createUser($userName, $password){
		//check if usernames exists
		//saves username and hashed password
		return new User($userName);
	}
	
	public function logout (){
		$this->user = null;
	}
	
	public function getUser(){
		return $this->user;
	}
	
	public function update(){
		$this->timestamp = time();
	}
	
	public function isValid(){
		if(time() - $this->timestamp > $timeout){
			$this->user = null;
			return false;
		}
		return true;
	}
}
