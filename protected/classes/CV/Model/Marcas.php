<?php
namespace CV\Model;

class Marcas extends EntityRepository
{
	
	public function getAll(array $params = array())
	{
		$params = array_merge(array('id_tipo' => null), $params);
		
		if ($params['id_tipo'] === null)
			$stmt = $this->getContainer()->db->prepare(
			"SELECT id, descricao, logomarca, id_tipo FROM cv2_veiculos_marcas ORDER BY descricao ASC");
		else {
			$stmt = $this->getContainer()->db->prepare(
			"SELECT id, descricao, logomarca, id_tipo FROM cv2_veiculos_marcas WHERE id_tipo=:id_tipo ORDER BY descricao ASC");
			$stmt->bindValue('id_tipo', $params['id_tipo'], \PDO::PARAM_INT);
		}
		$stmt->execute();
			
		return $this->fetchEntities($stmt, 'CV\Model\Marca');
	}
	
}