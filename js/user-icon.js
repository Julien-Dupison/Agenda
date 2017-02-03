$('#user-icon').click(function(){
	$(this).addClass('user-icon-active');
	if($(this).hasClass('user-icon-active')){
		$('#user-icon-icon').hide();
		setTimeout(function(){
			$('#user-icon-content').fadeIn(300);
		},200);
	} else {
		setTimeout(function(){
			$('#user-icon-icon').fadeIn(200);
		},300)
		$('#user-icon-content').hide();
	}
})

$(document).mouseup(function(e){
	if (!$('#user-icon').is(e.target) && $('#user-icon').has(e.target).length === 0 && $('#user-icon').hasClass('user-icon-active')){
		$('#user-icon').removeClass('user-icon-active')
		setTimeout(function(){
			$('#user-icon-icon').fadeIn(200);
		},300)
		$('#user-icon-content').hide();
	}
})
