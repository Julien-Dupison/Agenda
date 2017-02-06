function getCurrentDate(){
	var today = new Date();
	//on recupère le jour
	var dd = today.getDate();
	//on recupère le mois
	var mm = today.getMonth()+1;

	var MArray = [ "JAN", "FEV", "MAR", "AVR", "MAI", "JUIN", "JUIL", "AOUT", "SEPT", "OCT", "NOV", "DEC" ];
	//on recupère l'annee
	var yyyy = today.getFullYear();
	var M;
	if(dd<10) dd='0'+dd;
	if(mm<10) mm='0'+mm;

	switch(mm){
		case "01" : M = MArray[0]; break;
		case "02" : M = MArray[1]; break;
		case "03" : M = MArray[2]; break;
		case "04" : M = MArray[3]; break;
		case "05" : M = MArray[4]; break;
		case "06" : M = MArray[5]; break;
		case "07" : M = MArray[6]; break;
		case "08" : M = MArray[7]; break;
		case "09" : M = MArray[8]; break;
		case "10" : M = MArray[9]; break;
		case "11" : M = MArray[10]; break;
		case "12" : M = MArray[11]; break;
	}

	$('#datepicker').val(dd+"/"+M+"/"+yyyy);
	$('.day').html(dd);
	$('.month').html(M);
	$('.year').html(yyyy);
}

function formatDate(day,month,year){
    var fmonth, fdate;
    switch(month){
        case "JAN" : fmonth = "01"; break;
        case "FEV" : fmonth = "02"; break;
        case "MAR" : fmonth = "03"; break;
        case "AVR" : fmonth = "04"; break;
        case "MAI" : fmonth = "05"; break;
        case "JUIN" : fmonth = "06"; break;
        case "JUIL" : fmonth = "07"; break;
        case "AOUT" : fmonth = "08"; break;
        case "SEPT" : fmonth = "09"; break;
        case "OCT" : fmonth = "10"; break;
        case "NOV" : fmonth = "11"; break;
        case "DEC" : fmonth = "12"; break;
    }
    fdate = year+"-"+fmonth+"-"+day;
    return fdate;
}

function Mtom(M){
    var m;
    switch(M){
        case "JAN" : m = "01"; break;
        case "FEV" : m = "02"; break;
        case "MAR" : m = "03"; break;
        case "AVR" : m = "04"; break;
        case "MAI" : m = "05"; break;
        case "JUIN" : m = "06"; break;
        case "JUIL" : m = "07"; break;
        case "AOUT" : m = "08"; break;
        case "SEPT" : m = "09"; break;
        case "OCT" : m = "10"; break;
        case "NOV" : m = "11"; break;
        case "DEC" : m = "12"; break;
    }
    return m;
}

function formatDateC(date){
    var fdate;
    var date = date.split("/");
    return fdate = date[2]+"-"+date[1]+"-"+date[0];
}

function clearSelection() {
    if(document.selection && document.selection.empty) {
        document.selection.empty();
    } else if(window.getSelection) {
        var sel = window.getSelection();
        sel.removeAllRanges();
    }
}

function getTextWidth(text, font) {
    // if given, use cached canvas for better performance
    // else, create new canvas
    var canvas = getTextWidth.canvas || (getTextWidth.canvas = document.createElement("canvas"));
    var context = canvas.getContext("2d");
    context.font = font;
    var metrics = context.measureText(text);
    return metrics.width;
};

function getTrimtext(text,width) {
	while(getTextWidth(text, "16px roboto") > width){
		text = text.substring(0, text.length - 1);
	}
	return text;
}

function addToast(message,stay){
	//on stocke le message original
	var originalMessage = message;

	//on abrège le message s'il est trop long
	if(getTextWidth(message, "16px roboto") > 230){
		var message = getTrimtext(message,230)+'...';
	}

	$('<div class="toast"><div class="text-toast"><span class="toast-message">'+message+'</span><span style="display:none;" class="toast-originalmessage">'+originalMessage+'</span></div><div class="dismiss-toast"><i aria-hidden="false" class="fa fa-times"></i></div></div>').hide().appendTo('.toast-container').fadeIn('200',function(){
		if(!stay || stay === undefined){
			$(this).attr('unexpandable','true');
			$(this).delay('2000').fadeOut('200',function(){
				$(this).remove();
			});
		} else {
			$(this).attr('unexpandable','false');
		}
	});
}

$('.toast-container').on('click','.dismiss-toast',function(e){
	$(this).parent().fadeOut('200',function(){
		$(this).remove();
	})
	e.stopPropagation();
}).on('click','.toast',function(){
	if($(this).attr('unexpandable') == 'false'){
		$(this).toggleClass('toast-active')
		var textdiv = $(this).children().first().children()
		if($(this).hasClass('toast-active')){
			textdiv.eq(0).hide(0,function(){
				textdiv.eq(1).show()
			});
			$(this).css({'line-height':'22px','padding-top':'13.5px'});
			var curHeight = $(this).height();
	    	var autoHeight = $(this).css('height', 'auto').height();
			$(this).height(curHeight).animate({height: autoHeight}, 600);
		} else {
			$(this).css({'line-height':'50px','padding-top':'0px'});
			textdiv.eq(1).hide(0,function(){
				textdiv.eq(0).show()
			});
			var curHeight = $(this).height();
	    	var autoHeight = $(this).css('height', 'auto').height();
			$(this).height(curHeight).animate({height: autoHeight}, 600);
		}
	}
});

function LoadCategorie(){
	$.ajax({
		url:'traitements/getAll_categorie.php',
		type:'GET',
		dataType:'json',
		success:function(data){
			var string = "";
			$.each(data,function(i,val){
				string += "<div class='categorie-container'><div class='categorie-icon' style='background-color:"+val.categorie_couleur+"'>"+val.categorie_titre.substring(0,1)+"</div><div class='categorie-titre'>"+val.categorie_titre+"</div><div class='categorie-delete' data-id='"+val.categorie_id+"'><i class='fa fa-trash' aria-hidden='true'></i></div></div>";
			})
			$('.container-list-categorie').html(string)
		}
	})
}

function LoadEvenement(date){
    $.ajax({
        url:'traitements/getAll_evenement.php',
        type:'POST',
        data:{
            date:date,
        },
        dataType:'json',
        success:function(data){
            $('.evenement-container').fadeOut(200,function(){
                $(this).html('');
                $.get('parts/evenement.html',function(evenementHTML){
                    $.each(data,function(i,val){
                        $('.evenement-container').append(evenementHTML)
                        $('.evenement-container').children().last().attr('data_id',val.evenement_id)
                        $('.evenement-container').children().last().children().eq(1).html(val.evenement_titre)
                        $('.evenement-container').children().last().children().eq(2).html(val.evenement_contenu)
                    })
                })
                $(this).delay('200').fadeIn(200);
            })
        }
    })
}

function LoadEDT(date){
    $.ajax({
        url:'traitements/get_edt.php',
        method:'POST',
        dataType : 'json',
        data : {
            date:date,
        },
        success:function(data){
            data.forEach(function(creneau){
                console.log($('#edt-creneau-'+creneau.creneau_id));
                $('#edt-creneau-'+creneau.creneau_numero).children().eq(1).html(creneau.matiere_id);
                $('#edt-creneau-'+creneau.creneau_numero).children().eq(2).html(creneau.Salle);
            })
        }
    })
}

$(".volet-show").click(function(){
    var voletToShow = '.'+$(this).attr("volet");
    if(!$(voletToShow).hasClass('volet-active')){
        $(voletToShow).children(0).delay(1300).fadeIn(200)
    } else {
        $(voletToShow).children(0).fadeOut(200)
    }
    $(voletToShow).toggleClass('volet-active')
    if($('.volet-active').size() > 0){
        $('.page-content').addClass('page-content-reduced');
    } else {
        $('.page-content').removeClass('page-content-reduced');
    }
    $('.volet-active').not(voletToShow).each(function(){
        $(this).children(0).fadeOut(200);
        $(this).removeClass('volet-active');
    })
})