<?php
	$server = 'localhost';
	$user = 'emimafia_guide';
	$pw = 'EMI-Dre$den4';
	$db = 'emimafia_guide';
	mysql_connect($server, $user, $pw) or die ("Keine Verbindung möglich!");
	mysql_select_db($db) or die ("Die Datenbank ist nicht erreichbar!");
?>