<?php
use Slim\Exception\Stop;
use Respect\Validation\Validator;

$app->map('/login', $authenticateForRole(), function() use($app, $database, $session) {
	if ($app->request()->isPost()) {
		try {
			$mensagens = array('warnings' => array(), 'errors' => array());
			
			if (!Validator::string()->notEmpty()->validate($app->request()->post('login'))) {
				$mensagens['warnings'][] = 'você deve informar um login';
				throw new Stop();
			}
			
			if (!Validator::string()->notEmpty()->validate($app->request()->post('senha'))) {
				$mensagens['warnings'][] = 'você deve informar uma senha';
				throw new Stop();
			}
			
			$usuario = $database->entity('usuario')->where('usuario', $app->request()->post('login'))
			->where('senha', $app->request()->post('senha'))->findOne();
			
			if (!$usuario) {
				$mensagens['errors'][] = 'usuário e/ou senha inválidos';
				throw new Stop();
			}
			
			$session->usuario = $usuario->id;
			
			$app->redirect($app->urlFor('/'));
		}
		catch (Stop $stop) {
			$form = array('login' => $app->request()->post('login'));
		}
	}
	
	$app->render('login.twig', compact('mensagens', 'form'));
})->via('GET', 'POST')->name('/login');

$app->get('/logout', $authenticateForRole('usuario'), function() use($app, $session) {
	unset($session->usuario);

	$app->redirect($app->urlFor('/'));
})->name('/logout');