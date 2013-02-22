<?php
namespace CV\View;

use Slim\View;

class MultiView extends View
{
	private $classes = array(
		'*' => null,
		'twig' => 'Slim\Extras\Views\Twig'
	);
	
	public function __construct()
	{
		foreach ($this->classes as $extension => &$view)
		{
			if ($view)
				$view = new $view();
		}
	}
	
	public function render($template)
    {
    	$ext = strtolower(pathinfo($template, PATHINFO_EXTENSION));
    	
    	$view = isset($this->classes[$ext]) ? $this->classes[$ext] : $this->classes['*'];
    	
    	if (!$view) {
    		return file_get_contents($template);
    	}
    	else
    		return $view->render($template);
    }
	
}