<?php
namespace CV\Model\Database;

use CV\Model\ModelAccessor;
use CV\Control\Filter;
use CV\Model\EntityWriter;

class UFs extends ModelAccessor
{
	
	public function getAll()
	{
		$stmt = $this->container->db->prepare("SELECT id, sigla, nome FROM cv2_localizacoes_ufs ORDER BY nome ASC");
		$stmt->execute();
		
		return $stmt->fetchAll();
	}
	
}