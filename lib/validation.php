<?php
class validation {
	public function numval($num) {
		if(is_numeric($num)) {
			return true;
		}
		else {
			return false;
		}
	}

	public function opval($op) { 
		if($op == '+' || $op == '-' || $op == '*' || $op == '/') {
			return true;
		}
		else {
			return false;
		}
	}

}

