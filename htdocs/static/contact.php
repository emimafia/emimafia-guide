<?php
/**
 * Contact Form Processing
 */
if(isset($_POST) && count($_POST)>0) {
	$fehler = 0;
	$fehlerstyle = 'style="color:#FF1F00;"';
	$pflicht = array('name','email','text');
	foreach($_POST as $k=>$v) {
		$v = trim($v);
		$v = strip_tags($v);
		$v = utf8_decode($v);
		$v = htmlentities($v);
		$v = str_replace("~","&#126",$v);
		$v = str_replace("\n","<br />",$v);
		$v = str_replace("\r","",$v);
		$$k = $v;
	}
	foreach($pflicht as $k){
		if(empty($$k)) {
			$fehler++;
			$tmp = $k."style";
			$$tmp = $fehlerstyle;
		}
	}
                 
	if(!empty($plz) && ($plz<=0 || strlen($plz)<5)) {
		$fehler++; 
		$plzstyle = $fehlerstyle;                
	}
                 
	if(!isset($codestyle) && $_POST['code']!=$_SESSION['captchacode'] && strlen($_POST['code'])!=6){
		$fehler++;
		$codestyle = $fehlerstyle;
	}

	if(!isset($emailstyle)){
		list($acc,$dom) = $tmp = explode("@",$email);

		if(is_int($dom*1)) {
			$ip=gethostbyname($dom);
		}
		else{
			if(!@gethostbyaddr($dom)) {
				$ip=$dom;
			}
			else {
				$ip=gethostbyaddr($dom);
			}
		}

		if(empty($dom) || $ip==$dom || empty($acc) || count($tmp)!=2){
			$fehler++;
			$emailstyle = $fehlerstyle;
		}
	}
	if($fehler==0) {
		$to = 'newuser@localhost';
		$subject = 'E-Mail von ' . $_SERVER['HTTP_HOST'];
		
		/*
		//----------------------------------[+] VERSAND IN ASCII -------------------------------------
                                
			$mailbody = "Am " . date("d.m.Y \u\m H:i:s") . " Uhr wurden folgende Daten gesendet:\r\n\r\n";
			$mailbody .= "Name:     \t " . $name . "\r\n";
			$mailbody .= "PLZ, Ort: \t " . $plz . " " . $ort . "\r\n";
			$mailbody .= "Strasse:  \t " . $strasse . "\r\n";
			$mailbody .= "E-Mail:   \t " . $email . "\r\n";
			$mailbody .= "Nachricht:\t " . $text . "\r\n";
                                
		//----------------------------------[-] VERSAND IN ASCII -------------------------------------
		*/
                                
		$mailbody = file_get_contents('../scripts/template/mail.html');
		foreach($_POST as $k=>$v){
			$mailbody = str_replace('~' . $k . '~',$$k,$mailbody);
		}
		$mailbody = str_replace('~domain~',$_SERVER['HTTP_HOST'],$mailbody);
		$mailbody = str_replace('~datum~',date('d.m.Y \u\m H:i:s'),$mailbody);
                                
		$header = 'MIME-Version: 1.0' . "\r\n";
		$header .= 'Content-Type: text/html /charset-iso-8859-1' . "\r\n";
		$header .= 'From: ' . $mail . '(' . $name . ')' . "\r\n";
		$header .= 'Reply-To: mirdoch@egal.com' . "\r\n";
		$header .= 'X-Mailer: PHP ' . phpversion();
                                
		if(mail($to,$subject,$mailbody,$header)) {
			echo '<script>top.location.href="' . $_SERVER['REQUEST_URI'] . '?erfolg=1</script>';
		}
	}
	else {
		$ausgabe="Fehler gefunden!";
	}
}
?>
		<div id="full-description" class="sw">
  		<h2>Contact</h2>
      <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
	      <p>
	        <?php if(isset($_GET['erfolg']) && $_GET['erfolg']==1) die('<p>Vielen Dank f&uuml;r Deine Mail</p><p><a href="./">Zur&uuml;ck</a></p>'); ?> &nbsp; 
	      </p>
	      <p>
	        <label for="name" <?php if(isset($namestyle)) echo $namestyle; ?> class="contactlabel">Name</label>
	        <input id="name" type="Text" required="required" size="45" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" name="name" />
	      </p>
	      <p>
	        <label <?php if(isset($plzstyle) || isset($ortstyle)) echo $plzstyle; ?> class="contactlabel">PLZ / Ort</label>
	        <input id="plz" type="text" maxlenght="5" size="5" value="<?php if(isset($_POST['plz'])) echo $_POST['plz'] ?>" name="plz" />
	        <input id="place" type="text" size="33" value="<?php if(isset($_POST['ort'])) echo $_POST['ort'] ?>" name="ort" />
	      </p>
	      <p>
	        <label class="contactlabel" for="strasse">Strasse</label>
	        <input id="strasse" type="text" size="45" value="<?php if(isset($_POST['strasse'])) echo $_POST['strasse'] ?>" name="strasse" />
	      </p>
	      <p>
	        <label <?php if(isset($emailstyle)) echo $emailstyle; ?> class="contactlabel" for="email">E-Mail</label>
	        <input id="email" type="email" required="required" size="45" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>" name="email" />
	      </p>
	      <p>
	        <label <?php if(isset($textstyle)) echo $textstyle; ?> class="contactlabel" for="text">Nachricht</label>
	        <textarea id="text" required="required" cols="33" name="text" rows="10"><?php if(isset($_POST['text']))echo $_POST['text'] ?></textarea>
	      </p>
	      <p>
	        <label <?php if(isset($codestyle)) echo $codestyle; ?>class="contactlabel" for="code">Code</label>
	        <input id="code" type="text" size="45" name="code" required="required" />
	      </p>
	      <p>
	      <label class="contactlabel">Sicherheitscode</label>
	      <img id="captcha" src="../scripts/templates/capture.php" />
	      <a class="nohref" onclick="newcapture()">
	        Refresh
	      </a>
	      </p>
	      <p>
		      <label class="contactlabel">&nbsp;</label>
		      <input id="contactsubmit" class="contactbutton" type="Submit" value="Senden" name="" />
		      <input class="contactbutton" type="reset" value="Zur&uuml;cksetzen" />
	      </p>
      </form>
      <div class="clearfix"></div>
</div>