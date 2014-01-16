<?php
/**
 * Database Connection
 */
	$server = 'localhost';
	$user = 'emimafia_guide';
	$pw = 'Das geht euch ja mal sowas von gar nix an. Nicht mal annähernd. Ihr braucht auch ne in die History gucken, da steht nur das lokale drinne. ;-p';
	$db = 'emimafia_guide';
	mysql_connect($server, $user, $pw) or die ("Keine Verbindung möglich!");
	mysql_select_db($db) or die ("Die Datenbank ist nicht erreichbar!");	
?>
