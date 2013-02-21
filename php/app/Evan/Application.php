<?php
namespace Evan;

use Slim\Extras\Views\Twig;

use Slim\Slim;

class Application extends Slim
{
	
	public function __construct()
	{
		parent::__construct();
		$this->view("Evan\\View\\MultiView");
		Twig::$twigExtensions = array(
			'Twig_Extensions_Slim',
			'Evan\\View\\Twig'
		);
		Twig::$twigTemplateDirs = getcwd();
		$this->config('debug', true);
		
		$this->map('/(:path+)', array($this, 'serveGenericRoute'))->via('GET', 'POST');
		
		$this->contentType('text/html; charset=UTF-8');
	}

	protected function defaultNotFound()
	{
		$this->render('404.html');
	}
	
	public function serveGenericRoute($path = array())
	{
		$action = isset($path[1]) ? $path[1] : 'index';
		$parameters = array_slice($path, 2);
		
		$controller = Controller::create(isset($path[0]) ? $path[0] : 'index');
		
		if (!$controller)
			$this->notFound();
		
		$controller->setApp($this);
		$controller->invoke($this->request()->getMethod(), $action, $parameters);
	}
	
	public static function main()
	{
		$app = new Application();
		$app->run();
	}
	
}