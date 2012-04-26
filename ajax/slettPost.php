<?php
require_once ('../class/sqlQuery.class.php');
require_once '../class/page.class.php';

$dst = new SqlQuery();
$page = new Page($dst);

if ($page->isAdmin()){
	$postId = strip_tags($_GET['postId']);
	$result = $dst->slettPostByPostid($postId);
}
//test
?>
