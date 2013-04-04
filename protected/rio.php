<?php
$environmentMap = (require __DIR__ . '/environment.php');
$environment = isset($environmentMap[$_SERVER['HTTP_HOST']]) ? $environmentMap[$_SERVER['HTTP_HOST']] : 'production';

set_error_handler(function($severity, $message, $file, $line) {
	throw new ErrorException($message, 0, $severity, $file, $line);
}, E_ALL | E_STRICT);

set_exception_handler(function($exception) use($environment) {
	header('HTTP/1.1 500 Internal Server Error', true, 500);
	header('Content-Type: text/plain; charset=UTF-8');
	if ($environment == 'production')
		die("Internal Server Error");
	else
		die("Internal Server Error: \n$exception");
});

spl_autoload_register(function($classname) {
	$classpath = stream_resolve_include_path('classes/' . str_replace(array('\\', '_'), '/', $classname) . '.php');
	if ($classpath)
		require $classpath;
	else
		trigger_error("class not found ($classname)");
});

set_include_path(implode(PATH_SEPARATOR, array_unique(array(
	getcwd(),
	__DIR__
))));

$f = function() {
	$protectedDir = __DIR__;
	$appPath = $protectedDir . '/apps/' . (isset($_SERVER['REDIRECT_app']) ? $_SERVER['REDIRECT_app'] : 'main') . '/app.php';
	$realAppPath = realpath($appPath);
	if ($realAppPath === false)
		trigger_error("app not found in $appPath");
	$appDir = dirname($realAppPath);
	
	define('INVOKER_DIR', getcwd());
	define('PROTECTED_DIR', $protectedDir);
	define('APPLICATION_DIR', $appDir);
	define('APPLICATION_PATH', $realAppPath);
};
$f();
unset($f);

$f = function($environment) {
	return (require APPLICATION_PATH);
};
$app = $f($environment);
unset($f, $environmentMap, $environment);

if (!($app instanceof Slim\Slim))
	trigger_error("app not runnable in " . APPLICATION_PATH);

$app->run();