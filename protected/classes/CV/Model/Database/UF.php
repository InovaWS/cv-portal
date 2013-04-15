<?php
namespace CV\Model\Database;

use Rio\Model\Entity;

class UF extends Entity
{
	public static $_table = 'cv2_localizacoes_ufs';
	public static $_primaryKey = 'id';
	
	public function cidades()
	{
		return $this->hasMany('cidade', 'id_uf');
	}
}