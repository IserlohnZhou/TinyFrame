<?php

class ArticlesController extends Auth {
	function index() {
		$Articles = new ArticlesModel;
		$req = $Articles->where("state = '1'")->select_all();
		$this->assign('articles', $req);
		return $this->_view->render();
	}

	function create() {	
		return $this->_view->render();
	}

	function store() {
		$Articles = new ArticlesModel;
		$article['title'] = $_REQUEST['title'];
		$article['body'] = $_REQUEST['body'];
		$article['user_id'] = $_SESSION['user_id'];
		$article['cover_path'] = Common::upload_file($article['user_id']);
		$Articles->insert($article);
		$this->redirect('/articles');
	}

	function edit($id) {
		$Articles = new ArticlesModel;
		$req = $Articles->select($id);
		$this->assign('article', $req);
		return $this->_view->render();
	}

	function update($id) {
		$Articles = new ArticlesModel;
		$article['title'] = $_REQUEST['title'];
		$article['body'] = $_REQUEST['body'];
		$article['user_id'] = $_SESSION['user_id'];
		$article['cover_path'] = Common::upload_file($article['user_id']);
		$Articles->update($article, $id);
		$this->redirect('/articles');
	}

	function delete($id) {
		$Articles = new ArticlesModel;
		$article['state'] = 0;
		$Articles->update($article, $id);
		$Comments = new CommentsModel;
		$comments = $Comments->where("article_id = {$id}")->select_all();
		foreach ($comments as $comment) {
			$comment['state'] = 0;
			$Comments->update($comment, $comment['id']);
		}
		$this->redirect("/articles");
	}

}