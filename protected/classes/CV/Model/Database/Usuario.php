<?php
namespace CV\Model\Database;

use Rio\Model\Entity;

class Usuario extends Entity
{
	
	public static $_table = 'cv2_usuarios';
	
	public function vendedor()
	{
		return $this->belongsTo('CV\Model\Database\Vendedor', 'id_vendedor')->findOne();
	}
	
}