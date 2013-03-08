<?php
use Slim\Environment;

use CV\Control\Filter;

$app->get('/login', function() use($app) {
	$app->render('login.twig');
})->name('/login');

$app->post('/login', function() use($app) {
	$filtro = Filter::create($app->request()->post())
	          ->fields('login', 'senha')->crop()
	          ->fields('login')->errorMessage('O campo de login deve ser preenchido.')->length()
	          ->fields('senha')->errorMessage('O campo de senha deve ser preenchido.')->length();
	
	if (!$filtro->errors()) {
		
	}
	
	$app->flashNow('erros_login', $filtro->errors());
	$app->render('login.twig', array('login' => $filtro->data()));
});

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
	
	$erros = $filtro->errors();
	
	if (!$erros) {
		try {
			$resultado = $container->vendedores->cadastrar($filtro->data());
			$app->redirect($app->urlFor('/cadastro/sucesso'));
		}
		catch (RuntimeException $e) {
			$erros[] = $e->getMessage();
		}
	}
	
	$app->flashNow('erros_cadastro', $erros);
	$app->render('login.twig', array('cadastro' => $filtro->data()));
});

$app->get('/cadastro/sucesso', function() use($app, $container) {
	if (!$container->sessao->usuario)
		$app->redirect($app->urlFor('/'));
	
	$app->render('cadastro/sucesso-primeira-etapa.twig', array('nome' => $container->sessao->usuario->nome));
})->name('/cadastro/sucesso');

$app->get('/cadastro/sucesso/reenviar', function() use($app, $container) {
	if (!$container->sessao->usuario)
		$app->redirect($app->urlFor('/'));
	
	$container->vendedores->enviarEmailDeCadastro();

	$app->flash('reenviado', true);
	$app->redirect($app->urlFor('/cadastro/sucesso'));
})->name('/cadastro/sucesso/reenviar');

$app->get('/cadastro/completar', function() use($app, $container) {
	$key = $app->request()->get('key');
	
	if (!$key)
		$app->redirect($app->urlFor('/'));
	
	$container->vendedores->ativar($key);
	
	$app->redirect($app->urlFor('/cadastro/editar'));
})->name('/cadastro/completar');