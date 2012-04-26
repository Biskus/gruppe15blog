<?php
require_once ('../class/sqlQuery.class.php');

$kommentarId = $_GET['postId'];
$dst = new SqlQuery();
$result = $dst->slettKommentarByKommentarid($kommentarId);
?>
