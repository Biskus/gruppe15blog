<?php
require_once 'data.interface.php';
class xmlData implements IdataLager{
	private $xmlFil;
	private $xmlData;
	
	function __construct($xmlFil = "innlegg.xml"){
		$this->xmlFil = $xmlFil;
		$this->xmlData = simplexml_load_file($this->xmlFil);
	}
	
	
	public function hentAlleInnlegg(){
		$alleInnlegg = array();
		$i = 0;
		
		
		foreach($this->xmlData->innlegg as $innlegg){
			$tagger = array();
			foreach ($innlegg->tagger as $tagg)
				$tagger[] = utf8_decode($tagg);
			$alleInnlegg[$i]= new Innlegg(utf8_decode($innlegg->tittel),
										utf8_decode($innlegg->tekst),
										$tagger,
										utf8_decode($innlegg->dato));
			$i++;	
		}
		
		return $alleInnlegg;
	}
	
	public function lagreInnlegg ($innlegg){
		$nyXml = "<artikler>\n";
		$nyXml .= "<innlegg>\n"
					."<tittel>" . utf8_encode($innlegg->hentTittel()) . "</tittel>\n"
					."<tagger>\n";
					 foreach ($innlegg->hentTagger() as $tagg){
									$nyXml .= "<tagg>" . utf8_encode($tagg) . "</tagg>\n";
									}
		$nyXml .=	"</tagger>\n"
					."<tekst>" . utf8_encode($innlegg->hentTekst()) . "</tekst>\n"
					."<dato>" . utf8_encode($innlegg->hentDato()) . "</dato>\n"
				. "</innlegg>\n";
		foreach ($this->xmlData->innlegg as $gamle){
			$nyXml .= "<innlegg>\n"
					."<tittel>" . $gamle->tittel . "</tittel>\n"
					."<tagger>\n";
					 foreach ($gamle->tagger as $tagg){
									$nyXml .= "<tagg>" .$tagg . "</tagg>\n";
									}
			$nyXml .=	"</tagger>\n"
					."<tekst>" . $gamle->tekst . "</tekst>\n"
					."<dato>" . $gamle->dato . "</dato>\n"
				. "</innlegg>\n";
		}
		$nyXml .= "</artikler>";
		
		$tempXml = simplexml_load_string($nyXml);
		file_put_contents($this->xmlFil, $tempXml->asXML());
		
		$xmlData = $tempXml;
	}
	
	public function hentInnleggMedTagg($tagg){}
}