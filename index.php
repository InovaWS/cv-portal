<?php
if (version_compare(PHP_VERSION, '5.3.0') < 0) {
	header('HTTP/1.1 500 Internal Server Error', true, 500);
	header('Content-Type: text/plain; charset=UTF-8');
	die('Wrong PHP version; 5.3+ required');
}

require 'protected/rio.php';