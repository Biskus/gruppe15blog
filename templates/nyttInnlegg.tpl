{include file='header.tpl'}
<form>
	Tittel: <br />
	<input type="tekst" id="ny_tittel" /><br />
	Tagger: <br />
	<div id="tagger">
	{foreach $tagger as $tagg}
		<span>
		<input type="checkbox" id="tagger{counter}" class="tagger" value="{$tagg}" />{$tagg}
		</span>
	{/foreach}
	</div>
	<input type="tekst" id="ny_tagg" /> <div id="leggTilTagg">Legg til tagg</div>
	Hovedtekst: <br />
	<textarea id="ny_tekst">
	</textarea><br />
	<input type="submit" id="ny_innlegg" " /> <span id="feedback"></span>
</form>

{include file='footer.tpl'}