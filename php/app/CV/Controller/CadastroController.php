<?php
namespace CV\Controller;

use CV\Application;

use CV\Filter;

use CV\Controller;

class CadastroController extends Controller
{
	
	protected function getIndexAction()
	{
		$this->app->redirect(Application::getInstance()->url('/login'));
	}
	
	protected function postIndexAction()
	{
		$dados = Filter::get(INPUT_POST, array(
			'nome' => FILTER_SANITIZE_STRING,
			'email' => FILTER_VALIDATE_EMAIL,
			'senha' => FILTER_SANITIZE_STRING,
			'confirmar-senha' => FILTER_SANITIZE_STRING
		));
		
		if (in_array(false, $dados))
			$this->app->redirect(Application::getInstance()->url('/login'));
		
		// TODO: cadastro
	}
	
}