<?php

class BlogController extends Controller {
	function index() {
		$Articles = new ArticlesModel;
		$users = new UsersModel;
		$req = $Articles->where("state = '1'")->select_all();
		for ($i=0; $i<=count($req)-1; $i++) {
  			$user = $users->select($req[$i]['user_id'])['username'];
  			$req[$i]['username'] = $user;
		}
		$this->assign('articles', $req);
		return $this->_view->render();
	}

	function show($id) {
		$Articles = new ArticlesModel;
		$users = new UsersModel;
		$req = $Articles->select($id);
		$user = $users->select($req['user_id'])['username'];
  		$req['username'] = $user;
		$this->assign('article', $req);
		return $this->_view->render();
	}

}