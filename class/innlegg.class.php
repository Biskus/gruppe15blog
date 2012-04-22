<?php
class Innlegg{
	private $tittel;
	private $tekst;
	private $tagger;
	private $dato;
	private $autor;
	
	function __construct($tittel, $tekst, $tagger, $dato = null){
		$this->tekst = strip_tags($tekst);
		$this->tagger = array();
		foreach ($tagger as $tagg)
			$this->tagger[] = strip_tags($tagg);		
		$this->tittel = strip_tags($tittel);
		if ($dato == null)
			$this->dato = date("d-m-Y H:i");
		else 
			$this->dato = $dato;
	}
	
	public function hentTittel() {return $this->tittel;} 
    public function hentTekst() {return $this->tekst;} 
    public function hentTagger() {return $this->tagger;} 
    public function hentDato() {return $this->dato;}  
               
}