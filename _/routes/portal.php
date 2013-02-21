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
	
	$ipos_de_veiculos = null;//Model::factory('CV\TipoDeVeiculo')->order_by_asc('cod_tipo_veiculo')->find_many();
	
	$app->render('portal/index.twig', compact('tipos_de_veiculos'));
	
})->name('portal/index');

$app->get('/pagseguro', $portal_init, function() use($app) {
	require __VENDOR_DIR__ . '/PagSeguroLibrary/PagSeguroLibrary.php';
	
	$paymentRequest = new PagSeguroPaymentRequest();
	$paymentRequest->setCurrency("BRL");
	$paymentRequest->addItem(str_pad(1, 4, '0', STR_PAD_LEFT), 'Notebook prata', 2, 0.01);
	$paymentRequest->setReference("REF1234");
	$paymentRequest->setRedirectUrl("http://www.centraldoveiculo.com.br/" /*. $app->request()->getHost() . $app->request()->getPath() . '-retorno'*/);
	
	try {
		$credentials = new PagSeguroAccountCredentials("financeiro@centraldoveiculo.com.br", "B9AEF459FC6C45B5AFAB0A7D84E6D2A1");
		$url = $paymentRequest->register($credentials);
		#$app->redirect($url);
		?>
		<iframe src="<?php echo $url ?>" style="width: 100%; height: 400px"></iframe>
		<?php
	} catch (PagSeguroServiceException $e) {
		die($e->getMessage());
	}
	
})->name('portal/pagseguro');