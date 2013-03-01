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
	
	$filtro = new Filter($app->request()->post());
	var_dump($filtro->fields('nome', 'email', 'senha', 'confirmar-senha')
	       ->trim('nome', 'email', 'senha', 'confirmar-senha')
	       ->email('email')
	       ->length('senha', range(6, 10))
	       ->equals('senha', 'confirmar-senha')
	       ->data());
	
	$resultado = $container->vendedores->cadastrar($dados);
	
	$app->redirect($app->urlFor('/cadastro/sucesso'));
});

$app->get('/cadastro/sucesso', function() use($app, $container) {
	
	if (!$container->usuario)
		$app->redirect($app->urlFor('/'));
	
	$app->render('cadastro/sucesso-primeira-etapa.twig');
})->name('/cadastro/sucesso');