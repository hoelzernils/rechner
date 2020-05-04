<?php

// einbinden der Programmlogik
require_once('./vendor/autoload.php');
include('./lib/rechner.php');
include('./lib/rechenfunc.php');
include('./lib/zinsrechenfunc.php');
include('./lib/validation.php');
use MathPHP\Finance;

//twig
$loader = new \Twig\Loader\FilesystemLoader('./template');
$twig = new \Twig\Environment($loader);

//Formularauswahl
if($_POST["submit"] == '') { 
	switch($_GET['var']) {
		case 'r': 
			echo $twig->render('/formular-tpl.php.twig'); break;
		case 'zinsr':
			echo $twig->render('/loan-tpl.php.twig'); break;
		case '':
			echo $twig->render('/formular-tpl.php.twig'); break;
		}
}

// Wurde das Rechenformular abgesendet, dann Ergebnis berechnen
if($_POST["submit"] == 'go') {

	//Rechenformular
	if($_GET['var'] == 'r' OR $_GET['var'] == ''){
		$Rechenfunc = new rechenf();
		$Rechenfunc->rechenfunc($_POST["zahl1"], $_POST["operator"], $_POST["zahl2"]);
	}
	
	//Zinsperiodenformular 
	if($_GET['var'] == 'zinsr') {
		$Zinsrechenfunc = new zinsrechenf();
		$Zinsrechenfunc->zinsrechenfunc($_POST["rate"], $_POST["kzahlung"], $_POST["anzahl"], $_POST["zahlung"]);
	}
}




