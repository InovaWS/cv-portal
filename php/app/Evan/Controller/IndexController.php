<?php
namespace Evan\Controller;

use Evan\Controller;

class IndexController extends Controller
{
	
	protected function getIndexAction()
	{
		$this->app->render('templates/index.twig');
	}
	
}