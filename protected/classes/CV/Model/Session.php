<?php
namespace CV\Model;

class Session implements \ArrayAccess
{
	
	private $data;
	
	public function __construct(array &$data = null)
	{
		if ($data === null) {
			if (!session_id()) {
				session_cache_limiter(false);
				session_start();
			}
			
			$this->data = &$_SESSION;
		}
		else
			$this->data = &$data;
	}
	
	public function offsetExists($key)
	{
		return array_key_exists($key, $this->data);
	}
	
	public function offsetGet($key)
	{
		return $this->data[$key];
	}
	
	public function offsetSet($key, $value)
	{
		return $this->data[$key] = $value;
	}
	
	public function offsetUnset($key)
	{
		unset($this->data[$key]);
	}
	
	public function __isset($key)
	{
		return $this->offsetExists($key);
	}
	
	public function __get($key)
	{
		return $this->offsetGet($key);
	}
	
	public function __set($key, $value)
	{
		return $this->offsetSet($key, $value);
	}
	
	public function __unset($key)
	{
		return $this->offsetUnset($key);
	}
	
	public function get($key)
	{
		if ($this->offsetExists($key))
			return $this->offsetGet($key);
		else
			return null;
	}
	
}