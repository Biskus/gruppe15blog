<?php
class sqlData implements IdataLager{
	private $xmlFil;
	private $xmlData;

	function __construct($xmlFil = "innlegg.xml"){
		$this->xmlFil = $xmlFil;
		$this->xmlData = simplexml_load_file($this->xmlFil);
	}
}