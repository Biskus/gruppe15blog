{include file='header.tpl'}
<form>
	Tittel: <br />
	<input type="tekst" id="ny_tittel" /><br /><br />
	Tagger: <br />
	<div id="tagger">
	{foreach $tagger as $tagg}
		<span>
		<input type="checkbox" id="tagger{counter}" class="tagger" value="{$tagg}" />{$tagg}
		</span>
	{/foreach}
	</div>
	<input type="tekst" id="ny_tagg" /> <span id="leggTilTagg">Legg til tagg</span>
	<p>Hovedtekst:</p>
	<textarea id="ny_tekst">
	</textarea><br />
	<input type="submit" id="ny_innlegg" " /> <span id="feedback"></span>
</form>

{include file='footer.tpl'}