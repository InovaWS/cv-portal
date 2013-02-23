<?php
namespace CV\Controller;

use CV\Application;
use CV\Filter;
use CV\Controller;

class LoginController extends AbstractPortalController
{
	
	protected function getIndexAction()
	{
		$this->app->render('templates/login.twig');
	}
	
	protected function postIndexAction()
	{
		$dados = Filter::get(INPUT_POST, array(
			'login' => FILTER_SANITIZE_STRING,
			'senha' => FILTER_SANITIZE_STRING
		));
		
		if (!in_array(false, $dados)) {
			
		}
		
		$this->app->flash('erro_login', 'Login inválido.');
		$this->app->render('templates/login.twig', $dados);
	}
	
}