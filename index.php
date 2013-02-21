<?php
set_include_path(get_include_path() .
				PATH_SEPARATOR . realpath(__DIR__ . '/php/app/') .
				PATH_SEPARATOR . realpath(__DIR__ . '/php/vendor/'));

spl_autoload_register(function($classname) {
	$path = stream_resolve_include_path(str_replace(array('\\', '_'), DIRECTORY_SEPARATOR, $classname) . '.php');
	
	if ($path)
		require $path;
}, false, true);

\Evan\Application::main();