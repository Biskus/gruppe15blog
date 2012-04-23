<?php 
require_once 'libs/Smarty.class.php';
require_once 'class/sqlQuery.class.php';
require_once 'class/innlegg.class.php';

session_start();
$_SESSION = array();
 $smarty = new Smarty();
 $dataHenter = new SqlQuery();
 
 $smarty->assign("sideNavn", "Hjem");
 $smarty->assign("innlegg", $dataHenter->postByDate());
 
 $smarty->display("index.tpl");