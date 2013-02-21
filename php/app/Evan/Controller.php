<?php
namespace Evan;

use Slim\Slim;

abstract class Controller
{
	
	public static function create($controller)
	{
		$class = "\\Evan\\Controller\\" . str_replace(' ', '', ucwords(str_replace('-', ' ', $controller))) . 'Controller';
		
		if (class_exists($class))
			return new $class();
		else
			return null;
	}
	
	protected $app;
	
	public function setApp(Slim $app)
	{
		$this->app = $app;
	}
	
	public function getApp()
	{
		return $this->app;
	}
	
	public function invoke($httpMethod, $action, $parameters)
	{
		$methodName = strtolower($httpMethod) . str_replace(' ', '', ucwords(str_replace('-', ' ', $action))) . 'Action';
		$callback = array($this, $methodName);
		
	  if (is_callable($callback)) {
			$this->beforeInvoke();
			call_user_func_array($callback, $parameters);
			$this->afterInvoke();
		}
		else
			$this->app->notFound();
	}
	
	protected function beforeInvoke() {}
	protected function afterInvoke() {}
	
	protected abstract function getIndexAction();
	
}