/**
 * @author emimafia
 * some basic things that shouldn't be in the index
 */

$(window).load(function() {
  $('.flexslider').flexslider( {
		animation : "slide",
		animationLoop : true,
		itemWidth : 102,
		minItems : 2,
		maxItems : 8,
		controlsContainer : '.flex-container' 
  });
  /*
   * @TODO Maybe needs some investigation for later
   */
  //$('#link-to-point').onClick="top.location.href='/'";
});

function styleswitch(action) {
	element = document.getElementById("style");
	switch(action) {
		case 'plus':
			var list = document.getElementsByClassName("sw");
			for (var i = 0; i < list.length; i++) {
		  	list[i].style.fontSize = "20px";
		  	list[i].style.fontWeight = "bold";
			}
			document.getElementsByTagName('footer')[0].style.height = "30px";
			document.getElementById("additional-links").style.width = "255px";
		break;
		case 'minus':
			var list = document.getElementsByClassName("sw");
			for (var i = 0; i < list.length; i++) {
		  	list[i].removeAttribute('style');
			}
			document.getElementsByTagName('footer')[0].removeAttribute('style');
			document.getElementById("additional-links").removeAttribute('style');
		break;
		case 'contrast':
			if(element.getAttribute('href')=="css/include.css") {
				element.removeAttribute("href");
				element.setAttribute("href", "css/include_contrast.css");
			}
			else {
				element.removeAttribute("href");
				element.setAttribute("href", "css/include.css");				
			}
		break;
		default:
			alert('SHIT HAPPENS');
	}
}
