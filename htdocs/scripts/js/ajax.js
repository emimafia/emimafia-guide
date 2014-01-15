/**
 * Author: emimafia
 * Our genius idea for ajaxing ^^
 */
	var loading ='<section class="loading"><img src="css/images/ajax-loader.gif" alt="Ajax Loader">Bitte warten, die Inhalte werden geladen...</section>';
  var lon = 13.73836112;
  var lat = 51.052259;
  var zoom = 13;
  var marker = new Array('0','73','94','80','87','101');
  var popup = new Array('0','72','93','79','86','100');

	$(document).ready(function(){
		drawmap();
		$('a.ajax-nonpoi').click(function(){
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
							minHeight: "350px",
							height: "0",
							paddingTop: "0",
							paddingBottom: "0"
						}, 'slow', function(){
							$('#content section').remove();
							$('#content').html(data);
							$('#content').removeAttr('style');
  						jumpTo(lon, lat, zoom);
  						$('.olPopup').css('display', 'none');
  						$('.olAlphaImg').attr('src','css/images/marker.svg');
							$('.flexslider').flexslider({
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
							minHeight: "550px",
							height: "0",
							paddingTop: "0",
							paddingBottom: "0"
						}, 'slow', function(){
							$('#content section').remove();
							$('#content').html(data);
							$('#content').removeAttr('style');
  						$('.olPopup').css('display', 'none');
  						$('.olAlphaImg').attr('src','css/images/marker.svg');
							$('#OpenLayers_Feature_' + popup[p] + '_popup').css('display','block');
							$('#OL_Icon_' + marker[p] + '_innerImage').attr('src','css/images/marker_active.svg');
							$('.flexslider').flexslider({
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
	/**
	 * var poi = 73;
$('#OL_Icon_' + poi + '_innerImage').attr('src','css/images/marker_active.svg')
	 */