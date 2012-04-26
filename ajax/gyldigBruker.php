<?php
require_once '../class/page.class.php';
require_once '../class/sqlQuery.class.php';

$page = new Page(new SqlQuery());

if ($page->currentUser() != null){
	if ($page->isAdmin())
		echo "ADMIN";
	else 
		echo "TRUE";
}
else
	echo 'FALSE';