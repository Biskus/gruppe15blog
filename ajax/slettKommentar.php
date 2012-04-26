<?php
require_once ('../class/sqlQuery.class.php');
require_once '../class/page.class.php';

$dst = new SqlQuery();
$page = new Page($dst);

if($page->isAdmin()){
	$kommentarId = strip_tags($_GET['postId']);
	$result = $dst->slettKommentarByKommentarid($kommentarId);
}
//test
?>
