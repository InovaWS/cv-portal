<?php
namespace CV\Controller;

use CV\MVC\Controller;
use CV\Model\Session;

abstract class AbstractPortalController extends Controller
{
	
	protected $sessao;
	
	public function __construct()
	{
		$this->sessao = new Session();
				
		parent::__construct();
	}
	
}