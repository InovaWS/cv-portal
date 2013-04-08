<?php
namespace CV\Model;

class TiposDeVeiculos extends EntityRepository
{
	
	public function exists($id)
	{
		$stmt = $this->container->db->query("SELECT COUNT(id) AS count FROM cv2_veiculos_tipos WHERE id=:id");
		$stmt->bindValue('id', $id);
		$stmt->execute();
		
		return $stmt->fetchObject()->count > 0;
	}
	
	public function get($id)
	{
		$stmt = $this->container->db->query("SELECT id, descricao FROM cv2_veiculos_tipos WHERE id=:id");
		$stmt->bindValue('id', $id);
		$stmt->execute();
		
		return $stmt->fetchEntity($stmt, 'CV\Model\TipoDeVeiculo');
	}
	
	public function getAll()
	{
		$stmt = $this->container->db->query("SELECT id, descricao FROM cv2_veiculos_tipos ORDER BY id ASC");
		$stmt->execute();
		
		return $this->fetchEntities($stmt, 'CV\Model\TipoDeVeiculo');
	}
	
}