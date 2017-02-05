$('.utilisateur').click(function(){
    $('.page-content').toggleClass('page-content-reduced')
    if($('.page-content').hasClass('page-content-reduced')){
        $('.utilisateur-content').delay(1300).fadeIn(200)
    } else {
        $('.utilisateur-content').fadeOut(200)
    }
    $('.utilisateur-wrapper').toggleClass('utilisateur-wrapper-active')
});
