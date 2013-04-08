<?php
namespace CV\Model;

use Pimple\Pimple;

class UF extends Entity
{
	
	public function initialize(&$that)
	{
		$this->cidades = Pimple::share(function () use(&$that) {
			return $that->getContainer()->cidades->getAll(array('id_uf' => $that->id));
		});
	}
	
}