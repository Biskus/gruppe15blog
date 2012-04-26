<?php
require_once '../class/page.class.php';
require_once '../class/innlegg.class.php';
require_once '../class/sqlQuery.class.php';

$page = new Page(new SqlQuery());

if ($page->currentUser() != null){
	try{
		$innlegg = new Innlegg($page->getUserId(), $_POST['tittel'], $_POST["tekst"], explode(',',($_POST["tagger"])));
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