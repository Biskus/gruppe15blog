<?php
class sqlData implements IdataLager{
	private $xmlFil;
	private $xmlData;
	//php@hinv12
	//gruppe15
	//kark.hin.no:3306
	//åpne connection til mysql server
	
	$dbc = mysql_connect('kark.hin.no','gruppe15','php@hinv12');
	if (!$dbc)
	{
		die('Not connected' : . mysql_error());
	}

	function __construct($xmlFil = "innlegg.xml"){
		$this->xmlFil = $xmlFil;
		$this->xmlData = simplexml_load_file($this->xmlFil);
	}
}