<?php
if (!isset($_POST['id']) || !is_numeric($_POST['id'])){
	echo "error";
	die();
}

$id = strip_tags($_POST['id']); //Dobbelsikring mot sql injection 


