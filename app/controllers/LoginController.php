<?php

class LoginController extends Controller {
	function index() {
		return $this->_view->render();
	}

	function checklogin() {
		$users = new UsersModel;
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		$captcha=$_REQUEST['captcha'];
		$req = $users->where("password = '{$password}' AND username= '{$username}'")->select_one();

		$errflag=0;

		if (!preg_match('/^[a-zA-Z0-9][a-zA-Z0-9_]{1,19}$/',$username)) {
			$_SESSION['username_err']="Username was illegal";
			$errflag=1;
		}

		if (!preg_match('/^[a-zA-Z0-9]{5,}$/',$password)) {
			$_SESSION['password_err']="Password was illegal";
			$errflag=1;
		}

		if (($captcha != $_SESSION['verification'])||(!preg_match('/^[a-zA-Z0-9]{4}$/',$captcha))) {
			$_SESSION['captcha_err'] = "Captcha was wrong";
			$errflag = 1;
		}

		if ($req == NULL) {
			$_SESSION['login_err'] = "Username or password was wrong!";
			$errflag = 1;
		}
		if ($errflag == 0) {
			$_SESSION['username'] = $username;
			$_SESSION['user_id'] = $req['id'];
			$this->redirect("/admin");
		}
		else {
			$this->redirect("/login");			
		}
	}

	function logout() {
		unset($_SESSION['username']);
		unset($_SESSION['user_id']);
  		//session_destroy();
		$this->redirect("/login");
	}
}