{include file='header.tpl'}
<div class="redTekst">
<p>{$respons|default:'Du må logge inn for å lage nye innlegg'}</p>
</div>

<div id="logginn">
	<form method="post">
		<table>
			<tr>
				<td>Brukernavn:</td>
				<td><input type="text" name="brukernavn" id="brukernavn" /></td>
				
			</tr>
			<tr>
				<td>Passord:</td>
				<td><input type="password" name="passord" id="passord" /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" id="loggInnKnapp" /></td>
		</table>
	</form>
</div>
{include file='footer.tpl'}