<?php
namespace CV\Controller;

use CV\Controller;

class IndexController extends Controller
{
	
	protected function getIndexAction()
	{
		$this->app->render('templates/index.twig');
	}
	
}