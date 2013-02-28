<?php
namespace CV\Model\Database;

use CV\Model\DatabaseAccessor;

class Usuarios extends DatabaseAccessor
{
	
	public function existe(array $params)
	{
		$whereParams = array();
		foreach ($params as $key => $value)
			$whereParams[] = "$key=:$key";
		
		$query = $this->db->prepare(
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
		
		return $query->fetchObject()->count > 1;
	}
	
}