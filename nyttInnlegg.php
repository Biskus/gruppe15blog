<?php
require 'libs/Smarty.class.php';
session_start();
$smarty = new Smarty();
$result = "FALSE";
if(isset($_POST["brukernavn"]) && $_POST["brukernavn"] == "jackson5"){
	if(isset($_POST["passord"]) && $_POST["passord"] == "abc123"){
		$_SESSION['loggedInn'] = "55e3270abc";
		$_SESSION["time"] = time();
		$result = "TRUE";
	}
}elseif (isset($_POST["brukernavn"])){
	$smarty->assign("respons", "Feil brukernavn/passord");
}


if (isset($_SESSION['loggedInn']) && $_SESSION['loggedInn'] == "55e3270abc"){
	$smarty->assign("sideNavn", "Nytt Innlegg");
	$smarty->display("nyttInnlegg.tpl");
}
else{
	$smarty->assign("sideNavn", "Logg inn");
	$smarty->display("logginn.tpl");
}




