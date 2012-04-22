<?php
require_once 'sqlQuery.class.php';
/*
 * User class
 *
 */
class User{
	private $user;
	
	//You need the correct password to make a instance
	private function __construct($user){
		$this->user = $user;
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
}