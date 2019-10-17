<?php
namespace Core;

class Model {

	protected $db;

	public function __construct() {
		global $db;
		$this->db = $db;
  }

  public function simpleSelect($table, $orderField = 'id', $order = 'ASC'):array{
    $array = array();
    $sql = "SELECT * FROM ".$table." ORDER BY ".$orderField." ".$order;
    $sql = $this->db->query($sql);
    if($sql->rowCount() > 0){
      $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
		return $array;
  }

  public function simpleSelectFields($table, $fields = array(), $order = 'ASC'):array{
    $array = array();
    $sql = "SELECT ".implode(',',$fields)." FROM ".$table." ORDER BY id ".$order;
    $sql = $this->db->query($sql);
    if($sql->rowCount() > 0 ){
      $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
		return $array;
  }

  public function simpleGetId($table, $fields = array(), $find=array()):array{
    $array = array();
    $campo='';
    $valor='';
    foreach($find as $k=>$v){
      $campo .= $k;
      $valor .=$v;
    }
    $sql = "SELECT ".($fields != '*' ? implode(',', $fields) : '*')." FROM ".$table." WHERE ".$campo."=:".$campo."";
    $sql = $this->db->prepare($sql);
    $sql->bindValue($campo, $valor);
    $sql->execute();

    if($sql->rowCount() > 0){
      $array = $sql->fetch(\PDO::FETCH_ASSOC);
    }

    return $array;
  }

  public function deleteByID($table, $id):void{
    $sql = "DELETE FROM ".$table." WHERE id=:id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->execute();
  }

  public function deleteFieldName($table, $field, $fieldBind, $value):void{
    $sql = "DELETE FROM ".$table." WHERE ".$field." = :".$fieldBind."";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":".$fieldBind, $value);
    $sql->execute();
  }

}
