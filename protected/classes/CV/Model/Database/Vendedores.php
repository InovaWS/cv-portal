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
	
	public function cadastrar($dados)
	{
		if ($this->container->usuarios->existe(array('usuario' => $dados['email'])))
			throw new RuntimeException('já existe um usuário cadastrado com este e-mail');
		
		if ($this->existe(array('nome' => $dados['nome'])))
			throw new RuntimeException('já existe um vendedor cadastrado com este nome');
		
		$this->container->db->beginTransaction();
		
		$vendedor = array(
			'codvendedor' => null,
			'nome' => $dados['nome']
		);
		
		$stmt = $this->container->db->prepare(
			"INSERT INTO
				cv2_vendedores(
					nome,
					id_tipo,
					bloqueado
				)
				VALUES(
					:nome,
					(SELECT id FROM cv2_tipos_vendedores LIMIT 1),
					1
				)"
		);
		
		$stmt->bindValue('nome', $vendedor['nome']);
		$stmt->execute();
		
		$vendedor['id'] = $this->container->db->lastInsertId();
		
		$usuario = array(
			'nome' => $dados['nome'],
			'usuario' => $dados['email'],
			'senha' => $dados['senha'],
			'id_vendedor' => $vendedor['id']
		);
		
		$stmt = $this->container->db->prepare(
			"INSERT INTO
				cv2_usuarios(
					usuario,
					senha,
					nome,
					status,
					id_vendedor,
					id_grupos_usuarios
				)
				VALUES(
					:usuario,
					:senha,
					:nome,
					0,
					:id_vendedor,
					2
				)"
		);
		$stmt->bindValue('nome', $usuario['nome']);
		$stmt->bindValue('usuario', $usuario['usuario']);
		$stmt->bindValue('senha', $usuario['senha']);
		$stmt->bindValue('status', $usuario['status']);
		$stmt->bindValue('id_vendedor', $usuario['id_vendedor']);
		$stmt->execute();
		
		$usuario['id'] = $this->container->db->lastInsertId();
		
		$this->container->sessao->usuario = $this->container->usuarios->get(array('id' => $usuario['id']));
		
		$this->container->db->commit();
		
		$this->enviarEmailDeCadastro();
	}
	
	public function enviarEmailDeCadastro()
	{
		$key = $this->container->sessao->usuario->id_vendedor . md5($this->container->sessao->usuario->senha);
		
		$view = Slim::getInstance()->view();
		$view->appendData(array(
				'nome' => $this->container->sessao->usuario->nome,
				'key' => $key
		));
		$html = $view->render('emails/cadastro.twig');
		
		MailSender::sendHTMLMail($this->container->sessao->usuario->usuario, 'cadastro', 'Complete seu casdastro!', $html);
	}
	
	public function ativar($key)
	{
		$usuario = $this->container->usuarios->get(array('key' => $key));
		$vendedor = $this->get(array('id' => $usuario->id_vendedor));
		
		$usuario->status = true;
		$vendedor->bloqueado = false;
		
		$this->container->usuarios->salvar($usuario);
		$this->salvar($vendedor);
		
		$this->container->sessao->usuario = $usuario;
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