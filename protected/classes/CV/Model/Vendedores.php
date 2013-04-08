<?php
namespace CV\Model\Database;

use \RuntimeException;
use CV\Control\Filter;
use CV\Model\ModelAccessor;
use Slim\Slim;
use Mail\Mail;
use Mail\Mailer;
use CV\Model\MailSender;
use CV\Model\EntityWriter;

class Vendedores extends ModelAccessor
{
	
	public function existe(array $params)
	{
		$whereParams = array();
		foreach ($params as $key => $value)
			$whereParams[] = "$key=:$key";
	
		$query = $this->container->db->prepare(
				"SELECT
				COUNT(id) AS count
			FROM
				cv2_vendedores" .
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
		foreach ($params as $key => $value)
			$whereParams[] = "$key=:$key";
	
		$query = $this->container->db->prepare(
			"SELECT
				id,
				nome,
				nome_fantasia,
				razao_social,
				cpf,
				cnpj,
				celular,
				telefone,
				data,
				email,
				id_tipo,
				bloqueado
			FROM
				cv2_vendedores" .
				(count($whereParams) >0 ?
						(" WHERE " . implode(' AND ', $whereParams)) :
						''
				)
		);
		$query->execute($params);
	
		return $query->fetch();
	}
	
	public function salvar(&$vendedor)
	{
		EntityWriter::create($this->container->db)
		            ->persist($vendedor)
		            ->onTable('cv2_vendedores')
		            ->withFields('id', 'nome', 'nome_fantasia', 'razao_social', 'cpf', 'cnpj',
		                         'celular', 'telefone', 'data', 'email', 'id_tipo', 'bloqueado')
		            ->now();
	}
}