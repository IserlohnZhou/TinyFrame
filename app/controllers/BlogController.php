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
		$Comments = new CommentsModel;
		$users = new UsersModel;
		$req = $Articles->where("state = 1 AND id = {$id}")->select_one();;
		$user = $users->select($req['user_id'])['username'];
  		$req['username'] = $user;
		$this->assign('article', $req);
		$req = $Comments->where("article_id = {$id}")->select_all();
		$this->assign('comments',$req);
		if (count($req) == 0) {
			$comment_title="";
		}else if(count($req) == 1) {
			$comment_title="1 Comment";
		}else {
			$comment_title=count($req)." Comments";
		}
		$this->assign('comment_title',$comment_title);
		return $this->_view->render();
	}

	function search() {
		$Articles = new ArticlesModel;
		$users = new UsersModel;
		$str=$_REQUEST['str'];
		$req = $Articles->where("state = '1' AND ( title LIKE '%%{$str}%%' OR body LIKE '%%{$str}%%' )")->select_all();
		for ($i=0; $i<=count($req)-1; $i++) {
  			$user = $users->select($req[$i]['user_id'])['username'];
  			$req[$i]['username'] = $user;
		}
		$this->assign('articles', $req);
		return $this->_view->render();

	}

	function comment_store() {
		$Comments = new CommentsModel;
		$comment['nickname'] = $_REQUEST['nickname'];
		$comment['content'] = $_REQUEST['content'];
		$comment['article_id'] = $_REQUEST['article_id'];
		$Comments->insert($comment);
		$this->redirect('/blog/show/'.$_REQUEST['article_id']);
	}

}