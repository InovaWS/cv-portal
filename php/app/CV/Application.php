<?php
namespace CV;

use CV\MVC\Application as ApplicationBase;
use Slim\Extras\Views\Twig;

class Application extends ApplicationBase
{
	
	public function __construct()
	{
		parent::__construct();
		
		$this->view("CV\\View\\MultiView");
		Twig::$twigExtensions = array_unique(
			array_merge(Twig::$twigExtensions,
			array('Twig_Extensions_Slim', 'CV\\View\\Twig'))
		);
		Twig::$twigTemplateDirs = array_unique(
			array_merge(Twig::$twigTemplateDirs,
			array(getcwd()))
		);
		
		$this->config('debug', true);
	}
	
	public static function main()
	{
		$app = new Application();
		$app->run();
	}
	
}