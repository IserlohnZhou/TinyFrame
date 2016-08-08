<?php

class CommentsController extends Auth {
	function index() {
		$Comments = new CommentsModel;
		$req = $Comments->where("state = '1'")->select_all();
		$this->assign('comments', $req);
		return $this->_view->render();
	}

	function update($id) {
		$Comments = new CommentsModel;
		$comment['nickname'] = $_REQUEST['nickname'];
		$comment['email'] = $_REQUEST['email'];
		$comment['website'] = $_REQUEST['website'];
		$comment['content'] = $_REQUEST['content'];
		$Comments->update($comment, $id);
		$this->redirect('/comments');
	}

	function delete($id) {
		$Comments = new CommentsModel;
		$comment['state'] = 0;
		$Comments->update($comment, $id);
		$this->redirect("/comments");
	}

}