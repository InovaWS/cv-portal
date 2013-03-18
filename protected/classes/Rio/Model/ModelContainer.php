<?php
namespace Rio\Model;

use Pimple\Pimple;

class ModelContainer
{
	
	private $container;
	
	public function __construct()
	{
		$this->container = new Pimple();
	}
	
	public function getContainer()
	{
		return $this->container;
	}
	
	public function appendModelAccessor($var, $className)
	{
		$this->container[$var] = Pimple::share(function($container) use($className) {
			$modelAccessor = new $className();
			$modelAccessor->setContainer($container);
			return $modelAccessor;
		});
	}
	
	public function __isset($var)
	{
		return $this->container->offsetExists($var);
	}
	
	public function __unset($var)
	{
		return $this->container->offsetUnset($var);
	}
	
	public function __get($var)
	{
		return $this->container->offsetGet($var);
	}
	
	public function __set($var, $value)
	{
		return $this->container->offsetSet($var, $value);
	}
}