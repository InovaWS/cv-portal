<?php
namespace CV\Control;

use Slim\Middleware;

class CallableMiddleware extends Middleware
{
	
	private $callable;
	
	public function __construct($callable)
	{
		$this->callable = $callable;
	}
	
	public function call()
	{
		return call_user_func($this->callable, $this);
	}
	
}