LoadCategorie()
LoadEvenement()

$(".chatbox-header").click(function(e){
    $(this).parent().toggleClass("chatbox-active");
})

$(".utilisateur-content").mCustomScrollbar({
    theme:"light"
})