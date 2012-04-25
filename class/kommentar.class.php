<?php
class Kommentar{
	private $dato;
	private $bruker;
	private $tekst;

	public function __construct($tekst,$bruker,$dato){
		$this->bruker = $bruker;
		$this->dato = $dato;
		$this->tekst = $tekst;
	}
	
	public function getDato(){ return $this->dato; }
	public function getBruker() { return $this->bruker; }
	public function getTekst() { return $this->tekst; }
}