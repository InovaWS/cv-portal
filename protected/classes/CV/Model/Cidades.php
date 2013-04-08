<?php
namespace CV\Model;

use CV\Model\EntityRepository;

class Cidades extends EntityRepository
{
	
	public function getAll(array $params = array())
	{
		$params = array_merge(array('id_uf' => null), $params);
		
		if ($params['id_uf'] === null)
			$stmt = $this->container->db->prepare("SELECT id, nome, cep, id_uf FROM cv2_localizacoes_cidades ORDER BY nome ASC");
		else {
			$stmt = $this->container->db->prepare(
			"SELECT id, nome, cep, id_uf FROM cv2_localizacoes_cidades WHERE id_uf=:id_uf ORDER BY nome ASC");
			$stmt->bindValue('id_uf', $params['id_uf']);
		}
		$stmt->execute();
		
		return $this->fetchEntities($stmt, 'CV\Model\Cidade');
	}
	
}