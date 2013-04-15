<?php
$app = new \Slim\Slim();

$app->configureMode('development', function() use($app) {
	ini_set('display_errors', 'on');
	
	$app->config('app.database.dsn', 'mysql:host=localhost;dbname=centraldoveicu');
	$app->config('app.database.username', 'root');
	$app->config('app.database.password', '');
	$app->config('app.database.driver.options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	$app->config('app.database.logging', true);
	$app->config('app.database.caching', false);
	
	$app->config('templates.resources', false);
});

$app->configureMode('test', function() use($app) {
	ini_set('display_errors', 'on');
	
	$app->config('app.database.dsn', 'mysql:host=mysql.centraldoveiculo.com.br;dbname=centraldoveicu01');
	$app->config('app.database.username', 'centraldoveicu01');
	$app->config('app.database.password', 'hesoyam22');
	$app->config('app.database.driver.options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	$app->config('app.database.logging', false);
	$app->config('app.database.caching', false);
	
	$app->config('templates.resources', false);
});

$app->configureMode('production', function() use($app) {
	ini_set('display_errors', 'off');
	
	$app->config('app.database.dsn', 'mysql:host=mysql.centraldoveiculo.com.br;dbname=centraldoveicu01');
	$app->config('app.database.username', 'centraldoveicu01');
	$app->config('app.database.password', 'hesoyam22');
	$app->config('app.database.driver.options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	$app->config('app.database.logging', false);
	$app->config('app.database.caching', false);
	
	$app->config('templates.resources', false);
});

$app->getLog()->setEnabled(true);
$app->getLog()->setWriter(new \Slim\Extras\Log\DateTimeFileWriter(array('path' => APPLICATION_DIR . '/logs')));

// view
$app->config('templates.path', APPLICATION_DIR . 'templates' . DIRECTORY_SEPARATOR);
$app->config('templates.cache.path', APPLICATION_DIR . 'cache' . DIRECTORY_SEPARATOR . 'twig' . DIRECTORY_SEPARATOR);
$app->view(new \Rio\Twig\TwigView());

// model
$database = new \Rio\Model\DatabaseConnection(array(
	'dsn' => $app->config('app.database.dsn'),
	'username' => $app->config('app.database.username'),
	'password' => $app->config('app.database.password'),
	'driverOptions' => $app->config('app.database.driver.options'),
	'logging' => $app->config('app.database.logging'),
	'caching' => $app->config('app.database.caching'),
));
$session = new Rio\Model\Session();

\Rio\Model\Entity::register('CV\Model\Database\Usuario', 'usuario');
\Rio\Model\Entity::register('CV\Model\Database\Vendedor', 'vendedor');
\Rio\Model\Entity::register('CV\Model\Database\Veiculo', 'veiculo');
\Rio\Model\Entity::register('CV\Model\Database\UF', 'uf');
\Rio\Model\Entity::register('CV\Model\Database\Cidade', 'cidade');
\Rio\Model\Entity::register('CV\Model\Database\Marca', 'marca');
\Rio\Model\Entity::register('CV\Model\Database\TipoDeVeiculo', 'tipo_de_veiculo');
\Rio\Model\Entity::register('CV\Model\Database\Endereco', 'endereco');

// routes
require APPLICATION_DIR . '/routes/base.php';
require APPLICATION_DIR . '/routes/index.php';
require APPLICATION_DIR . '/routes/login.php';
require APPLICATION_DIR . '/routes/dados.php';
require APPLICATION_DIR . '/routes/cadastro.php';

return $app;