<?php

class Auth extends Controller {
	function __construct($controller,$action) {
		if (!isset($_SESSION['username'])) {
			$this->redirect("/login");
		} 
		else {

		}
		parent::__construct($controller,$action);
    }

	function __destruct() {

    }

}