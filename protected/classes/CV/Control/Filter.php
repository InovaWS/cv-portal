<?php
namespace CV\Control;

class Filter
{
	
	private $originalData;	
	private $data;
	private $errors;
	
	public function __construct($data)
	{
		$this->originalData = $data;
		$this->data = $data;
		$this->errors = array();
	}
	
	public function fields()
	{
		return $this->map(func_get_args(), function($value) {
			return $value;
		});
	}
	
	public function trim()
	{
		return $this->map(func_get_args(), function($value) {
			return trim($value);
		});
	}
	
	public function email()
	{
		return $this->map(func_get_args(), function($value) {
			return preg_match('/^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i', $value) ? $value : null;
		});
	}
	
	public function length($fieldName, array $lengths)
	{
		if (!in_array(mb_strlen($this->data[$fieldName]), $lengths))
			$this->data[$fieldName] = null;
		
		return $this;
	}
	
	private function map($fieldNames, $callback)
	{
		foreach ($fieldNames as $fieldName) {
			if (empty($this->data[$fieldName]))
				$this->data[$fieldName] = null;
			else
				$this->data[$fieldName] = $callback($this->data[$fieldName]);
		}
		
		return $this;
	}
	
	public function equals($fieldNameA, $fieldNameB)
	{
		if ($this->data[$fieldNameA] != $this->data[$fieldNameB])
			$this->errors[] = "equals($fieldNameA, $fieldNameB)";
		
		return $this;
	}
	
	public function data()
	{
		return $this->data;
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