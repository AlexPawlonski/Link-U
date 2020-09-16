jQuery(document).ready(function($){
	$('#bt-map').click(function (e) {
		// Renseigner les inputs ici
		var inputs = ['title' ,'latitude' ,'longitude'];
		var canSubmit = true;

		// La fonction boucle sur l'array "inputs"
		for (let i = 0; i < inputs.length; i++) {
			// Non nul
			if($('#Cm-'+ inputs[i] +'').val().trim() == ''){
				$('#Cm-'+ inputs[i] +'-error').slideDown();
				canSubmit = false;
			}
			// Condition supplémentaire pour les number
			else if(inputs[i] == 'latitude' || inputs[i] == 'longitude'){
				if(isNaN($('#Cm-'+ inputs[i] +'').val().trim())){
					$('#Cm-'+ inputs[i] +'-error').slideDown();
					canSubmit = false;
				}
				else{
					$('#Cm-'+ inputs[i] +'-error').slideUp();
				}
			}
			else{
				$('#Cm-'+ inputs[i] +'-error').slideUp();
			}
		}
		
		if(canSubmit == true){
			// Traitement du formulaire
			$('#formMap').submit();
		}
	});
	$('.bt-delete').click(function (e) { 
		$delete = window.confirm(textJS.confirmation);
		if($delete == true)
		{
			$('#deleteformMap').submit();
		}
	});

	$("#shortCodeInput").click(function (e) { 
		$(this).select()
		document.execCommand('copy');
		$('#cp').remove();
		$(this).after(`<small><i id='cp'>${textJS.copy}!</i></small>`);
		$('#cp').hide().fadeIn();
	});
})