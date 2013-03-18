<?php
namespace Rio\Model;

abstract class ModelAccessor
{
	
	protected $container;
	
	public function setContainer(ModelContainer $container)
	{
		$this->container = $container;
	}
	
	public function getContainer()
	{
		return $this->container;
	}
	
}