<?php
use Assetic\Asset\StringAsset;

use Assetic\Filter\CssMinFilter;

use Assetic\Filter\Yui\CssCompressorFilter;

use Assetic\Asset\FileAsset;

use Assetic\Filter\CssRewriteFilter;

use Assetic\Asset\GlobAsset;

use Assetic\Asset\AssetCollection;

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

$app->get('/css/all(.:data).css', function($data) use($app) {
	$app->contentType('text/css; charset=UTF-8');
	
	$assets = new AssetCollection(
		array (
			new FileAsset('css/vendor/bootstrap.css'),
			new FileAsset('css/vendor/bootstrap-responsive.css'),
			new FileAsset('css/vendor/jquery-ui-1.8.18.custom.css'),
			new FileAsset('css/vendor/prettyGallery.css'),
			new GlobAsset('css/*.css')
		)
	);
	echo $assets->dump();
})->conditions(array('data' => '\d+'))->name('/css/all.css');

$app->get('/js/all(.:data).js', function($data) use($app) {
	$app->contentType('text/javascript; charset=UTF-8');

	$assets = new AssetCollection(
		array (
			new FileAsset('js/vendor/modernizr-2.6.2.min.js'),
			new FileAsset('js/vendor/jquery-1.9.1.min.js'),
			new FileAsset('js/vendor/bootstrap.js'),
			new FileAsset('js/vendor/jquery-ui-1.10.0.custom.min.js'),
			new FileAsset('js/vendor/jquery.maskedinput-1.2.2.js'),
			new FileAsset('js/vendor/jquery.prettyGallery.js'),
			new FileAsset('js/plugins.js'),
			new FileAsset('js/main.js'),
			new FileAsset('js/portal.js')
		)
	);
	echo $assets->dump();
})->conditions(array('data' => '\d+'))->name('/js/all.js');

$app->get('/js/all.async(.:data).js', function($data) use($app) {
	$app->contentType('text/javascript; charset=UTF-8');
	
	$routes = array();
	foreach ($app->router()->getNamedRoutes() as $name => $route)
		$routes[$name] = $route->getPattern();
	
	$routes = json_encode($routes);
	$scheme = json_encode($app->request()->getScheme());
	$host = json_encode($app->request()->getHost());
	$root = json_encode($app->request()->getRootUri());
	
	$assets = new AssetCollection(
		array (
			new StringAsset(
				"var _gaq=[['_setAccount','UA-36161745-1'],['_trackPageview']];
				(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
				g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
				s.parentNode.insertBefore(g,s)}(document,'script'));"
			),
			new StringAsset(
				"function urlFor(name, conditions) {
				   	var routes = $routes;
				   	var route = routes[name];
				   	for (var prop in conditions)
				  		route = route.replace(new RegExp(':' + prop, 'g'), conditions[prop]);
				   	return route;
				}
				function url(uri, complete) {
					if (complete)
						return $scheme + '://' + $host + $root + uri;
					else
						return $root + uri;
				}"
			)
		)
	);
	
	echo $assets->dump();
})->conditions(array('data' => '\d+'))->name('/js/all.async.css');

$app->get('/cidades/:estado', function($estado) use($app, $container) {
	$app->contentType('application/json');
	echo json_encode($container->cidades->getDoEstado($estado));
})->name('/cidades/:estado');