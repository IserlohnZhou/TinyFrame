<?php

class LoginController extends Controller {
	function index() {
		return $this->_view->render();
	}

	function checklogin() {
		$users = new UsersModel;
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		var_dump($users->where("password = '{$password}' AND username= '{$username}'")->select_all());
		//header("Location:/login");
	}
}