<?php
require 'class/innlegg.class.php';
session_start();
$result = array();
if (isset($_SESSION['loggedInn']) && $_SESSION['loggedInn'] == "55e3270abc"){
	try{
		require 'xmlData.class.php';
		
		$innlegg = new Innlegg($_POST['tittel'], $_POST["tekst"], explode(',',($_POST["tagger"])));
		$dataLagrer = new xmlData();
		$dataLagrer->lagreInnlegg($innlegg);
		$result = "TRUE";
	}
	catch(Exceptionion $ex){
		$result = "FALSE";
	}
}
else{
	$result = "ERROR";
}

echo $result;