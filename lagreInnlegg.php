<?php
require_once 'class/page.class.php';
require_once 'class/innlegg.class.php';
require_once 'class/sqlQuery.class.php';

$dataLagrer = SqlQuery();
$page = new Page($dataLager);

if ($page->currentUser() != null){
	try{
		
		$innlegg = new Innlegg($_POST['tittel'], $_POST["tekst"], explode(',',($_POST["tagger"])), $page->currentUser());
		$page->lagreInnlegg($innlegg);
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