/**
 * Author: emimafia
 * Our genius idea for ajaxing ^^
 */
	var loading ='<section class="loading"><img src="css/images/ajax-loader.gif" alt="Ajax Loader">Bitte warten, die Inhalte werden geladen...</section>';
	
	$(document).ready(function(){
		drawmap();
		$('a.ajax-link').click(function(){
			link = $(this).attr('href');
			
			$('#content div').fadeOut('slow');
			$('#content').animate({
				minHeight: "0",
				height: "0",
				paddingTop: "0",
				paddingBottom: "0"
			}, 'slow', function(){
				$('#content div').remove();
				$('content').append(loading);
				
				$('#content').animate({
					paddingTop: "20",
					paddingBottom: "20",
					height: "0"
				}, 'slow');
				
				$.get(link, function(data, success){
					if(success == 'success'){
						$('#content').animate({
							minHeight: "500px",
							height: "0",
							paddingTop: "0",
							paddingBottom: "0"
						}, 'slow', function(){
							$('#content section').remove();
							$('#content').html(data);
							$('#content').removeAttr('style');
							$('.flexslider').flexslider( {
								animation : "slide",
								animationLoop : true,
								itemWidth : 102,
								minItems : 2,
								maxItems : 8,
								controlsContainer : '.flex-container' 
  });
						});
					}
				}).error(function(){
					alert('Sie versuchen eine Seite zu öffnen die scheinbar nicht existiert.');
				});
			});
			return false;
		});
	});