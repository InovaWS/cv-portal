<?php
namespace CV\Model\Database;

use Rio\Model\ModelAccessor;

class Veiculos extends ModelAccessor
{
	
	public function tipos()
	{
		return $this->container->db->query("SELECT * FROM cv2_veiculos_tipos ORDER BY id ASC")->fetchAll(\PDO::FETCH_OBJ);
	}
	
}