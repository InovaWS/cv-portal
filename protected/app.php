<?php
use Slim\Slim;
use CV\Model\Container;
use Skull\Views\ExtensionBasedView;
use Slim\Extras\Log\DateTimeFileWriter;

$app = new Slim(array(
	'mode' => $_SERVER['SERVER_NAME'],
	'debug' => true
));

// Model
$app->getLog()->setWriter(new DateTimeFileWriter(array(
	'path' => realpath(PROTECTED_DIR . '/logs')
)));

$container = new Container();

$app->configureMode('localhost', function() use($app, $container) {
	$container->db = Container::share(function() {
		$pdo = new PDO(
			'mysql:host=localhost;dbname=centraldoveicu',
			'root',
			'',
			array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
		);
		
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		
		return $pdo;
	});
	
});

$app->configureMode('www.centraldoveiculo.com.br', function() use($app, $container) {
	$container->db = Container::share(function() {
		$pdo = new PDO(
			'mysql:host=mysql.centraldoveiculo.com.br;dbname=centraldoveicu',
			'centraldoveicu',
			's3nh4central',
			array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
		);
		

		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		
		return $pdo;
	});
});

$createAccessorFactory = function($className) {
	return Container::share(function($container) use($className) {
		$className = "\\CV\\Model\\Database\\$className";
		$accessor = new $className();
		$accessor->setDatabaseConnection($container->db);
		return $accessor;
	});
};

$container->usuarios = $createAccessorFactory('Usuarios');
$container->vendedores = $createAccessorFactory('Vendedores');

// View
$app->config('templates.path', realpath(PROTECTED_DIR . '/templates'));
$app->view(new ExtensionBasedView());

// Routes

$fn = function(&$app, &$container) {
	require realpath(PROTECTED_DIR . '/routes/index.php');
	require realpath(PROTECTED_DIR . '/routes/cadastro.php');
};
$fn($app, $container);

$app->run();