<?php
use Skull\Views\ExtensionBasedView;
use Slim\Extras\Log\DateTimeFileWriter;
use Slim\Slim;

var_dump($_SERVER);

$app = new Slim();
var_dump($_SERVER);
$app->config('mode', $_SERVER['SERVER_NAME']);
$app->config('debug', true);

// Model
$app->getLog()->setWriter(new DateTimeFileWriter(array(
	'path' => realpath(PROTECTED_DIR . '/logs')
)));

$app->configureMode('localhost', function() use($app) {
	$app->environment()->db = new PDO(
			'mysql:host=localhost;dbname=centraldoveicu',
			'root',
			'',
			array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
	);
});

$app->configureMode('www.centraldoveiculo.com.br', function() use($app) {
	$app->environment()->db = new PDO(
			'mysql:host=mysql.centraldoveiculo.com.br;dbname=centraldoveicu',
			'centraldoveicu',
			's3nh4central',
			array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
	);
});

// View
$app->config('templates.path', realpath(PROTECTED_DIR . '/templates'));
$app->view(new ExtensionBasedView());

// Routes
require realpath(PROTECTED_DIR . '/routes/index.php');
require realpath(PROTECTED_DIR . '/routes/cadastro.php');

$app->run();