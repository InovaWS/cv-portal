<?php
namespace CV\Model;

use CV\Model\EntityRepository;

class UFs extends EntityRepository
{
	
	public function getAll(array $params = array())
	{
		$stmt = $this->container->db->prepare("SELECT id, sigla, nome FROM cv2_localizacoes_ufs ORDER BY nome ASC");
		$stmt->execute();
		
		return $this->fetchEntities($stmt, 'CV\Model\UF');
	}
	
	public function get($id)
	{
		$stmt = $this->container->db->prepare(
		"SELECT id, sigla, nome FROM cv2_localizacoes_ufs WHERE id=:id ORDER BY nome ASC");
		$stmt->bindValue('id', $id);
		$stmt->execute();
	
		return $this->fetchEntity($stmt, 'CV\Model\UF');
	}
	
}