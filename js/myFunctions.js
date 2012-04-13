
$(document).ready(function(){
	$("#ny_innlegg").attr("value", "Lagre");
	
	$("#ny_innlegg").click(function(e){
		$(this).attr("value", "Venligst vent...");
		$(this).attr("disabled", true);
		$("#feedback").html("");
		
		var tittel = $("#ny_tittel").val();
		var tagger = $("#ny_tagger").val();
		var tekst = $("#ny_tekst").val();
		
		$.post(
				"lagreInnlegg.php",
				{tittel: tittel, tagger: tagger, tekst: tekst},
				function (result){
					if (result == "TRUE")
						$("#ny_innlegg").attr("value", "Lagret");
					else{
						$("#ny_innlegg").attr("value", "Lagre");
						$("#feedback").html("Feil under lagring. Prøv igjen");
					}
				});
		e.preventDefault();
		});

});