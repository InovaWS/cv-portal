<?php
namespace CV\Control;

class Filter
{
	
	private $originalData;	
	private $data;
	private $errors;
	
	private $errorMessage;
	private $stopOnError;
	private $bypass;
	
	private function __construct($data)
	{
		$this->originalData = $data;
		$this->data = $data;
		$this->errors = array();
		$this->message = null;
		$this->stopOnError = false;
		$this->bypass = false;
	}
	
	private function filter($callback, $errorMessage = "", array $args)
	{
		if ($this->bypass)
			return $this;
		
		if ($this->errorMessage) {
			$errorMessage = $this->errorMessage;
			$this->errorMessage = null;
		}
		
		if (!call_user_func_array($callback, $args)) {
			$this->errors[] = $errorMessage;
			
			if ($this->stopOnError)
				$this->bypass = true;
		}
		
		return $this;
	}
	
	public function fields()
	{
		return $this->filter(array($this, '_fields'), "", func_get_args());
	}
	
	private function _fields()
	{
		foreach ($this->data as $field => $value) {
			if (!in_array($field, func_get_args()))
				$this->data[$field] = null;
		}
			
		return true;
	}
	
	public function trim()
	{
		return $this->filter(array($this, '_trim'), "", func_get_args());
	}
	
	private function _trim()
	{
		foreach ($this->data as $field => $value) {
			if (!in_array($field, func_get_args()))
				$this->data[$field] = null;
		}
		
		return true;
	}
	
	public function email()
	{
		return $this->map(func_get_args(), function($field, $value) {
			
		});
	}
	
	private function _email() {
		foreach ($this->data as $field => $value) {
			if (!in_array($field, func_get_args()))
				$this->data[$field] = null;
		}
	}
	
	public function length($fieldName, array $lengths)
	{
		if ($this->bypass)
			return $this;
		
		if (!in_array(mb_strlen($this->data[$fieldName]), $lengths)) {
			$this->errorMessage("length($fieldName)");
			$this->data[$fieldName] = null;
		}
		
		return $this;
	}
	
	private function map($fieldNames, $callback)
	{
		if ($this->bypass)
			return $this;
		
		foreach ($fieldNames as $fieldName) {
			if (empty($this->data[$fieldName]))
				$this->data[$fieldName] = null;
			else
				$this->data[$fieldName] = $callback($fieldName, $this->data[$fieldName]);
		}
		
		return $this;
	}
	
	public function equals($fieldNameA, $fieldNameB)
	{
		if ($this->bypass)
			return $this;
		
		if ($this->data[$fieldNameA] != $this->data[$fieldNameB])
			$this->errorMessage("equals($fieldNameA, $fieldNameB)");
		
		return $this;
	}
	
	public function data()
	{
		return $this->data;
	}
	
	public function errors() {
		return $this->errors;
	}
	
	public function onError($message, $stopOnError = null)
	{
		if ($this->bypass)
			return $this;
		
		$this->errorMessage = $message;
		if ($this->stopOnError !== null)
			$this->stopOnError = $stopOnError;
		return $this;
	}
	
	private function errorMessage($defaultMessage)
	{
		if ($this->errorMessage) {
			$defaultMessage = $this->errorMessage;
			$this->errorMessage = null;
		}
		
		$this->errors[] = $defaultMessage;
		if ($this->stopOnError)
			$this->bypass = true;
	}
	
	public static function create($data)
	{
		return new Filter($data);
	}
	
	const INPUT_GET = INPUT_GET;
	const INPUT_POST = INPUT_POST;
	
	const FILTER_STRING = 'trim';
	const FILTER_EMAIL = 'email';
	
	public static function get($input, $filters)
	{
		return filter_input_array($input, $filters);
	}
	
	public static function apply($data, $filters)
	{
		$retorno = array();
		
		foreach ($filters as $field => $filter) {
			
			switch ($filter['filter']) {
				case self::FILTER_EMAIL:
					
					break;
				
				case self::FILTER_TRIM:
					
					break;
			}
			
		}
		
		var_dump($retorno);
		exit;
		
		return $retorno;
	}
	
}