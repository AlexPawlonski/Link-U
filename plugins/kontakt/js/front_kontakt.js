jQuery(document).ready(function($){
	$("#formKontaktSubmit").click(function () {
		// Test des champs
		
		var formInfos = {
			'kontakt_name' : $('#kontakt_name').val(),
			'kontakt_firstname' : $('#kontakt_firstname').val(),
			'kontakt_mail' : $('#kontakt_mail').val(),
			'kontakt_tel' : $('#kontakt_tel').val(),
			'kontakt_category' : $('#kontakt_category').val(),
			'kontakt_subject' : $('#kontakt_subject').val(),
			'kontakt_message' : $('#kontakt_message').val(),
			'horodate' : $('#horodate').val()
		}

		var telRegEx = /^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$/;
		var mailRegEx = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
		var validate = true;

		// Champs vides
		for (const key in formInfos) {
			if (formInfos.hasOwnProperty(key)) {
				if(formInfos[key] == '' && $('#'+key+'').is('[required]')){
					validate = false;
					$('#error'+key+'').fadeOut(function(){
						$(this).html('Ce champ ne doit pas être vide');
						$(this).fadeIn();
					});
				}
				else if(formInfos[key] != '')
				{
					if(key == 'kontakt_mail')
					{
						if(mailRegEx.test(formInfos[key]) == true)
						{
							$('#error'+key+'').fadeOut(function(){
								$(this).fadeOut();
							});
						}
						else
						{
							validate = false
							$('#error'+key+'').fadeOut(function(){
								$(this).html('Le mail est incorrect');
								$(this).fadeIn();
							});
						}
					}
					else if(key == 'kontakt_tel')
					{
						if(telRegEx.test(formInfos[key]) == true)
						{
							$('#error'+key+'').fadeOut(function(){
								$(this).fadeOut();
							});
						}
						else
						{
							validate = false
							$('#error'+key+'').fadeOut(function(){
								$(this).html('Le numéro de téléphone est incorrect');
								$(this).fadeIn();
							});
						}
					}
					else{
						$('#error'+key+'').fadeOut()
					} 
				}

			}
		}
		if(validate == true)
		{
			ajaxContact(formInfos,$);
		}
		
	});

});

function ajaxContact(formInfos,$){
	console.log(formInfos);
	var kontakt_name = formInfos['kontakt_name'];
	var kontakt_firstname = formInfos['kontakt_firstname'];
	var kontakt_mail = formInfos['kontakt_mail'];
	var kontakt_tel = formInfos['kontakt_tel'];
	var kontakt_category = formInfos['kontakt_category'];
	var kontakt_subject = formInfos['kontakt_subject'];
	var kontakt_message = formInfos['kontakt_message'];
	var horodate = formInfos['horodate'];

		$.ajax({
			type: "POST",
			url: kontakt.ajaxurl,
			dataType: "json",
			data: {
				action: kontakt.action,
				nonce: kontakt.nonce,
				kontakt_name,
				kontakt_firstname,
				kontakt_mail,
				kontakt_tel,
				kontakt_category,
				kontakt_subject,
				kontakt_message,
				horodate
			},
			success: function(data){
				$('#ajaxError').html(data).fadeIn();
				$('#kontakt_name').val("");
				$('#kontakt_firstname').val("");
				$('#kontakt_mail').val("");
				$('#kontakt_tel').val("");
				$('#kontakt_subject').val("");
				$('#kontakt_message').val("");
				$('#kontakt_name').val("");
			}, error : function(){
				$('#ajaxError').html('Une erreur s\'est produite lors du retour des données').fadeIn();
			}
		})
		
	}