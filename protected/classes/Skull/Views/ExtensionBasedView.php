<?php
namespace Skull\Views;

use Slim\Extras\Views\Twig;
use Slim\View;

class ExtensionBasedView extends View
{
	
	private $twigView;
	
	public function __construct()
	{
		$this->twigView = new Twig();
	}
	
	public function render($template)
	{
		$ext = strtolower(pathinfo($template, PATHINFO_EXTENSION));
		
		switch ($ext) {
			case 'php':
				ob_start();
				include realpath($this->getTemplatesDirectory() . '/' . $template);
				return ob_get_clean();
				
			case 'twig':
				$this->twigView->setData($this->data);
				
				if ($this->twigView->getTemplatesDirectory() != $this->getTemplatesDirectory()) {
						$this->twigView->setTemplatesDirectory($this->getTemplatesDirectory());
						$this->twigView->getEnvironment()->addExtension(new \Twig_Extensions_Slim());
						$this->twigView->getEnvironment()->addExtension(new SkullTwigExtension());
				}
				return $this->twigView->render($template);
			
			default:
				return file_get_contents(realpath($this->getTemplatesDirectory() . '/' . $template));
		}
	}
	
}