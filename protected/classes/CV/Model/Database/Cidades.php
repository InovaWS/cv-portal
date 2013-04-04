<?php
namespace CV\Model\Database;

use CV\Model\ModelAccessor;
use CV\Control\Filter;
use CV\Model\EntityWriter;

class Cidades extends ModelAccessor
{
	
	public function getAll()
	{
		$stmt = $this->container->db->prepare("SELECT id, nome, cep, id_uf FROM cv2_localizacoes_cidades ORDER BY nome ASC");
		$stmt->execute();
		
		return $stmt->fetchAll();
	}
	
	public function getDoEstado($id_uf)
	{
		$stmt = $this->container->db->prepare("SELECT id, nome, cep, id_uf FROM cv2_localizacoes_cidades
				WHERE id_uf=:id_uf ORDER BY nome ASC");
		$stmt->execute(array('id_uf' => $id_uf));
	
		return $stmt->fetchAll();
	}
	
	public function getMany(array $params)
	{
		$whereParams = array();
		foreach ($params as $key => $value) {
			if ($key == 'key')
				$whereParams[] = "CONCAT(id_vendedor, md5(senha))=:$key";
			else
				$whereParams[] = "$key=:$key";
		}
		
		$stmt = $this->container->db->prepare("SELECT id, nome, cep, id_uf FROM cv2_localizacoes_cidades" .
				(count($whereParams) >0 ?
					(" WHERE " . implode(' AND ', $whereParams)) :
					''
				) .
				" ORDER BY nome ASC");
		$query->execute($params);
	
		return $stmt->fetchAll();
	}
	
}