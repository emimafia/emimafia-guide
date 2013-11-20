<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="utf-8" />

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Cityguide</title>
  <meta name="description" content="" />
  <meta name="author" content="emimafia" />

  <meta name="viewport" content="width=device-width; initial-scale=1.0" />

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico" />
  <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/style.css" media="screen">
  <!-- Scripts -->
  <script type="text/javascript" src="lib/html5shiv.js"></script>
  <script type="text/javascript" src="lib/jquery-2.0.3.min.js"></script>
  <script type="text/javascript" src="lib/scrolling_nav.js"></script>
  <script type="text/javascript" src="scripts/js/ajax.js"></script>
</head>

<body>
  <div id="wrapper">
    <header>
      <h1>Hier findest du demnächst eine Karte</h1>
    </header>
    <div id='content'>
    	<nav>
    		<p>Navigation</p>
    		<ul>
    			<li>
    				<a href="/">Home</a>
    			</li>
    			<li>
    				<a href="scripts/templates/poi.php?p=1">PoI 1</a>
    			</li>
    			<li>
    				<a href="scripts/templates/poi.php?p=2">PoI 2</a>
    			</li>
    			<li>
    				<a href="scripts/templates/poi.php?p=3">PoI 3</a>
    			</li>
    			<li>
    				<a href="scripts/templates/poi.php?p=4">PoI 4</a>
    			</li>
    			<li>
    				<a href="scripts/templates/poi.php?p=5">PoI 5</a>
    			</li>
    		</ul>
    	</nav>
      <article>
      	<h2>Ein Point of Interest</h2>
       	Hier soll dann mal der Beschreibungtext rein<br />
       	Lorem Ipsum<br />
       	Dolor Et<br />
       	<br />
       	Ich werde Dir Punkte von Dresden zeigen, die Du nicht ablehnen kannst.<br />
       	<br />
       	Bart Bart Bart Bart<br />
       	Gandalf-/Weberstyle<br />
       	<br />
       	Das wird auch noch besser durchgestylt.<br />
       	<br />
       	Grundfarben würde ich antrahzit/gelb nehmen.<br />
      </article>
      <div id="audio">
      	Playa
      </div>
      <div id="video">
      	Youtube
      </div>
      <div class="clearfix"></div>
      <div id="gallery">
      	<div class="thumbnail">
      		Hier
      	</div>
      	<div class="thumbnail">
      		könnte
      	</div>
      	<div class="thumbnail">
      		man
      	</div>
      	<div class="thumbnail">
      		via
      	</div>
      	<div class="thumbnail">
      		PHP-Schleife
      	</div>
      	<div class="thumbnail">
      		ne
      	</div>
      	<div class="thumbnail">
      		Bildergalerie
      	</div>
      	<div class="thumbnail">
      		mit
      	</div>
      	<div class="thumbnail">
      		Thumbnails
      	</div>
      	<div class="thumbnail">
      		anzeigen
      	</div>
      	<div class="thumbnail">
      		lassen.
      	</div>
      </div>
      <div class="clearfix"></div>
    </div>
    <footer>
   		<p>This City Guide of Dresden is brought to you by emimafia</p>
   		<p>&nbsp;</p>
    	<p>&copy; Copyright  by Christoph Kepler, Michael Schneider, Malte Pasche, Lukas Landgraf</p>
    </footer>
  </div>
  <script>
if (!document.layers)
document.write('<div id="divStayTopLeft" style="position:absolute">')
</script>

<layer id="divStayTopLeft">

<!--EDIT BELOW CODE TO YOUR OWN MENU-->
<table border="1" width="130" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" bgcolor="#FFFFCC">
      <p align="center"><b><font size="4">Menu</font></b></td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#FFFFFF">
      <p align="left"> <a href="http://www.dynamicdrive.com">Dynamic Drive</a><br>
       <a href="http://www.dynamicdrive.com/new.htm">What's New</a><br>
       <a href="http://www.dynamicdrive.com/hot.htm">What's Hot</a><br>
       <a href="http://www.dynamicdrive.com/faqs.htm">FAQs</a><br>
       <a href="http://www.dynamicdrive.com/morezone/">More Zone</a></td>
  </tr>
</table>
<!--END OF EDIT-->

</layer>


<script type="text/javascript">

/*
Floating Menu script-  Roy Whittle (http://www.javascript-fx.com/)
Script featured on/available at http://www.dynamicdrive.com/
This notice must stay intact for use
*/

//Enter "frombottom" or "fromtop"
var verticalpos="fromtop"

if (!document.layers)
document.write('</div>')

function JSFX_FloatTopDiv()
{
	var startX = 3,
	startY = 150;
	var ns = (navigator.appName.indexOf("Netscape") != -1);
	var d = document;
	function ml(id)
	{
		var el=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id];
		if(d.layers)el.style=el;
		el.sP=function(x,y){this.style.left=x;this.style.top=y;};
		el.x = startX;
		if (verticalpos=="fromtop")
		el.y = startY;
		else{
		el.y = ns ? pageYOffset + innerHeight : document.body.scrollTop + document.body.clientHeight;
		el.y -= startY;
		}
		return el;
	}
	window.stayTopLeft=function()
	{
		if (verticalpos=="fromtop"){
		var pY = ns ? pageYOffset : document.body.scrollTop;
		ftlObj.y += (pY + startY - ftlObj.y)/8;
		}
		else{
		var pY = ns ? pageYOffset + innerHeight : document.body.scrollTop + document.body.clientHeight;
		ftlObj.y += (pY - startY - ftlObj.y)/8;
		}
		ftlObj.sP(ftlObj.x, ftlObj.y);
		setTimeout("stayTopLeft()", 10);
	}
	ftlObj = ml("divStayTopLeft");
	stayTopLeft();
}
JSFX_FloatTopDiv();
</script>

<script>
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
	
</script>


</body>
</html>






