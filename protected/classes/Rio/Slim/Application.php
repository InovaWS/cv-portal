<?php
namespace Rio\Slim;

use Slim\Slim;
use Pimple\Pimple;

class Application extends Slim
{
	
	private $container;
	
	public function __construct($userSettings = array())
	{
		parent::__construct($userSettings);
		$this->container = new Pimple();
	}
	
	public function getContainer()
	{
		return $this->container;
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
	
	public function raw($id)
	{
		return $this->container->raw($id);
	}
	
	public function share(\Closure $callable)
	{
		return Pimple::share($callable);
	}
	
	public function protect(\Closure $callable)
	{
		return Pimple::protect($callable);
	}
	
}