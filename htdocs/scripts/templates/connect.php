<?php
	$server = 'localhost';
	$user = 'emimafia_guide';
	$pw = 'DAS GEHT EUCH NIX AN! NICHT MAL ANNÄHERND';
	$db = 'emimafia_guide';
	mysql_connect($server, $user, $pw) or die ("Keine Verbindung möglich!");
	mysql_select_db($db) or die ("Die Datenbank ist nicht erreichbar!");
?>
