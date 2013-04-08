<?php
namespace CV\Model;

use Pimple\Pimple;

use Rio\Model\ModelAccessor;

class Veiculos extends EntityRepository
{
	
	public function initialize()
	{
		$that = &$this;
		
		$this->tipos = Pimple::share(function() use(&$that) {
			return $that->getContainer()->tiposDeVeiculos->getAll();
		});
	}	
}