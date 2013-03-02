<?php
namespace CV\Model\Database;

use CV\Control\Filter;

use CV\Model\ModelAccessor;

class Vendedores extends ModelAccessor
{
	
	public function cadastrar($dados)
	{
		if ($this->container->usuarios->existe(array('usuario' => $dados['email'])))
			throw new RuntimeException('já existe um usuário cadastrado com este e-mail');
		
		$this->container->db->beginTransaction();
		
		$vendedor = array(
			'codvendedor' => null,
			'nome' => $dados['nome']
		);
		
		$stmt = $this->container->db->prepare(
			"INSERT INTO
				cv2_vendedores(
					nome,
					id_tipo
				)
				VALUES(
					:nome,
					(SELECT id FROM cv2_tipos_vendedores LIMIT 1)
				)"
		);
		
		$stmt->bindValue('nome', $vendedor['nome']);
		$stmt->execute();
		
		$vendedor['id'] = $this->container->db->lastInsertId();
		
		$usuario = array(
			'nome' => $dados['nome'],
			'usuario' => $dados['email'],
			'senha' => $dados['senha'],
			'status' => 'em cadastro',
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
					:status,
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
		
		$vendedor['chave'] = $vendedor['id'] . md5($dados['senha']);
		$stmt = $this->container->db->prepare(
			"UPDATE cv2_vendedores SET chave=:chave WHERE id=:id"
		);
		$stmt->bindValue('id', $vendedor['id']);
		$stmt->bindValue('chave', $vendedor['chave']);
		$stmt->execute();
		
		$template = new View_Template('templates/emails/cadastro.php');
		$template->nome = $nome;
		$template->link = absolute_path('index.php?p=cadastro-seg-etapa&chave=' . $vendedor->chave);
		
		$this->container->db->commit();
	}
	
}