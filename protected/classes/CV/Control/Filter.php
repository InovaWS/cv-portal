<?php
namespace CV\Control;

class Filter
{
	
	const INPUT_GET = INPUT_GET;
	const INPUT_POST = INPUT_POST;
	
	const FILTER_TRIM = 'trim';
	
	public static function get($input, $filters)
	{
		return filter_input_array($input, $filters);
	}
	
}