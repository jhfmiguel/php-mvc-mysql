<?php

namespace FrameworkAULA\Data;

use\PDO;

abstract class Model{

	private $_pdo;
	protected $table;

	public function __construct(){
		$this->setPDO();
	}

	private function setPDO(){
	/* BANCO DE DADOS SERVIDOR LOCAL XAMPP	
	$this->_pdo = new PDO("mysql:host=127.0.0.1; dbname=php_mvc", "root", "");   */

	$this->_pdo = new PDO("mysql:host=mysql552.umbler.com; dbname=php_mvc", "hugofreitas", "Senhahospedagem");

	}
	

	

	public function insert(array $campos_values){

		$campos_array = array_keys($campos_values);
		$values_array = array_values($campos_values);

		$insert_campos = implode(",", $campos_array);
		$insert_values = implode("','", $values_array);
		
		$r = $this->_pdo->prepare("INSERT INTO {$this->table} ({$insert_campos}) VALUES ('{$insert_values}')");

		$r->execute();
		return $this->_pdo->lastInsertId();


	}

	public function read($campos = "*", $where=null){
		$where_sql = empty($where) ? "": "WHERE ".$where;
		$r = $this->_pdo->prepare("SELECT {$campos} FROM $this->table {$where_sql}");
			$r->execute();
			return $r->fetchAll();
	}

	public function update(array $campos_values, $where){
		$where_sql = empty($where) ? "": "WHERE ".$where;
		$sql_text_array = array();
		foreach($campos_values as $campo => $valor){
			array_push($sql_text_array, "{$campo}='$valor'");
			}
			$sql_text = implode(",", $sql_text_array);

			$r = $this->_pdo->prepare("UPDATE {$this->table} SET {$sql_text} {$where_sql}");
			$r->execute();
			return $r->rowCount();
	}

	public function delete($where_sql){
		if(!empty($where_sql)){
		$r = $this->_pdo->prepare("DELETE FROM $this->table WHERE {$where_sql}");
			$r->execute();
			return $r->rowCount();
			}

			return 0;
	}

}

?>