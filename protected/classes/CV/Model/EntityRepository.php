<?php
namespace CV\Model;

use Pimple\Pimple;

use Rio\Model\ModelAccessor;

class EntityRepository extends ModelAccessor implements \ArrayAccess
{
	
	private $pimple;
	
	public function __construct()
	{
		$this->pimple = new Pimple();
		$this->initialize();
	}
	
	public function offsetExists($id) { return $this->exists($id); }
	
	public function offsetUnset($id) { return $this->remove($id); }
	
	public function offsetGet($id) { return $this->get($id); }
	
	public function offsetSet($id, $value) { return $this->set($id, $value); }
	
	public function __isset($name) { return isset($this->pimple[$name]); }
	public function __unset($name) { unset($this->pimple[$name]); }
	public function __get($name) { return $this->pimple[$name]; }
	public function __set($name, $value) { $this->pimple[$name] = $value; }
	
	public function initialize()
	{
		
	}
	
	public function exists($id)
	{
		
	}
	
	public function remove($id)
	{
		
	}
	
	public function restore($id)
	{
		
	}
	
	public function get($id)
	{
		
	}
	
	public function getAll(array $params = array())
	{
	}
	
	public function set($id, $value)
	{
		
	}
	
	public function validate($value)
	{
		
	}
	
	public function inject(&$value, $src)
	{
		
	}
	
	public function fetchEntity(\PDOStatement $statement, $className)
	{
		$data = $statement->fetch(\PDO::FETCH_ASSOC);
		
		if (!$data)
			return false;
		
		$entity = new $className;
		
		foreach ($data as $key => $value)
			$entity->$key = $value;
			
		$entity->setContainer($this->container);
		$entity->setEntityRepository($this);
		$entity->initialize($entity);
		
		return $entity;
	}
	
	public function fetchEntities(\PDOStatement $statement, $className)
	{
		$return = array();
		
		while (($entity = $this->fetchEntity($statement, $className)) !== false)
			$return[] = $entity;
		
		return $return;;
	}
	
}