<?php
namespace CV\Controller;

use CV\Application;
use CV\Filter;
use CV\Controller;

class LoginController extends Controller
{
	
	protected function getIndexAction()
	{
	}
	
	protected function postIndexAction()
	{
		$dados = Filter::get(INPUT_POST, array(
			'login' => FILTER_SANITIZE_STRING,
			'senha' => FILTER_SANITIZE_STRING
		));
		
		var_dump($dados);
		
		// TODO: cadastro
	}
	
}