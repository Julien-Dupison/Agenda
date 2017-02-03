$('#datepicker').datepicker({
	dayNames: [ "Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi" ],
	dayNamesMin: [ "D", "L", "M", "M", "J", "V", "S" ],
	dayNamesShort: [ "Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam" ],
	monthNames: [ "Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre" ],
	monthNamesShort: [ "JAN", "FEV", "MAR", "AVR", "MAI", "JUIN", "JUIL", "AOUT", "SEPT", "OCT", "NOV", "DEC" ],
	dateFormat: "dd/M/yy",
});

$('#date-debut-datepicker, #date-fin-datepicker').datepicker({
	dayNames: [ "Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi" ],
	dayNamesMin: [ "D", "L", "M", "M", "J", "V", "S" ],
	dayNamesShort: [ "Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam" ],
	monthNames: [ "Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre" ],
	monthNamesShort: [ "JAN", "FEV", "MAR", "AVR", "MAI", "JUIN", "JUIL", "AOUT", "SEPT", "OCT", "NOV", "DEC" ],
	dateFormat: "dd/mm/yy",
	beforeShow : function(input, inst){
		setTimeout(function () {
			inst.dpDiv.css({"margin-left":"239px", "top":"128px"});
		},0);
	}
});

$('.datepicker-trigger').click(function() {
	$('#datepicker').show().focus().hide();
	$('#ui-datepicker-div').css({"margin-left":"80px","top":"5px"});
});

$('#datepicker').on('change',function(){
	var date = $(this).val().split("/");
	$('.day').html(date[0]);
	$('.month').html(date[1]);
	$('.year').html(date[2]);
	LoadEvenement(formatDate(date[0],date[1],date[2]));
    LoadEDT($('.day').html()+"/"+Mtom($('.month').html())+"/"+$('.year').html())
});

//recupère la date du jour pour le datepicker
$(document).ready(function(){
	getCurrentDate()
    LoadEDT($('.day').html()+"/"+Mtom($('.month').html())+"/"+$('.year').html())
})
