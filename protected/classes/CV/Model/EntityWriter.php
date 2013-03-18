<?php
namespace CV\Model;

use CV\Control\Filter;
class EntityWriter
{
	
	private $db;
	private $entity = null;
	private $table = null;
	private $id = null;
	private $array = null;
	
	private function __construct(\PDO $db)
	{
		$this->db = $db;
	}
	
	public function persist(&$entity)
	{
		$this->entity = &$entity;
		if (is_object($entity))
			$this->array = get_object_vars($entity);
		elseif (is_array($entity))
			$this->array = $entity;
		else
			$this->array = array();
		
		return $this;
	}
	
	public function onTable($table)
	{
		$this->table = $table;
		
		return $this;
	}
	
	public function withFields()
	{
		$filter = Filter::create($this->array);
		call_user_func_array(array($filter, 'fields'), func_get_args());
		$this->array = $filter->crop()->data();
		
		if (isset($this->array['id'])) {
			$this->id = $this->array['id'];
			unset($this->array['id']);
		}
		
		return $this;
	}
	
	public function now()
	{
		if (isset($this->id)) {
			$setParams = array();
			foreach ($this->array as $key => $value)
				$setParams[] = "$key=:$key";
			
			$stmt = $this->db->prepare(
				"UPDATE $this->table SET " . implode(', ', $setParams) . " WHERE id=:id"
			);
			$stmt->bindValue('id', $this->id);
		}
		else
		{
			$fields = array_keys($array);
			$stmt = $this->db->prepare(
				"INSERT INTO $this->table(" . implode(', ', $fields) . ") VALUES(" .
					implode(', ', array_map(function($value) { return ":$value"; }, $fields)) . ")"
			);
		}
		
		foreach ($this->array as $key => $value) {
			$type = \PDO::PARAM_STR;
			if (is_bool($value))
				$type = \PDO::PARAM_INT; // mysql fix
			elseif (is_integer($value))
				$type = \PDO::PARAM_INT;
			$stmt->bindValue($key, $value, $type);
		}
		
		$stmt->execute();
		
		if (empty($this->id)) {
			$this->id = $this->db->lastInsertId();
			$this->entity->id = $this->id;
		}
		
		return $this->entity;
	}
	
	public static function create(\PDO $db)
	{
		return new EntityWriter($db);
	}
	
}