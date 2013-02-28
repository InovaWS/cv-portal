<?php
namespace CV\Model;

class Container
{
	
	private $callbacks = array();
	
	public function __set($name, $callback)
	{
		if (!is_callable($callback))
			throw new Exception();
		$this->callbacks[$name] = $callback;
	}
	
	public function __get($name)
	{
		if (array_key_exists($name, $this->callbacks))
			return $this->callbacks[$name]($this);
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