<?php
require_once 'sqlQuery.class.php';

class Innlegg{
	private $tittel;
	private $tekst;
	private $tagger;
	private $dato;
	private $autor;
	private $bruker;
	private $visninger;
	private $kommentarer;
	
	function __construct($tittel, $tekst, $tagger, $bruker, $visninger = 0, $kommentarer = null, $dato = null){
		$this->tittel = strip_tags($tittel);
		$this->tekst = strip_tags($tekst);
		$this->bruker = strip_tags($bruker);
		$this->visninger = strip_tags($visninger);
		
		if (!empty($kommentarer))
			$this->kommentarer = $kommentarer;
		else
			$this->kommentarer = null;
		
		$this->tagger = array();
		foreach ($tagger as $tagg)
			$this->tagger[] = strip_tags($tagg);		
		
		if ($dato == null){
			$this->dato = date("Y-m-d H:i:s");
		echo $this->dato;
		}
		else 
			$this->dato = $dato;
	}
	
	public function hentTittel()     {return $this->tittel;} 
    public function hentTekst()      {return $this->tekst;} 
    public function hentTagger()     {return $this->tagger;} 
    public function hentDato()       {return $this->dato;} 
    public function hentBrukerId()   {return $this->bruker;}
    public function hentVisninger()  {return $this->visninger;} 
    public function hentKommentarer(){return $this->kommentarer;}  
    
    public function hentBrukerNavn() {
    	$db = new SqlQuery();
    	$res = $db->brukerByBrukerid($this->bruker);
    	$res = mysql_fetch_array($res);
    	return $res{'brukernavn'};
    	
    }
    
    public function hentAnntallKommentarer(){
    	$i = 0;
    	if ($this->kommentarer != null)
    	foreach($this->kommentarer as $kom)    		
    	{
    		$i++;
    	}
    	
    	return $i;
    }           
}