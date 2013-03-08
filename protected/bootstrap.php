<?php
define('PROTECTED_DIR', realpath(__DIR__));

set_include_path(
    //get_include_path() .
    __DIR__ .
    PATH_SEPARATOR . realpath(__DIR__ . '/classes/')
);

spl_autoload_register(function($classname) {
	$path = stream_resolve_include_path(str_replace(array('\\', '_'), DIRECTORY_SEPARATOR, $classname) . '.php');
	
	if ($path)
		require $path;
}, false, true);

require __DIR__ . "/app.php";