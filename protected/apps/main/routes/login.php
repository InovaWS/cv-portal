<?php
use CV\Model\ModelException;

$app->map('/login', $authenticateForRole(), function() use($app) {
	if ($app->request()->isPost()) {
		try {
			$app->model->usuarios->login($app->request());
			$app->redirect($app->urlFor('/'));
		}
		catch (ModelException $exception) {
			$mensagens = $exception->getMessages();
		}
		
		$form = array('login' => $app->request()->post('login'));
	}
	
	$app->render('login.twig', compact('mensagens', 'form'));
})->via('GET', 'POST')->name('/login');

$app->get('/logout', $authenticateForRole(), function() use($app) {
	unset($container->sessao->usuario);
	unset($container->sessao->vendedor);

	$app->redirect($app->urlFor('/'));
})->name('/logout');