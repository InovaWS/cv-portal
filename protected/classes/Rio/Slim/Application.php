<?php
namespace Rio\Slim;

use Rio\Prototype;

class Application extends \Slim\Slim
{
	private $model = null;
	
	public function model(\Model $model)
	{
		if ($model)
			$this->model = $model;
		
		return $this->model;
	}
	
}