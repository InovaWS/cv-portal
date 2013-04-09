<?php
$app->get('/', $authenticateForRole(), function() use($app) {
	$tipos_de_veiculo = $app->model->veiculos->tipos;
	$estados = $app->model->ufs->getAll();

	$app->render('index.twig', compact('tipos_de_veiculo', 'estados'));
})->name('/');

$app->get('/anuncie', function() use($app) {
	$app->render('anuncie.twig');
})->name('/anuncie');

$app->get('/cidades/:id_uf', function($id_uf) use($app) {
	$app->contentType('application/json');
	
	echo json_encode(array_map(function($a) { return $a->data(); }, $app->model->ufs[$id_uf]->cidades));
})->name('/cidades');