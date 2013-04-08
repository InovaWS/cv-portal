<?php
namespace CV\Model;

use Pimple\Pimple;

use Rio\Model\ModelAccessor;

class Entity extends ModelAccessor
{
	
	protected $entityRepository;
	private $pimple;
	
	public function __construct()
	{
		$this->pimple = new Pimple();
	}
	
	public function getEntityRepository()
	{
		return $this->entityRepository;
	}
	
	public function setEntityRepository(EntityRepository $entityRepository)
	{
		$this->entityRepository = $entityRepository;
	}
	
	public function initialize(&$that)
	{
		
	}
	
	public function __isset($name)
	{
		return isset($this->pimple[$name]);
	}
	
	public function __unset($name)
	{
		unset($this->pimple[$name]);
	}
	
	public function __get($name)
	{
		return $this->pimple[$name];
	}
	
	public function __set($name, $value)
	{
		$this->pimple[$name] = $value;
	}
	
	public function data()
	{
		$return = array();
		
		foreach ($this->pimple->keys() as $key) {
			$value = $this->pimple->raw($key);
			if (!($value instanceof \Closure))
				$return[$key] = $value;
		}
		
		return $return;
	}
	
}