/**
 * @author Christoph Kepler
 * some basic things that shouldn't be in the index
 */

$(window).load(function() {
  $('.flexslider').flexslider();
  $(".thumb").click(
    function(){  
       $("#show_original").html('<img class="close" src="'+this.src.replace('tn_','')+'"  /> ');
      $("#grey, #show_original").fadeIn(300);  
    }
  );  
  $(".close").click(
    function(){  
      $("#grey, #show_original").fadeOut(300);  
    }
  );  
});