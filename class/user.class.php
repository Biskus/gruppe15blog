<?php
require_once 'sqlQuery.class.php';
/*
 * User class
 *
 */
class User{
	const timeOut = 300;
	private $user;
	private $timestamp;
	private $isAdmin;
	private $email;
	
	//You need the correct password to make a instance
	private function __construct($user, $isAdmin, $email){
		$this->user = $user;
		$this->timestamp = time();
	}
	
	//Kodesnutt hentet fra http://www.laughing-buddha.net/php/password
	public static function generatePassword ($length = 8)
	{
	
		// start with a blank password
		$password = "";
	
		// define possible characters - any character in this string can be
		// picked for use in the password, so if you want to put vowels back in
		// or add special characters such as exclamation marks, this is where
		// you should do it
		$possible = "12346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
	
		// we refer to the length of $possible a few times, so let's grab it now
		$maxlength = strlen($possible);
	
		// check for length overflow and truncate if necessary
		if ($length > $maxlength) {
			$length = $maxlength;
		}
	
		// set up a counter for how many characters are in the password so far
		$i = 0;
	
		// add random characters to $password until $length is reached
		while ($i < $length) {
	
			// pick a random character from the possible ones
			$char = substr($possible, mt_rand(0, $maxlength-1), 1);
	
			// have we already used this character in $password?
			if (!strstr($password, $char)) {
				// no, so it's OK to add it onto the end of whatever we've already got...
				$password .= $char;
				// ... and increase the counter by one
				$i++;
			}
		}
	
		// done!
		return $password;
	
	}
	
	public static function logInn($userName, $password){
		$db = new SqlQuery();
		$bruker = mysql_fetch_array($db->brukereByBrukernavn($userName));
		if ($bruker == null || $bruker{'passord'} !== md5($password)){
			return null;
		}
		return new User($userName, $bruker{'isAdmin'}, $bruker{'epost'});
	}
	
	public static function createUser($userName, $password, $email, $isAdmin = 0){
		$db = new SqlQuery();
		if (mysql_fetch_array($db->brukereByBrukernavn($userName)) != null){
			return null;
		}
		$db->lagNyBruker($userName, md5($password), $isAdmin, $email);
		return new User($userName, $isAdmin, $email);
	}
	
	public static function resetPassword($userName, $email){
		$db = new SqlQuery();
		$bruker = mysql_fetch_array($db->brukereByBrukernavn($userName));
		if ($bruker == null || $bruker{'epost'} !== $email){
			return false;
		}
		$password = User::generatePassword();
		$db->skiftPassordByBrukerid($bruker{'id'}, md5($password));
		//mail($email, "Her er ditt nye passord", "Ditt passord er endret til $password");
		echo "$email <br /> Her er ditt nye passord <br /> Ditt passord er endret til '$password'";
		return true;
	}
	
	public function getUser(){
		return $this->user;
	}
	
	public function update(){
		$this->timestamp = time();
	}
	
	public function isValid(){
		if(time() - $this->timestamp > User::timeOut){
			$this->user = null;
			return false;
		}
		return true;
	}
}