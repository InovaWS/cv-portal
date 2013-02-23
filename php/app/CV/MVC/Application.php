<?php
namespace CV\MVC;

use Slim\Slim;

class Application extends Slim
{
	
	public function __construct()
	{
		parent::__construct();
		
		$this->post('/(:path+)', array($this, 'serveGenericRoute'));
		$this->get('/(:path+)', array($this, 'serveGenericRoute'));
		
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
	
	public function url($uri, $complete = false)
	{
		$request = $this->request();
		
		if ($complete)
			return $request->getScheme() . '://' . $request->getHost() . $request->getRootUri() . $uri;
		else
			return $request->getRootUri() . $uri;
	}
}