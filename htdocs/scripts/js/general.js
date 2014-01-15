/**
 * @author emimafia
 * some basic things that shouldn't be in the index
 */
/**
 * Flexslider Function
 * Creates Flexslider
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
});

function styleswitch(action) {
	element = document.getElementById("style");
	switch(action) {
		/**
		 * Raise the size of the text
		 */
		case 'plus':
			var list = document.getElementsByClassName("sw");
			for (var i = 0; i < list.length; i++) {
		  	list[i].style.fontSize = "20px";
		  	list[i].style.fontWeight = "bold";
			}
			document.getElementsByTagName('footer')[0].style.height = "30px";
			document.getElementById("additional-links").style.width = "310px";
		break;
		/**
		 * Switch back to normal size
		 */
		case 'minus':
			var list = document.getElementsByClassName("sw");
			for (var i = 0; i < list.length; i++) {
		  	list[i].removeAttribute('style');
			}
			document.getElementsByTagName('footer')[0].removeAttribute('style');
			document.getElementById("additional-links").removeAttribute('style');
		break;
		/**
 		 * CSS File Switch
		 */
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
function newcapture() {
  var now = new Date();
  sek = now.getSeconds();
  myimg = document.getElementById('captcha');
  myimg.src = '../scripts/templates/capture.php?'+sek;
  return
}