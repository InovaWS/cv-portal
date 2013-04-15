<?php
$app->get('/', $authenticateForRole(), function() use($app, $database) {
	$tipos_de_veiculo = $database->entity('tipo_de_veiculo')->findMany();
	$estados = $database->entity('uf')->findMany();

	$app->render('index.twig', compact('tipos_de_veiculo', 'estados'));
})->name('/');

$app->get('/anuncie', $authenticateForRole(), function() use($app) {
	$app->render('anuncie.twig');
})->name('/anuncie');

$app->get('/cidades/:id_uf', $authenticateForRole(), function($id_uf) use($app, $database) {
	$cidades = $database->entity('uf')->findOne($id_uf)->cidades()->orderByAsc('nome')->findMany();

	$app->contentType('application/json');
	echo json_encode($cidades->asObjectArray());
})->name('/cidades');