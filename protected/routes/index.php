<?php
use CV\Control\CallableMiddleware;

$app->add(new CallableMiddleware(function(CallableMiddleware $mid) use($app, $container) {
	if (isset($container->sessao->usuario)) {
		$app->view()->appendData(array(
			'usuario_logado' => $container->sessao->usuario,
			'vendedor_logado' => $container->sessao->vendedor
		));
	}
	$mid->getNextMiddleware()->call();
}));

$app->notFound(function() use($app) {
	$app->render('404.html');
});

$app->get('/', function() use($app) {
	$app->render('index.twig');
})->name('/');

$app->get('/js/routes.js', function() use($app) {
	$routes = array();
	foreach ($app->router()->getNamedRoutes() as $name => $route)
		$routes[$name] = $route->getPattern();
	
	$app->contentType('text/javascript');
	echo
'function urlFor(name, conditions) {
   	var routes = ', json_encode($routes), ';
   	var route = routes[name];
   	for (var prop in conditions)
  		route = route.replace(new RegExp(":" + prop, "g"), conditions[prop]);
   	return route;
}
function url(uri, complete) {
	if (complete)
		return ', json_encode($app->request()->getScheme()), ' + "://" + ' , json_encode($app->request()->getHost() . $app->request()->getRootUri()), ' + uri;
	else
		return ', json_encode($app->request()->getRootUri()), ' + uri;
}';
	
});

$app->get('/cidades/:estado', function($estado) use($app, $container) {
	$app->contentType('application/json');
	echo json_encode($container->cidades->getDoEstado($estado));
})->name('/cidades/:estado');