<?php
use Slim\Extras\Log\DateTimeFileWriter;

use Slim\Extras\Views\Twig;

use Slim\Slim;

$classLoader = (require 'vendor/autoload.php');
$classLoader->add('', 'classes');

$app = new Slim(array(
		'mode' => $_SERVER['HTTP_HOST'],
		'view' => new Twig()
));

$app->getLog()->setWriter(new DateTimeFileWriter(array(
		'path' => __DIR__ . '/logs',
		'name_format' => 'Y-m-d',
		'extension' => 'log',
		'message_format' => '%label% %date% %message%'
)));
$app->config(array(
		'log.enable' => true,
		'templates.path' => './templates'
));

$root = $app->request()->getRootUri();

$app->view()->appendData(compact('app', 'root'));

Twig::$twigExtensions = array(
'Twig_Extensions_Slim',
'Twig\Extensions\CV'
);
Twig::$twigDirectory = $app->config('templates.path');

define('__ROOT_DIR__', __DIR__);
setlocale(LC_ALL, NULL);
setlocale(LC_ALL, 'pt_BR');
date_default_timezone_set('America/Sao_Paulo');
session_start();

require 'rotas/portal.php';

$app->run();