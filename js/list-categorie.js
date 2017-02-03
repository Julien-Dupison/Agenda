//gestion du formulaire d'ajout d'événement
$('.liste-categorie').click(function(){
	if(!$('.list-categorie').is(":visible")){
		$('.list-categorie').fadeIn('100')
	} else {
		$('.list-categorie').fadeOut('100')
	}
})

$(document).mouseup(function(e){
	if (!$('.list-categorie').is(e.target) && $('.list-categorie').has(e.target).length === 0
		&& !$('.add-categorie').is(e.target)
		&& !$('.form-add-categorie').is(e.target) && $('.form-add-categorie').has(e.target).length === 0
	){
		if($('.form-add-categorie').is(":visible")) {
			$('.form-add-categorie').fadeOut('100', function () {
				$('.list-categorie').fadeOut('100')
			})
		} else {
			$('.list-categorie').fadeOut('100')
		}
	}
})

$('#add-categorie').click(function(){
	if(!$('.form-add-categorie').is(":visible")){
		$('.form-add-categorie').fadeIn('100')
	} else {
		$('.form-add-categorie').fadeOut('100',function(){
			$('#add-categorie-nom').html('')
		})
	}
});

$('#form-add-categorie-submit').click(function(){
	var nom = $('#add-categorie-nom').html()
	var couleur = $('#add-categorie-couleur').html()

	$.ajax({
		url:'traitements/add_categorie.php',
		type:'POST',
		data:{
			nom:nom,
			couleur:couleur,
		},
		success : function(data){
			LoadCategorie()
			addToast("la catégorie "+nom+" a été ajoutée",false);
		},
		error : function(){
			addToast("la catégorie "+nom+" n'a pas pu étre ajoutée",true);
		},

	})

	$('.form-add-categorie').fadeOut('100',function(){
		$('#add-categorie-nom').html('')
		$('#add-categorie-couleur').html('')
	})
})

$('.container-list-categorie').on('click','.categorie-delete',function(){
	var id = $(this).attr('data-id');
	$.ajax({
		url:'traitements/delete_categorie.php',
		method:'post',
		data:{
			id:id
		},
		success:function(){
            addToast('catégorie supprimée !')
            LoadCategorie();
		}
	})
})