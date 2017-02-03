//fadeOut + supression d'un evenement du DOM
$(document).on('click','.close',function(){
    $(this).parent().parent().fadeOut(function(){
        $(this).remove();
        $.ajax({
            url:'traitements/delete_evenement.php',
            method:'POST',
            data:{
                id:$(this).attr('data_id'),
            },
            success:function(){
                addToast("L'événement à été supprimé",false);
            },
        })
    });
});


//edition du titre/contenu
var evenementYypingTimer;
var evenementTypingInterval = 500;
$(document).on('keydown','.event-card-content, .event-card-title',function(){
    clearTimeout(evenementYypingTimer);
})
$(document).on('keyup','.event-card-content, .event-card-title',function(){
    var elem = $(this);
    clearTimeout(evenementYypingTimer);
    evenementYypingTimer = setTimeout(function() {
        evenementDoneTyping(elem)
    },evenementTypingInterval)
});

function evenementDoneTyping(elem){
    var script;
    if(elem.attr('class') == 'event-card-content'){
        script = 'editContenu_evenement';
    } else if(elem.attr('class') == 'event-card-title'){
        script = 'editTitre_evenement';
    }
    $.ajax({
        url:'traitements/'+script+'.php',
        method:'POST',
        data:{
            id:elem.parent().attr('data_id'),
            valeur:elem.html(),
        }
    })
}