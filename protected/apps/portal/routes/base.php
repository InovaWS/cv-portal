<?php
use J4mie\Idiorm\ORM;

use Assetic\Asset\AssetCollection;
use Assetic\Asset\FileAsset;
use Assetic\Asset\GlobAsset;
use Assetic\Asset\StringAsset;

$authenticateForRole = function($role = 'visitante') use($app, $database, $session) {
	$forbidden = function() use($app) {
		$app->render('403.twig');
		$app->halt(403);
	};
	
	return function() use($app, $database, $session, $role, $forbidden) {
		$usuario = $database->entity('usuario')->findOne(intval($session->usuario));
		
		switch ($role) {
			case 'usuario':
				if (empty($usuario))
					$forbidden();
				break;
				
			case 'admin':
				if (empty($usuario) || $usuario->id != 1)
					$forbidden();
				break;
		}
		
		$app->view()->appendData(array('usuario_logado' => $usuario));
	};
};

$app->notFound(function() use($app, $authenticateForRole) {
	$authenticateForRole();
	$app->render('404.twig');
});

$app->get('/css/portal.css', function() use($app) {
	$app->contentType('text/css; charset=UTF-8');
	
	$css = '';
	foreach (glob(INVOKER_DIR . 'css' . DIRECTORY_SEPARATOR . '*.css') as $file)
		$css .= file_get_contents($file);
	
	$app->response()->body($css);
})->conditions(array('data' => '\d+'))->name('/css/all.css');

$app->get('/js/routes.js', function() use($app) {
	$routes = array();
	foreach ($app->router()->getNamedRoutes() as $name => $route)
		$routes[$name] = $route->getPattern();
	
	$routes = json_encode($routes);
	$scheme = json_encode($app->request()->getScheme());
	$host = json_encode($app->request()->getHost());
	$root = json_encode($app->request()->getRootUri());

	$app->contentType('text/javascript; charset=UTF-8');
	$app->response()->body(preg_replace('#\s+#', ' ', 
		"function urlFor(name, conditions) {
			var routes = $routes;
			var route = routes[name];
			for (var prop in conditions)
				route = route.replace(new RegExp(':' + prop, 'g'), conditions[prop]);
			return $root + route;
		}
		
		function url(uri, complete) {
			if (complete)
				return $scheme + '://' + $host + $root + uri;
			else
				return $root + uri;
		}"));
})->name('/js/routes.js');