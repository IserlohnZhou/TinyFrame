<?php

class AdminController extends Auth {
	function index() {
		return $this->_view->render();
	}

}