/**
 * Author: emimafia
 * Our genius idea for ajaxing ^^
 */

/**
 * @TODO We should do it. 
 */

	var loading ='<section class="loading"><img src="css/images/ajax-loader.gif" alt="Ajax Loader">Bitte warten, die Inhalte werden geladen...</section>';
	
	$(document).ready(function(){
		$('nav a').click(function(){
			link = $(this).attr('href');
			
			$('#content *').fadeOut('slow');
			$('#content').animate({
				height: "0",
				paddingTop: "0",
				paddingBottom: "0"
			}, 'slow', function(){
				$('#content div').remove();
				$('footer').before(loading);
				
				$('#content').animate({
					paddingTop: "20",
					paddingBottom: "20",
					height: "0"
				}, 'slow');
				
				$.get(link, function(data, success){
					if(success == 'success'){
						$('#content').animate({
							height: "0",
							paddingTop: "0",
							paddingBottom: "0"
						}, 'slow', function(){
							$('#content section').remove();
							$('#content').html(data);
						});
					}
				}).error(function(){
					alert('Sie versuchen eine Seite zu öffnen die scheinbar nicht existiert.');
				});
			});
			return false;
		});
	});