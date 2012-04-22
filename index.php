<?php 
require 'libs/Smarty.class.php';
require 'class/xmlData.class.php';
require 'class/innlegg.class.php';

session_start();
$_SESSION = array();
 $smarty = new Smarty();
 $dataHenter = new xmlData();
 
 $smarty->assign("sideNavn", "Hjem");
 $smarty->assign("innlegg", $dataHenter->hentAlleInnlegg());
 
 $smarty->display("index.tpl");