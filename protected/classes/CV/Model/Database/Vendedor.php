<?php
namespace CV\Model\Database;

use Rio\Model\Entity;

class Vendedor extends Entity
{
	
	public static $_table = 'cv2_vendedores';
	
	public function tipo()
	{
		return $this->getDatabaseConnection()->table('cv2_tipos_vendedores')->findOne($this->id_tipo);
	}
	
	public function enderecos()
	{
		return $this->hasMany('endereco', 'id_vendedor');
	}
	
}