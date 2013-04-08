<?php
namespace CV\Model;

use Rio\Model\ModelAccessor;

class Usuarios extends ModelAccessor
{
	
	public function existe(array $params)
	{
		$whereParams = array();
		foreach ($params as $key => $value) {
			if ($key == 'key')
				$whereParams[] = "CONCAT(id_vendedor, md5(senha))=:$key";
			else
				$whereParams[] = "$key=:$key";
		}
		
		$query = $this->container->db->prepare(
			"SELECT
				COUNT(id) AS count
			FROM
				cv2_usuarios" .
			(count($whereParams) >0 ?
				(" WHERE " . implode(' AND ', $whereParams)) :
				''
			)
		);
		$query->execute($params);
		
		return $query->fetchObject()->count > 0;
	}
	
	public function get(array $params)
	{
		$whereParams = array();
		foreach ($params as $key => $value) {
			if ($key == 'key')
				$whereParams[] = "CONCAT(id_vendedor, md5(senha))=:$key";
			else
				$whereParams[] = "$key=:$key";
		}
	
		$query = $this->container->db->prepare(
			"SELECT
				id,
				usuario,
				senha,
				nome,
				data_entrada,
				data_saida,
				status,
				id_vendedor,
				id_grupos_usuarios,
				tipo
			FROM
				cv2_usuarios" .
				(count($whereParams) >0 ?
						(" WHERE " . implode(' AND ', $whereParams)) :
						''
				)
		);
		$query->execute($params);
	
		return $query->fetch();
	}
	
	public function salvar(&$usuario)
	{
		EntityWriter::create($this->container->db)
		              ->persist($usuario)
		              ->onTable('cv2_usuarios')
		              ->withFields('id', 'usuario', 'senha',
          		                   'nome', 'data_entrada', 'data_saida', 'status',
                                   'id_vendedor', 'id_grupos_usuarios', 'tipo')
		              ->now();
	}
	
}