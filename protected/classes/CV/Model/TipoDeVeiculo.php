<?php
namespace CV\Model;

use Pimple\Pimple;

class TipoDeVeiculo extends Entity
{
	
	public function initialize(&$that)
	{
		$this->marcas = Pimple::share(function() use(&$that) {
			return $that->getContainer()->marcas->getAll(array('id_tipo' => $that->id));
		});
	}
}