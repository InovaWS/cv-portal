<?php
namespace CV\Model;

use CV\Model\MailSender;

use Slim\Slim;

use \RuntimeException;
use Slim\Exception\Pass;

use CV\Model\ModelAccessor;

class Cadastro extends ModelAccessor
{
	
	public function cadastrar($dados)
	{
		if ($this->container->usuarios->existe(array('usuario' => $dados['email'])))
			throw new RuntimeException('já existe um usuário cadastrado com este e-mail');
	
		if ($this->container->vendedores->existe(array('nome' => $dados['nome'])))
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
		$stmt->bindValue('id_vendedor', $usuario['id_vendedor']);
		$stmt->execute();
	
		$usuario['id'] = $this->container->db->lastInsertId();
	
		$chave = $this->gerarChave($usuario['senha'], $usuario['id_vendedor']);
	
		$this->container->sessao->cadastro = array(
			'login' => $usuario['usuario'],
			'nome' => $usuario['nome'],
			'chave' => $chave
		);
	
		$this->enviarEmailDeCadastro();
	
		$this->container->db->commit();
	
		return $chave;
	}
	
	private function gerarChave($senha, $id_vendedor)
	{
		return $id_vendedor . md5($senha);
	}
	
	public function enviarEmailDeCadastro()
	{
		$view = Slim::getInstance()->view();
		$view->appendData($this->container->sessao->cadastro);
		$html = $view->render('emails/cadastro.twig');
	
		MailSender::sendHTMLMail($this->container->sessao->cadastro['login'], 'cadastro', 'Complete seu cadastro!', $html);
	}
	
	public function ativar($dados)
	{
		$usuario = $this->container->usuarios->get(array('key' => $dados['chave']));
		if (empty($usuario) || $usuario->status)
			throw new RuntimeException('usuário não encontrado ou já ativado');
		
		$vendedor = $this->container->vendedores->get(array('id' => $usuario->id_vendedor));
		if (empty($vendedor) || !$vendedor->bloqueado)
			throw new RuntimeException('vendedor não encontrado ou já desbloqueado');
	
		$usuario->status = 1;
		$vendedor->bloqueado = 0;
		
		$vendedor->nome_fantasia = isset($dados['nome_fantasia']) ? $dados['nome_fantasia'] : null;
		$vendedor->razao_social = isset($dados['razao_social']) ? $dados['razao_social'] : null;
		$vendedor->cpf = isset($dados['cpf']) ? $dados['cpf'] : null;
		$vendedor->cnpj = isset($dados['cnpj']) ? $dados['cnpj'] : null;
		$vendedor->celular = $dados['celular'];
		$vendedor->telefone = $dados['telefone'];
		$vendedor->data = time();
		$vendedor->email = $usuario->usuario;
		$vendedor->id_tipo = $dados['id_tipo'];
	
		$this->container->usuarios->salvar($usuario);
		$this->container->vendedores->salvar($vendedor);
		
		$this->container->sessao->usuario = $usuario;
		$this->container->sessao->vendedor = $vendedor;
	}
	
}