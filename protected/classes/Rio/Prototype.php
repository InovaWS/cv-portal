<?php
namespace Rio;

class Prototype extends \Pimple
{
	
	public function __isset($id) { return $this->offsetExists($id); }
	public function __unset($id) { return $this->offsetUnset($id); }
	public function __get($id) { return $this->offsetGet($id); }
	public function __set($id, $value) { return $this->offsetSet($id, $value); }
	
	public static function create(array $values = array())
	{
		return new self($values);
	}
	
	public function values()
	{
		$return = array();
		$keys = $this->keys();
		
		foreach ($keys as $key)
			$return[$key] = $this->offsetGet($key);
		
		return $return;
	}
	
}