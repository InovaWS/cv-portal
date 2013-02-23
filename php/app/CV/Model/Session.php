<?php
namespace CV\Model;

class Session
{

	private $data;
	
	public function __construct(array &$data = null)
	{
		if ($data === null) {
			session_start();
			$this->data = &$_SESSION;
		}
		else
			$this->data = &$data;
	}
	
	public function __set($key, $value)
	{
		$this->data[$key] = $value;
	}

	public function __get($key)
	{
		return $this->data[$key];
	}
	
	public function __unset($key)
	{
		unset($this->data[$key]);
	}

}