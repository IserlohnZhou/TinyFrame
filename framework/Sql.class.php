<?php

class Sql {
  private $_dbType = 'mysql';  
  private $_host = "localhost";
  private $_port = 3306;
  private $_user = "root";
  private $_pass = "root";
  private $_dbName = ""; //数据库名
  private $_sql = ''; //最后一条sql语句
  private $_where = '1';
  private $_order = '';
  private $_limit = '';
  private $_field = '*';
  private $_join = ''; 
  private $_lastsql = '';
  private $_con = NULL;
  private $_id = NULL;

  public function __construct() {
    class_exists('PDO') or die("PDO: class not exists.");

    //$this->connect($this->_host,$this->_user,$this->_pass,$this->_dbName);
  }

  public function connect($host,$user,$pass,$db) {
    $con=mysql_connect($host,$user,$pass);
    $this->_con=$con;
    $sql = 'use ' . $db;
    $this->query($sql);
  }

  public function fetch_all($sql) {
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

  public function fetch_one($sql) {
    $rs = $this->query($sql);
    if (!$rs) {
      return false;
    }
    return mysql_fetch_assoc($rs);
  }

  public function where($sql) {
    $this->_where = "({$this->_where}) AND ".$sql;
    return $this;
  }

  public function select_all() {
    $sql = sprintf("select * from %s %s where %s" , $this->_table, $this->_join, $this->_where);
    return $this->fetch_all($sql);
  } 

  public function select_one() {
    $sql = sprintf("select * from %s where %s" , $this->_table, $this->_where);
    return $this->fetch_one($sql);
  } 

  public function select($id) {
    $sql = sprintf("select * from `%s` where `id` = '%s'", $this->_table, $id);
    $this->_id = $id;
    return $this->fetch_one($sql);
  } 

  public function delete($id) {
    $sql = sprintf("delete from `%s` where `id` = '%s'", $this->_table, $id);
    $thsi->_id = NULL;
    return $this->query($sql);
  } 

  public function update($data, $id) {
    $sql = sprintf("update `%s` set %s where `id` = '%s'", $this->_table, $this->formatUpdate($data), $id);
    return $this->query($sql);
  } 

  public function insert($data) {
    $sql = sprintf("insert into `%s` %s", $this->_table, $this->formatInsert($data));
    return $this->query($sql);
  }


  public function query($sql) {
    $this->_lastsql = $sql;
    $this->_where = "1";
    $this->_join = ""; 
    return mysql_query($sql,$this->_con);
  }

  public function join($table,$col) {
    $this->_join = "inner join ".$table." on ".$col;
    return $this;
  }

  function execute($sql) {

  }

  public function close() {
    mysql_close($this->_con);
  }

  // 将数组转换成插入格式的sql语句
  private function formatInsert($data) {
    $fields = array();
    $values = array();
    foreach ($data as $key => $value) {
      $fields[] = sprintf("`%s`", $key);
      $values[] = sprintf("'%s'", $value);
    }

    $field = implode(',', $fields);
    $value = implode(',', $values);

    return sprintf("(%s) values (%s)", $field, $value);
  }

  // 将数组转换成更新格式的sql语句
  private function formatUpdate($data) {
    $fields = array();
    foreach ($data as $key => $value) {
      $fields[] = sprintf("`%s` = '%s'", $key, $value);
    }

    return implode(',', $fields);
  }
}