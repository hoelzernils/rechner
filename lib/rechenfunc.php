<?php
	class rechenf{
		public function rechenfunc($zahl1, $operator, $zahl2) {
			//twig
		$loader = new \Twig\Loader\FilesystemLoader('./template');
		$twig = new \Twig\Environment($loader);
		$Validation = new validation();

		//wenn alle Angaben innerhalb der Richtlinien sind, dann absenden
		if($Validation->numval($zahl1) && $Validation->opval($operator) && $Validation->numval($zahl2)) {
			$Rechner = new rechner();
			$ergebnis2 = $Rechner->rechnen($zahl1, $operator, $zahl2);

			//einbinden des Augabeformulars
            echo $twig->render('/ergebnis-tpl.php.twig', ['ergebnis2' => $ergebnis2]);
		}
		//Wenn nicht alle Angaben innerhalb der Richtlinien sind
		else {
			echo $twig->render('./formular-error-tpl.php.twig');
			}
		}
    }