<?php
namespace Rio\Model;

use Pimple\Pimple;

class ModelContainer extends Pimple
{
	public function appendAccessor($var, $className)
	{
		$this[$var] = Pimple::share(function($container) use($className) {
			$modelAccessor = new $className();
			$modelAccessor->setContainer($container);
			return $modelAccessor;
		});
	}
	
	public function __isset($var)
	{
		return $this->offsetExists($var);
	}
	
	public function __unset($var)
	{
		return $this->offsetUnset($var);
	}
	
	public function __get($var)
	{
		return $this->offsetGet($var);
	}
	
	public function __set($var, $value)
	{
		return $this->offsetSet($var, $value);
	}
}