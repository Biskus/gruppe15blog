
$(document).ready(function(){
	$("#ny_innlegg").attr("value", "Lagre");
	$(".showhide").children('.kommentarer').hide();
	
	$("#ny_innlegg").click(function(e){
		$(this).attr("value", "Venligst vent...");
		$(this).attr("disabled", true);
		$("#feedback").html("");
		
		var tittel = $("#ny_tittel").val();
		var tagger = $('.tagger:checked').map(function(i,n) {
	        return $(n).val();
	    }).get(); //get converts it to an array

	    if(tagger.length == 0) { 
	        tagger = "defult"; 
	    }   
		var tekst = $("#ny_tekst").val();
		
		$.post(
				"ajax/lagreInnlegg.php",
				{tittel: tittel, 'tagger[]': tagger, tekst: tekst},
				function (result){
					if (result == "TRUE")
						$("#ny_innlegg").attr("value", "Lagret");
					else{
						$("#ny_innlegg").attr("value", "Lagre");
						$(this).attr("disabled", false);
						$("#feedback").html("Feil under lagring. Prøv igjen");
					}
				});
		e.preventDefault();
		});
	
	$(".showhide").click(function(e){
		if ($(this).children('.kommentarer').is(":hidden")){
			$(this).children('.kommentarer').slideDown("slow");
			$(this).children('p').children('span').html("Sjul ");
			$(this).children('.kommentarer').is(":hidden");
		}
		else{
			$(this).children('.kommentarer').slideUp();
			$(this).children('p').children('span').html("Vis");
		}
	});

});