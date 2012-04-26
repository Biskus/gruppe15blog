<?php
require_once ('../class/sqlQuery.class.php');

$postId = $_GET['postId'];
$dst = new SqlQuery();
$result = $dst->slettPostByPostid($postId);
//test
?>
