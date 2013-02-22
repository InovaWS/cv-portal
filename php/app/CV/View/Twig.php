<?php
namespace CV\View;

class Twig extends \Twig_Extension
{
	public function getName()
	{
		return 'evan\\view\\twig';
	}

	public function getFunctions()
	{
		return array(
				'url' => new \Twig_Function_Method($this, 'url'),
		);
	}

	public function url($uri, $complete = false, $appName = 'default')
	{
		$request = \Slim\Slim::getInstance($appName)->request();
		
		if ($complete)
			return $request->getScheme() . '://' . $request->getHost() . $request->getRootUri() . $uri;
		else
			return $request->getRootUri() . $uri;
	}
}