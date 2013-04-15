<?php
use Slim\Environment;
use CV\Control\Filter;


$app->get('/cadastro', function() use($app) {
	$app->redirect($app->request()->getRootUri() . '/login');
})->name('/cadastro');

$app->post('/cadastro', function() use($app) {
	
	$filtro = Filter::create($app->request()->post())
		->fields('nome', 'email', 'senha', 'confirmar-senha')->crop()
		->fields('nome', 'email')->trim()
		->fields('nome')->errorMessage('você deve informar o seu nome')->length()
		->fields('email')->errorMessage('você deve informar um e-mail')->length()
		->fields('email')->errorMessage('e-mail inválido')->email()
		->fields('senha')->errorMessage('você deve informar uma senha')->length()
		->fields('senha')->errorMessage('a senha deve conter entre 6 e 10 caracteres')->length(range(6, 10))
		->fields('confirmar-senha')->errorMessage('você deve informar uma confirmação de senha')->length()
		->fields('senha', 'confirmar-senha')->errorMessage('a senha não coincide com a senha de confirmação')->equals()
		->fields('confirmar-senha')->delete();
	
	$dados = $filtro->data();
	$erros = $filtro->errors();
	
	if (empty($erros)) {
		try {
			$chave = $container->cadastro->cadastrar($dados);
			$app->redirect($app->urlFor('/cadastro/sucesso'));
		}
		catch (RuntimeException $e) {
			$erros[] = $e->getMessage();
		}
	}
	
	$app->flashNow('erros_cadastro', $erros);
	$app->render('login.twig', array('cadastro' => $dados));
});

$app->get('/cadastro/sucesso', function() use($app) {
	if (empty($container->sessao->cadastro) && !is_array($container->sessao->cadastro))
		$app->redirect($app->urlFor('/'));
	
	$app->render('cadastro/sucesso-primeira-etapa.twig', $container->sessao->cadastro);
})->name('/cadastro/sucesso');

$app->get('/cadastro/sucesso/reenviar', function() use($app) {
	if (empty($container->sessao->cadastro) && !is_array($container->sessao->cadastro))
		$app->redirect($app->urlFor('/'));
	
	$container->cadastro->enviarEmailDeCadastro();

	$app->flash('reenviado', true);
	$app->redirect($app->urlFor('/cadastro/sucesso'));
})->name('/cadastro/sucesso/reenviar');

$app->get('/cadastro/completar', function() use($app) {
	$chave = $app->request()->get('chave');
	
	if (empty($chave))
		$app->redirect($app->urlFor('/'));
	
	$usuario = $container->usuarios->get(array('key' => $chave));
		
	$app->render('cadastro/completar.twig', array(
		'usuario' => $usuario,
		'chave' => $chave,
		'ufs' => $container->ufs->getAll(),
		'id_tipo_vendedor_fisico' => 1,
		'id_tipo_vendedor_juridico' => 2
	));
})->name('/cadastro/completar');

$app->post('/cadastro/completar', function() use($app) {
	$filtro = Filter::create($app->request()->post())
	                ->fields( 'chave', 'id_tipo', 'cpf', 'cnpj', 'razao_social', 'nome_fantasia', 'endereco',
	                          'numero', 'complemento', 'bairro', 'uf', 'cidade', 'cep', 'telefone',
	                          'celular')->crop()->trim()
	                ->fields('chave')->errorMessage('chave')->length()
	                ->fields('id_tipo')->errorMessage('você deve informar o tipo de pessoa')->length()
	                ->fields('endereco')->errorMessage('você deve informar o logradouro')->length()
	                ->fields('numero')->errorMessage('você deve informar o número do endereço')
	                ->fields('bairro')->errorMessage('você deve informar o bairro')->length()
	                ->fields('uf')->errorMessage('você deve informar a UF')->length()
	                ->fields('cidade')->errorMessage('você deve informar a cidade')->length()
	                ->fields('cep')->errorMessage('você deve informar o CEP')->length();
	
	$dados = $filtro->data();
	$erros = $filtro->errors();
	
	if (in_array('chave', $erros))
		$app->redirect($app->urlFor('/'));
	
	switch ($dados['id_tipo']) {
		case 1:
			$filtro->fields('cpf')->errorMessage('você deve informar o CPF')->length()
			                      ->errorMessage('você deve informar um CPF válido')->cpf()
			       ->fields('cnpj', 'razao_social', 'nome_fantasia')->delete();
			break;
		case 2:
			$filtro->fields('cnpj')->errorMessage('você deve informar o CNPJ')->length()
			                       ->errorMessage('você deve informar um CNPJ válido')->cnpj()
			       ->fields('razao_social')->errorMessage('você deve informar a razão social')->length()
			       ->fields('cpf')->delete();
			break;
	}
	
	$erros = $filtro->errors();
	$dados = $filtro->data();
	
	if (empty($erros)) {
		$container->cadastro->ativar($dados);
		$app->redirect($app->urlFor('/cadastro/ativado'));
	}
	
	$app->render('cadastro/completar.twig', array(
		'usuario' => $container->usuarios->get(array('key' => $dados['chave'])),
		'chave' => $dados['chave'],
		'ufs' => $container->ufs->getAll(),
		'cidades' => isset($dados['uf']) ? $container->cidades->getDoEstado($dados['uf']) : array(),
		'erros' => $erros,
		'dados' => $app->request()->post(),
		'id_tipo_vendedor_fisico' => 1,
		'id_tipo_vendedor_juridico' => 2
	));
});

$requireLogin = function() use($app) {
	if (isset($container->sessao->usuario)) {
		$container->sessao->usuario = $container->usuarios->get(array('id' => $container->sessao->usuario->id));
		if (isset($container->sessao->usuario)) {
			$container->sessao->vendedor = $container->vendedores->get(array('id' => $container->sessao->usuario->id_vendedor));
		}
	}
	if (!isset($container->sessao->usuario) || !isset($container->sessao->vendedor))
		$app->redirect($app->urlFor('/login'));
};

$app->get('/cadastro/ativado', $requireLogin, function() use($app) {
	$app->render('cadastro/ativado.twig');
});