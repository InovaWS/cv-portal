<?php
namespace CV\Model;

abstract class ModelAccessor
{
	protected $container;
	
	public function setContainer($container)
	{
		$this->container = $container;
	}
	
	public function getContainer()
	{
		return $this->container;
	}
	
}