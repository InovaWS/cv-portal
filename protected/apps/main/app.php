<?php
use Slim\Extras\Log\DateTimeFileWriter;

use Rio\Slim\Application;
use Rio\Model\ModelContainer;
use Slim\Extras\Views\Twig;
use Rio\Slim\TwigView;
use Rio\Model\Session;

$app = new Application(array('mode' => $environment));

$app->getLog()->setWriter(new DateTimeFileWriter(array('path' => APPLICATION_DIR . '/logs')));

$app->configureMode('development', function() use($app) {
	$app->getLog()->setEnabled(true);
	ini_set('display_errors', 'on');
});

$app->configureMode('test', function() use($app) {
	$app->getLog()->setEnabled(true);
	ini_set('display_errors', 'on');
});

$app->configureMode('production', function() use($app) {
	$app->getLog()->setEnabled(false);
});

// model
$app->model = new ModelContainer();
$app->model->sessao = new Session();
	
$app->configureMode('development', function() use($app) {
	$app->model->db = $app->share(function() {
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

$app->configureMode('test', function() use($app) {
	$app->model->db = $app->share(function() {
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

$app->configureMode('production', function() use($app) {
	$app->model->db = $app->share(function() {
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

$app->model->appendAccessor('usuarios', 'CV\Model\Database\Usuarios');
$app->model->appendAccessor('vendedores', 'CV\Model\Database\Vendedores');
$app->model->appendAccessor('veiculos', 'CV\Model\Database\Veiculos');
$app->model->appendAccessor('ufs', 'CV\Model\Database\UFs');
$app->model->appendAccessor('cidades', 'CV\Model\Database\Cidades');
$app->model->appendAccessor('cadastro', 'CV\Model\Database\Cadastro');

// routes
require APPLICATION_DIR . '/routes/base.php';
require APPLICATION_DIR . '/routes/index.php';
require APPLICATION_DIR . '/routes/cadastro.php';

// view
$app->config('templates.path', APPLICATION_DIR . '/templates/');
$app->config('templates.resources', false);
$app->view(new TwigView());

return $app;