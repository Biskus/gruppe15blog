<?php
session_start();
$result = "FALSE";
if(isset($_POST["brukernavn"]) && $_POST["brukernavn"] == "jackson5"){
	if(isset($_POST["passord"]) && $_POST["passord"] == "abc123"){
		$_SESSION['loggedInn'] = "55e3270abc";
		$_SESSION["time"] = time();
		$result = "TRUE";
	}
}
echo $result;