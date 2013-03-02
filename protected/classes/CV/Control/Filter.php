<?php
namespace CV\Control;

class Filter
{
	
	public static function create($data)
	{
		return new Filter($data);
	}
	
	private $originalData;	
	private $data;
	private $errors = array();
	
	private $fields = array();
	private $errorMessage = null;
	
	private function __construct($data)
	{
		$this->originalData = $data;
		$this->data = $data;
	}
	
	public function fields()
	{
		$this->fields = func_get_args();
		
		return $this;
	}
	
	public function crop()
	{
		$data = array();
		foreach ($this->fields as $field)
			$data[$field] = $this->data[$field];
		
		$this->data = $data;
		
		return $this;
	}
	
	public function delete()
	{
		foreach ($this->fields as $field)
			unset($this->data[$field]);
		
		return $this;
	}
	
	public function trim()
	{
		foreach ($this->fields as $field)
			$this->data[$field] = trim($this->data[$field]);
		
		return $this;
	}
	
	public function errorMessage($message)
	{
		$this->errorMessage = $message;
		
		return $this;
	}
	
	public function email()
	{
		$errorMessage = $this->getErrorMessage('email(%field%)');
		
		foreach ($this->fields as $field) {
			if (!preg_match('#^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$#i', $this->data[$field])) {
				$this->data[$field] = null;
				$this->errors[] = str_replace('%field%', $field, $errorMessage);
			}
		}
		
		return $this;
	}
	
	public function length()
	{
		$errorMessage = $this->getErrorMessage('length(%field%, %lengths%)');
		$lengths = func_num_args() > 0 ?
		           (is_array(func_get_arg(0)) ? func_get_arg(0) : func_get_args()) :
		           null;
		
		if ($lengths) {
			foreach ($this->fields as $field) {
				if (!in_array(mb_strlen($this->data[$field]), $lengths)) {
					$this->data[$field] = null;
					$this->errors[] = str_replace(array('%field%', '%lengths%'), array($field, implode(', ', $lengths)), $errorMessage);
				}
			}
		}
		else {
			foreach ($this->fields as $field) {
				if (mb_strlen($this->data[$field]) == 0) {
					$this->data[$field] = null;
					$this->errors[] = str_replace(array('%field%', '%lengths%'), array($field, '>0'), $errorMessage);
				}
			}
		}
		
		return $this;
	}
	
	public function equals()
	{
		$errorMessage = $this->getErrorMessage('equals(%fields%)');
		
		$values = array();
		
		foreach ($this->fields as $field)
			$values[] = $this->data[$field];
		
		if (count(array_unique($values)) != 1)
			$this->errors[] = str_replace('%fields%', implode(', ', $this->fields), $errorMessage);
		
		return $this;
	}
	
	private function getErrorMessage($default)
	{
		$error = $this->errorMessage ? $this->errorMessage : $default;
		$this->errorMessage = null;
		return $error;
	}
	
	public function data()
	{
		return $this->data;
	}
	
	public function errors()
	{
		return $this->errors;
	}
	
	public function reset()
	{
		$this->data = $this->originalData;
		$this->errors = array();
		$this->fields = array();
		$this->errorMessage = null;
	}
}