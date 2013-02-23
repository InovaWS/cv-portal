<?php
namespace CV\Controller;

use CV\Controller;

class IndexController extends AbstractPortalController
{
	
	protected function getIndexAction()
	{
		$this->app->render('templates/index.twig');
	}
	
}