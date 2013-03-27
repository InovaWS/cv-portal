<?php
namespace Rio\Slim;

class TwigExtension extends \Twig_Extension
{
	public function getName()
	{
		return 'Rio\Slim\TwigExtension';
	}

	public function getFunctions()
	{
		return array(
			'url' => new \Twig_Function_Method($this, 'url'),
			'resource' => new \Twig_Function_Method($this, 'resource')
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
	
	public function resource($path, $appName = 'default')
	{
		return file_get_contents(getcwd() . $path);
	}
}