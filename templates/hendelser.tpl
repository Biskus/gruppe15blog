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
	</div>
	{/foreach}
</div>