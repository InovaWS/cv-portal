<?php
use Slim\Slim;
use CV\Model\Container;
use Skull\Views\ExtensionBasedView;
use Slim\Extras\Log\DateTimeFileWriter;
use CV\Model\Session;

$modeMapping = array(
	'localhost' => 'desenvolvimento',
	$_SERVER['SERVER_ADDR'] => 'desenvolvimento',
	'www.centraldoveiculo.com.br' => 'producao',
	'centraldoveiculo.com.br' => 'producao'
);

$app = new Slim(array('mode' => $modeMapping[$_SERVER['SERVER_NAME']]));

// Model
$app->getLog()->setWriter(new DateTimeFileWriter(array(
	'path' => realpath(PROTECTED_DIR . '/logs')
)));

$container = new Container();

$app->configureMode('desenvolvimento', function() use($app, $container) {
	$app->config('debug', true);
	
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

$app->configureMode('producao', function() use($app, $container) {
	$app->config('debug', false);
	
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

$container->sessao =  new Session();

$createAccessorFactory = function($className) {
	return Container::share(function($container) use($className) {
		$className = "\\CV\\Model\\Database\\$className";
		$accessor = new $className($container);
		$accessor->setContainer($container);
		return $accessor;
	});
};

$container->usuarios = $createAccessorFactory('Usuarios');
$container->vendedores = $createAccessorFactory('Vendedores');
$container->ufs = $createAccessorFactory('UFs');
$container->cidades = $createAccessorFactory('Cidades');
$container->cadastro = $createAccessorFactory('Cadastro');

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