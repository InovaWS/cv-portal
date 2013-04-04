<?php
use Assetic\Asset\StringAsset;
use Assetic\Filter\CssMinFilter;
use Assetic\Filter\Yui\CssCompressorFilter;
use Assetic\Asset\FileAsset;
use Assetic\Filter\CssRewriteFilter;
use Assetic\Asset\GlobAsset;
use Assetic\Asset\AssetCollection;
use CV\Control\CallableMiddleware;


$app->get('/', function() use($app) {
	$tiposDeVeiculos = $app->model->veiculos->tipos();

	$app->render('index.twig', array('tipos_de_veiculos' => $tiposDeVeiculos));
})->name('/');



$app->get('/cidades/:estado', function($estado) use($app) {
	$app->contentType('application/json');
	echo json_encode($app->model->cidades->getDoEstado($estado));
})->name('/cidades/:estado');