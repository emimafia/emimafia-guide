/**
 * @author Christoph Kepler
 * some basic things that shouldn't be in the index
 */

$(window).load(function() {
  $('.flexslider').flexslider( {
		animation : "slide",
		animationLoop : true,
		itemWidth : 130,
		minItems : 2,
		maxItems : 7,
		controlsContainer : '.flex-container' 
  });
  // $(".full").click(
    // function(){  
       // $("#show_original").html('<img class="close" src="'+this.src.replace('tn_','')+'"  /> ');
      // $("#grey, #show_original").fadeIn(300);  
    // }
  // );  
  // $(".close").click(
    // function(){  
      // $("#grey, #show_original").fadeOut(300);  
    // }
  // );
});