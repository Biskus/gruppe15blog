<?php
require_once 'libs/Smarty.class.php';
require_once '/class/page.class.php';
require_once '/class/sqlQuery.class.php';

$page = new Page(new SqlQuery());
$smarty = new Smarty();

if(isset($_POST[post::password]) && isset($_POST[post::username])){
	if ($page->currentUser() == null){
		$page->logInn($_POST[post::username], $_POST[post::password]);
	}
}


if ($page->currentUser() != null){
	$smarty->assign("sideNavn", "Nytt Innlegg");
	$smarty->display("nyttInnlegg.tpl");
}
else{
	$smarty->assign("post", new post());
	$smarty->assign("sideNavn", "Logg inn");
	$smarty->display("logginn.tpl");
}

$page->lastThing();



