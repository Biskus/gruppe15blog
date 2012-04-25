<div id="innleggListe">
	{foreach $innlegg as $inn}
	<div class="innlegg">	
		<h4>{$inn->hentTittel()}</h4>
		<p>{$inn->hentTekst()}<br /><span>{$inn->hentDato()}</span></p>
		<ul>
		{foreach $inn->hentTagger() as $tagg}
			<li>{$tagg}</li>
		{/foreach}
		</ul>
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
	{/foreach}
</div>