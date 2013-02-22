<?php
namespace CV;

class Filter
{
	
	const INPUT_GET = INPUT_GET;
	const INPUT_POST = INPUT_POST;
	
	public static function get($input, $filters)
	{
		return filter_input_array($input, $filters);
	}
	
}