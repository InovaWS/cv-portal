<?php
use Slim\Environment;

use CV\Control\Filter;

$app->get('/login', function() use($app) {
	$app->render('login.twig');
})->name('/login');

$app->post('/login', function() use($app, $container) {
	$filtro = Filter::create($app->request()->post())
	          ->fields('login', 'senha')->crop()
	          ->fields('login')->errorMessage('O campo de login deve ser preenchido.')->length()
	          ->fields('senha')->errorMessage('O campo de senha deve ser preenchido.')->length();
	
	$erros = $filtro->errors();
	$dados = $filtro->data();
	
	if (empty($erros)) {
		$usuario = $container->usuarios->get(array('usuario' => $dados['login'], 'senha' => $dados['senha'], 'status' => 1));
		if (empty($usuario))
			$erros[] = 'login e/ou senha inválido(s)';
		else {
			$vendedor = $container->vendedores->get(array('id' => $usuario->id_vendedor));
				
			$container->sessao->usuario = $usuario;
			$container->sessao->vendedor = $vendedor;
			$app->redirect($app->urlFor('/'));
		}
	}
	
	$app->flashNow('erros_login', $erros);
	$app->render('login.twig', array('login' => $dados));
});

$app->get('/logout', function() use($app, $container) {
	unset($container->sessao->usuario);
	unset($container->sessao->vendedor);
	
	$app->redirect($app->urlFor('/'));
})->name('/logout');

$app->get('/cadastro', function() use($app) {
	$app->redirect($app->request()->getRootUri() . '/login');
})->name('/cadastro');

$app->post('/cadastro', function() use($app, $container) {
	
	$filtro = Filter::create($app->request()->post())
		->fields('nome', 'email', 'senha', 'confirmar-senha')->crop()
		->fields('nome', 'email')->trim()
		->fields('nome')->errorMessage('você deve informar o seu nome')->length()
		->fields('email')->errorMessage('você deve informar um e-mail')->length()
		->fields('email')->errorMessage('e-mail inválido')->email()
		->fields('senha')->errorMessage('você deve informar uma senha')->length()
		->fields('senha')->errorMessage('a senha deve conter entre 6 e 10 caracteres')->length(range(6, 10))
		->fields('confirmar-senha')->errorMessage('você deve informar uma confirmação de senha')->length()
		->fields('senha', 'confirmar-senha')->errorMessage('a senha não coincide com a senha de confirmação')->equals()
		->fields('confirmar-senha')->delete();
	
	$dados = $filtro->data();
	$erros = $filtro->errors();
	
	if (!$erros) {
		try {
			$chave = $container->vendedores->cadastrar($dados);
			$app->redirect($app->urlFor('/cadastro/sucesso'));
		}
		catch (RuntimeException $e) {
			$erros[] = $e->getMessage();
		}
	}
	
	$app->flashNow('erros_cadastro', $erros);
	$app->render('login.twig', array('cadastro' => $dados));
});

$app->get('/cadastro/sucesso', function() use($app, $container) {
	if (empty($container->sessao->cadastro) && !is_array($container->sessao->cadastro))
		$app->redirect($app->urlFor('/'));
	
	$app->render('cadastro/sucesso-primeira-etapa.twig', $container->sessao->cadastro);
})->name('/cadastro/sucesso');

$app->get('/cadastro/sucesso/reenviar', function() use($app, $container) {
	if (empty($container->sessao->cadastro) && !is_array($container->sessao->cadastro))
		$app->redirect($app->urlFor('/'));
	
	$container->vendedores->enviarEmailDeCadastro();

	$app->flash('reenviado', true);
	$app->redirect($app->urlFor('/cadastro/sucesso'));
})->name('/cadastro/sucesso/reenviar');

$app->get('/cadastro/completar', function() use($app, $container) {
	$chave = $app->request()->get('chave');
	
	if (empty($chave))
		$app->redirect($app->urlFor('/'));
	
	$usuario = $container->usuarios->get(array('key' => $chave));
	
	$app->render('cadastro/completar.twig', array('usuario' => $usuario, 'chave' => $chave, 'ufs' => $container->ufs->getAll()));
})->name('/cadastro/completar');

$app->post('/cadastro/completar', function() use($app, $container) {
	$filtro = Filter::create($app->request()->post())
	                ->fields( 'chave', 'cpf', 'cnpj', 'razao_social', 'nome_fantasia', 'endereco',
	                          'numero', 'complemento', 'bairro', 'uf', 'cidade', 'cep', 'telefone',
	                          'celular')->crop()
	                ->fields('chave', 'endereco', 'numero', 'bairro', 'uf', 'cidade', 'cep')->length();
	
	$backUri = $app->urlFor('/cadastro/completar') . '?chave=' . $container->sessao->cadastro['chave'];
	
	$chave = $app->request()->get('chave');
		
	$usuario = $container->usuarios->get(array('key' => $chave));
	
	$app->render('cadastro/completar.twig', array('usuario' => $usuario, 'chave' => $chave, 'ufs' => $container->ufs->getAll()));
});