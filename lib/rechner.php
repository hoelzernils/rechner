<?php

class rechner {

   public function rechnen($zahl1, $operator, $zahl2 ) {
	$ergebnis = 0;
	switch($operator) {
	  case '+':
		$ergebnis = $zahl1 + $zahl2;
		break;
	  case '-':
		$ergebnis = $zahl1 - $zahl2;
		break;
	  case '*':
		$ergebnis = $zahl1 * $zahl2;
		break;
	  case '/':
		$ergebnis = $zahl1 / $zahl2;
	  	break;
	  default:
		$ergebnis="nicht bestimmbar";
	}

	return $ergebnis;
   }

}

