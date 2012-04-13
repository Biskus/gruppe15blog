<?php
require 'libs/Smarty.class.php';
$smarty = new Smarty();

$smarty->assign("sideNavn", "Om Meg");
$smarty->display("omMeg.tpl");