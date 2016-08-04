<?php

class ArticlesModel extends Model {
	function hasManyComments() {
		return $this->hasMany('Comments','article_id','id');
	}

}