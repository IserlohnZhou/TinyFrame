<?php

class Articles_tagsController extends Auth {
	function store($param) {
		$param = explode('&', $param);
		$Articles_Tags = new Articles_tagsModel;
		$req['tag_id'] = $param[0];
		$req['article_id'] = $param[1];
		$Articles_Tags->insert($req);
		$this->redirect("/tags");
	}

	function delete($param) {
		$param = explode('&', $param);
		$Articles_Tags = new Articles_tagsModel;
		$req['tag_id'] = $param[0];
		$req['article_id'] = $param[1];
		$col = $Articles_Tags->where("tag_id = ".$param[0])->where("article_id = ". $param[1])->where("state = 1")->select_one();	
		$req['state'] = 0;
		$Articles_Tags->update($req, $col['id']);
		$this->redirect("/tags");
	}

}