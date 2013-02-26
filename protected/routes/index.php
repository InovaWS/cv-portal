<?php
$app->notFound(function() use($app) {
	$app->render('404.html');
});

$app->get('/', function() use($app) {
	$app->render('index.twig');
});