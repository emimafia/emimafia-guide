/**
 * @author emimafia
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
  /*
   * @TODO Maybe needs some investigation for later
   */
  //$('#link-to-point').onClick="top.location.href='/'";
});

function styleswitch(action) {
	element = document.getElementById("style");
	switch(action) {
		case 'plus':
			document.getElementById("description").style.fontSize = "20px";
			document.getElementById("description").style.fontWeight = "bold";
			document.getElementById("additional-links").style.fontSize = "20px";
			document.getElementById("additional-links").style.fontWeight = "bold";
			document.getElementById("additional-links").style.width = "255px";
		break;
		case 'minus':
			document.getElementById("description").style.fontSize = "12px";
			document.getElementById("description").style.fontWeight = "normal";
			document.getElementById("additional-links").style.fontSize = "12px";
			document.getElementById("additional-links").style.fontWeight = "normal";
			document.getElementById("additional-links").style.width = "200px";
		break;
		case 'contrast':
			if(element.getAttribute('href')=="css/style.css") {
				element.removeAttribute("href");
				element.setAttribute("href", "css/contrast.css");
			}
			else {
				element.removeAttribute("href");
				element.setAttribute("href", "css/style.css");				
			}
		break;
		default:
			alert('SHIT HAPPENS');
	}
}
