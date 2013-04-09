<?php
namespace CV\Model;

use Slim\Http\Request;

use Respect\Validation\Exceptions\ValidationException;

use Respect\Validation\Validator;

class Usuarios extends EntityRepository
{
	
	public function login($src)
	{
		if ($src instanceof Request) {
			$dados = (object)array(
				'login' => $src->post('login'),
				'senha' => $src->post('senha')
			);
		}
		elseif (is_array($src)) {
			$dados = (object)array(
				'login' => $src['login'],
				'senha' => $src['senha']
			);
		}
		elseif (is_object($src)) {
			$dados = (object)array(
				'login' => $src->login,
				'senha' => $src->senha
			);
		}
		else
			throw new \InvalidArgumentException();
		
		try {
			Validator
			::attribute('login', Validator::string()->notEmpty())
			->attribute('senha', Validator::string()->notEmpty())
			->assert($dados);
		}
		catch (ValidationException $exception) {
			throw new ModelException(array(
				'warnings' => array_filter($exception->findMessages(array(
					'login' => 'você deve informar um login',
					'senha' => 'você deve informar uma senha'
				)))
			));
		}
		
		$stmt = $this->container->db->prepare(
		"SELECT id, usuario, senha, nome, data_entrada, data_saida, status, id_vendedor, id_grupos_usuarios, tipo " .
		"FROM cv2_usuarios WHERE usuario=:login AND senha=:senha");
		$stmt->bindValue('login', $dados->login);
		$stmt->bindValue('senha', $dados->senha);
		$stmt->execute();
		
		$usuario = $this->fetchEntity($stmt, 'CV\Model\Usuario');
		
		if (!$usuario)
			throw new ModelException(array(
				'errors' => array('usuário e/ou senha inválidos')
			));
		
		$this->getContainer()->session->usuario = $usuario;
				
		return $usuario;
	}
	
	public function logado()
	{
		return $this->getContainer()->session->get('usuario');
	}
	
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