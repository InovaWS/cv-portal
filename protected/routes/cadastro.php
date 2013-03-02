<?php
use Slim\Environment;

use CV\Control\Filter;

$app->get('/login', function() use($app) {
	$app->render('login.twig');
})->name('/login');

$app->post('/login', function() use($app) {
	$dados = Filter::get(INPUT_POST, array(
			'login' => FILTER_SANITIZE_STRING,
			'senha' => FILTER_SANITIZE_STRING
	));

	if (!in_array(false, $dados)) {
			
	}

	$app->flash('erro_login', 'Login inválido.');
	$app->render('templates/login.twig', $dados);
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
		->fields('senha')->errorMessage('você deve informar uma senha')->length()
		->fields('confirmar-senha')->errorMessage('você deve informar uma confirmação de senha')->length()
		->fields('email')->errorMessage('e-mail inválido')->email()
		->fields('senha')->errorMessage('a senha deve conter entre 6 e 10 caracteres')->length(range(6, 10))
		->fields('senha', 'confirmar-senha')->errorMessage('a senha não coincide com a senha de confirmação')->equals()
		->fields('confirmar-senha')->delete();
	
	if ($filtro->errors()) {
		die('erro');
	}
	
	$resultado = $container->vendedores->cadastrar($filtro->data());
	exit;
	$app->redirect($app->urlFor('/cadastro/sucesso'));
});

$app->get('/cadastro/sucesso', function() use($app, $container) {
	
	if (!$container->usuario)
		$app->redirect($app->urlFor('/'));
	
	$app->render('cadastro/sucesso-primeira-etapa.twig');
})->name('/cadastro/sucesso');