<?php
$app->get('/meus-dados', $authenticateForRole('usuario'), function() use($app, $database) {
	$app->render('dados/visualizar.twig');
	var_dump($database->queryLog());
})->name('/meus-dados');