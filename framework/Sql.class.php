<?php

class db_mysql {
  private static $_dbh = null; //静态属性,所有数据库实例共用,避免重复连接数据库
  private $_dbType = 'mysql';  
  private $_pconnect = true; //是否使用长连接
  private $_host = "localhost";
  private $_port = 3306;
  private $_user = "root";
  private $_pass = "root";
  private $_dbName = ""; //数据库名
  private $_sql = ''; //最后一条sql语句
  private $_where = '';
  private $_order = '';
  private $_limit = '';
  private $_field = '*';
  private $_clear = 0; //状态，0表示查询条件干净，1表示查询条件污染
  private $_trans = 0; //事务指令数 
  private $_con=NULL;

  public function __construct() {
      class_exists('PDO') or die("PDO: class not exists.");
      $this->_host = "localhost";
      $this->_port = 3306;
      $this->_user = "root";
      $this->_pass = "root";
      $this->_dbName = "TinyFrame";

     	//$this->connect($this->_host,$this->_user,$this->_pass,$this->_dbName);
  }

  private function connect($host,$user,$pass,$db){
  	$con=mysql_connect($host,$user,$pass);
  	$this->_con=$con;
    $sql = 'use ' . $db;
    $this->query($sql);
  }

	public function fetch_all($sql){
	  	$list = array();
  		$rs = $this->query($sql);
  		if (!$rs) {
   			return false;
  		}
  		while ($row = mysql_fetch_assoc($rs)) {
   			$list[] = $row;	
   		}
   		return $list;	
	}

	public function fetch_one($sql){
		$rs = $this->query($sql);
  		if (!$rs) {
   			return false;
 		}
  		return mysql_fetch_assoc($rs);
	}

  public function select_all(){
    $sql = sprintf("select * from `%s`", $this->table);
    return $this->fetch_all($sql);
  } 

  public function select($id){
    $sql = sprintf("select * from `%s` where `id` = '%s'", $this->_table, $id);
    return $this->fetch_one($sql);
  } 

  public function delete($id){
    $sql = sprintf("delete from `%s` where `id` = '%s'", $this->_table, $id);
    return $this->query($sql);
  } 
  
  function update($table,$data,$where){
		
	} 

	public function insert($data){
    $sql = sprintf("insert into `%s` %s", $this->_table, $this->formatInsert($data));
    return $this->query($sql);
	}


  public function query($sql){
		return mysql_query($sql,$this->_con);
	}

	function execute($sql){
		
	}

	public function close(){
		mysql_close($this->_con);
	}

}