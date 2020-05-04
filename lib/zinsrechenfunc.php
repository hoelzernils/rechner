<?php
use MathPHP\Finance;
	class zinsrechenf{
		public function zinsrechenfunc($rate, $payment, $periods, $present_value) {
		//Variablen übernehmen aus Formular
        $rate=$rate/12;
        $beginning="false";	
        //twig
		$loader = new \Twig\Loader\FilesystemLoader('./template');
		$twig = new \Twig\Environment($loader);
        $Validation = new validation();


        //wenn alle Angaben innerhalb der Richtlinien sind, dann absenden
        if($Validation->numval($rate) && $Validation->numval($payment) && $Validation->numval($present_value) && $Validation->numval($periods)) {
            $ergebnis2 = Finance::fv($rate, $periods, $payment, $present_value, $beginning);
            $ergebnis2*=-1;
            //einbinden des Augabeformulars
            echo $twig->render('/ergebnis-tpl.php.twig', ['ergebnis2' => $ergebnis2]);
        }
        //sonst Fehlerformular
        else{
        echo $twig->render('/loan-error-tpl.php.twig');
        }

		}
    }