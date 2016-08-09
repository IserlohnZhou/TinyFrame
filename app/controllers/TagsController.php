<?php

class TagsController extends Auth {
	function index() {
		$Articles = new ArticlesModel;
		$req = $Articles->where("state = 1")->select_all();
		$Tags = new TagsModel;
		$Articles_Tags = new Articles_tagsModel;
		$t = count($req);
		for ($i=0; $i<$t; $i++) { 
			$req[$i]['tags'] = $Articles_Tags->join("tags","articles_tags.tag_id = tags.id")->where("articles_tags.state = 1 AND article_id = ". $req[$i]['id'])->select_all();
			$req[$i]['addlist'] = $Tags->where("state = 1")->select_all();	
		}
		$this->assign('articles', $req);
		$req = $Tags->where("state = 1")->select_all();
		$this->assign('tags', $req);
		return $this->_view->render();
	}

	function add_new_tag() {
		$Tags = new TagsModel;
		$tag['tag_name'] = $_REQUEST['tag_name'];
		$tag['tag_desc'] = $_REQUEST['tag_desc'];
		$tag['user_id'] = $_SESSION['user_id'];
		$Tags->insert($tag);
		$this->redirect("/tags");
	}

	function delete($id) {
		$Tags = new TagsModel;
		$tag['state'] = 0;
		$Tags->update($tag, $id);
		$this->redirect("/tags");
	}

}