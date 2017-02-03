//gestion du formulaire d'ajout d'événement
$('.add-event').click(function(){
	if(!$('.form-add-event').is(":visible")){
		$('.form-add-event').fadeIn('100')
	} else {
		$('.form-add-event').fadeOut('100')
	}
})
$(document).mouseup(function(e){
	if (!$('.form-add-event').is(e.target) && $('.form-add-event').has(e.target).length === 0 && !$('.add-event').is(e.target) && !$('#ui-datepicker-div').is(e.target) && $('#ui-datepicker-div').has(e.target).length === 0){
		$('.form-add-event').fadeOut('100')
	}
})
$('#form-add-event-submit').click(function(){
	$.ajax({
		'url':'traitements/add_evenement.php',
		'method':'POST',
		data:{
			title:$('#add-event-title').html(),
            content:$('#add-event-content').html(),
            datedeb:formatDateC($('#date-debut-datepicker').val()),
            datefin:formatDateC($('#date-fin-datepicker').val()),
		},
		success:function(){
            LoadEvenement();
        }
	});
	$('.form-add-event').fadeOut('100',function(){
		$('#add-event-title').html('');
		$('#add-event-content').html('');
		$('#date-debut-datepicker').val('');
		$('#date-fin-datepicker').val('');
	});
})
