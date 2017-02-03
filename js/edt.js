$('.edt').click(function(){
    $('.page-content').toggleClass('page-content-reduced')
    if($('.page-content').hasClass('page-content-reduced')){
        $('.edt-content').delay(1300).fadeIn(200)
    } else {
        $('.edt-content').fadeOut(200)
    }
    $('.edt-wrapper').toggleClass('edt-wrapper-active')
});