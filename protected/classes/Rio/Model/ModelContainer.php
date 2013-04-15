<?php
namespace Rio\Model;

use Pimple\Pimple;

class ModelContainer extends Pimple
{
	public function appendAccessor($id, $accessor, array $ctorArgs = array())
	{
		$container = &$this;
		
		if (is_string($accessor)) {
			$closure = function() use($accessor, $ctorArgs, &$container) {
				$classReflection = new \ReflectionClass($accessor);
				$accessor = $classReflection->newInstanceArgs($ctorArgs);
				$accessor->setContainer($container);
				return $accessor;
			};
		}
		elseif (is_object($accessor) && $accessor instanceof ModelAccessor) {
			$closure = function() use($accessor, &$container) {
				$accessor->setContainer($container);
				return $accessor;
			};
		}
		else
			throw new \InvalidArgumentException();
		
		$this->offsetSet($id, ModelAccessor::share($closure));
	}
	
	public function __isset($var) {	return $this->offsetExists($var); }
	public function __unset($var) { return $this->offsetUnset($var); }
	public function __get($var) { return $this->offsetGet($var); }
	public function __set($var, $value) { return $this->offsetSet($var, $value); }
}