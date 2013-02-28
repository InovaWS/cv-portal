<?php
namespace CV\Model\Database;

use CV\Model\DatabaseAccessor;

class Vendedores extends DatabaseAccessor
{
	
	public function cadastrar($dados)
	{
		/*
		$dados = Filter::get(INPUT_POST, array(
				'nome' => FILTER_SANITIZE_STRING,
				'email' => FILTER_VALIDATE_EMAIL,
				'senha' => Filter::FILTER_TRIM,
				'confirmar-senha' => Filter::FILTER_TRIM
		));
		
		if (in_array(false, $dados)) {
			$app->flash('erro_cadastro', 'Dados incompletos ou inválidos.');
			$app->redirect($app->urlFor('/login'));
		}
		
		if ($dados['senha'] != $dados['confirmar-senha']) {
			$app->flash('erro_cadastro', 'As senhas fornecidas não são iguais.');
			$app->redirect($app->urlFor('/login'));
		}
		
		if (!in_array(mb_strlen($dados['senha'], 'UTF-8'), range(6, 10))) {
			$app->flash('erro_cadastro', 'A senha deve possuir entre 6 e 10 caracteres.');
			$app->redirect($app->urlFor('/login'));
		}
		
		if ($container->usuarios->existe(array('usuario' => $dados['email']))) {
			$app->flash('erro_cadastro', 'Já existe um usuário cadastrado com este e-mail');
			$app->redirect($app->urlFor('/login'));
		}
		*/
	}
	
}