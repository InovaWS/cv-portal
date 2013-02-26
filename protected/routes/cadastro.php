<?php
$app->get('/login', function() use($app) {
	$app->render('login.twig');
});

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
	$app->redirect(Application::getInstance()->url('/login'));
});

$app->post('/cadastro', function() use($app) {
	$dados = Filter::get(INPUT_POST, array(
			'nome' => FILTER_SANITIZE_STRING,
			'email' => FILTER_VALIDATE_EMAIL,
			'senha' => FILTER_SANITIZE_STRING,
			'confirmar-senha' => FILTER_SANITIZE_STRING
	));

	if (in_array(false, $dados))
		$app->redirect(Application::getInstance()->url('/login'));
});