<?php
define('__ROOT_DIR__', __DIR__);
define('__APP_DIR__', realpath(__DIR__ . '/app'));
define('__ASSETS_DIR__', realpath(__DIR__ . '/assets'));
define('__LOGS_DIR__', realpath(__DIR__ . '/logs'));
define('__TEMPLATES_DIR__', realpath(__DIR__ . '/templates'));
define('__VENDOR_DIR__', realpath(__DIR__ . '/vendor'));

use Slim\Extras\Log\DateTimeFileWriter;
use Slim\Extras\Views\Twig;
use Slim\Slim;

$classLoader = (require __VENDOR_DIR__ . '/autoload.php');
$classLoader->add('', __APP_DIR__);

$app = new Slim(array(
	'mode' => $_SERVER['HTTP_HOST'],
	'view' => new Twig()
));

$app->getLog()->setWriter(new DateTimeFileWriter(array(
	'path' => __LOGS_DIR__,
	'name_format' => 'Y-m-d',
	'extension' => 'log',
	'message_format' => '%label% %date% %message%'
)));
$app->config(array(
	'log.enable' => true,
	'templates.path' => __TEMPLATES_DIR__
));

$root = $app->request()->getRootUri();
$paths = array(
	'root' => $root,
	'assets' => $root . '/assets'
);
$ie7 = preg_match('#MSIE\s+7#', $app->request()->headers('User-Agent'));

$app->view()->appendData(compact('app', 'root', 'paths', 'ie7'));

Twig::$twigExtensions = array(
	'Twig_Extensions_Slim',
	'Twig\Extensions\CV'
);
Twig::$twigDirectory = __TEMPLATES_DIR__;

setlocale(LC_ALL, NULL);
setlocale(LC_ALL, 'pt_BR');
date_default_timezone_set('America/Sao_Paulo');
session_start();

require 'routes/portal.php';

$app->run();