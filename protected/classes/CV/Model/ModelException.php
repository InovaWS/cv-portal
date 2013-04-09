<?php
namespace CV\Model;

class ModelException extends \Exception
{
	
	private $messages;
	
	public function __construct(array $messages = array())
	{
		parent::__construct();
		$this->messages = $messages;
	}
	
	public function getMessages()
	{
		return $this->messages;
	}
	
}