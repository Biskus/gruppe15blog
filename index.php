<?php 
require_once 'libs/Smarty.class.php';
require_once 'class/sqlQuery.class.php';
require_once 'class/innlegg.class.php';
require_once 'class/page.class.php';

 
 $smarty = new Smarty();
 $dataHenter = new SqlQuery();
 $page = new Page($dataHenter);
 
 $smarty->assign("sideNavn", "Hjem");
 $smarty->assign("innlegg", $dataHenter->postByDate());
 
 $smarty->display("index.tpl");
 
 $page->lastThing();