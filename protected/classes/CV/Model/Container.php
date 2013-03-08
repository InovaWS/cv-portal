<?php
namespace CV\Model;

class Container
{
	
	private $objects = array();
	
	public function __set($name, $object)
	{
		$this->objects[$name] = $object;
	}
	
	public function __get($name)
	{
		if (array_key_exists($name, $this->objects)) {
			if (is_callable($this->objects[$name]))
				return $this->objects[$name]($this);
			else
				return $this->objects[$name];
		}
		else
			return null;
	}
	
	public static function share($callback)
	{
		if (!is_callable($callback))
			throw new Exception();
		
		return function ($container) use($callback) {
			static $value;
			
			if (null === $value)
				$value = $callback($container);
			
			return $value;
		};
	}
	
	public static function protect($callback)
	{
		return function ($container) use ($callback) {
			return $callback;
		};
	}
	
}