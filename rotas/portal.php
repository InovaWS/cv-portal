<?php

$portal_init = function() use($app) {
	
	$app->configureMode('localhost', function() use($app) {
		$app->config(array(
			'debug' => true
		));

		ORM::configure('mysql:host=localhost;dbname=centraldoveicu');
		ORM::configure('username', 'root');
		ORM::configure('password', '');
		ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	});
	
	$app->configureMode('www.centraldoveiculo.com.br', function() use($app) {
		$app->config(array(
			'debug' => false
		));
	
		ORM::configure('mysql:host=mysql.centraldoveiculo.com.br;dbname=centraldoveicu');
		ORM::configure('username', 'centraldoveicu');
		ORM::configure('password', 's3nh4central');
		ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	});
};

$app->get('/', $portal_init, function() use($app) {
	
	$tipos_de_veiculos = Model::factory('CV\TipoDeVeiculo')->order_by_asc('cod_tipo_veiculo')->find_many();
	
	$app->render('portal/index.twig', compact('tipos_de_veiculos'));
	
})->name('portal/index');