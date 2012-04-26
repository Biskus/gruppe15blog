<div id="innleggListe">
	{foreach $innlegg as $inn}
	<div class="innlegg">	
		<ul>
		{foreach $inn->hentTagger() as $tagg}
			<li>{$tagg}</li>
		{/foreach}
		</ul>
		<h4>{$inn->hentTittel()}</h4>
		<p>{$inn->hentTekst()}<br /><span>{$inn->hentDato()}</span></p>
		<h6>{$inn->hentBrukerNavn()}<h6>
		
		<div class="showhide">
			<p><span>Vis</span> {$inn->hentAnntallKommentarer()} kommentarer.</p>
			<div class="kommentarer">
				{foreach $inn->hentKommentarer() as $kommentar}
				<div id="{counter}">
					<div class="kommentar_brukernavn">
						{$kommentar.brukernavn}
					</div>
					<div class="kommentar_tekst">
						{$kommentar.tekst}
					</div>
					<div class="kommentar_dato">
						{$kommentar.dato}
					</div>
					<div class="kommentar_id">
						{$kommentar.id}
					</div>
				</div>			
				{/foreach}
			</div>
		</div>
	</div>
	{/foreach}
</div>