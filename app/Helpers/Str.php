<?php

namespace Helpers;

class Str
{
	public static function contains($search, $str)
	{
		return mb_strpos($str, $search) ? true : false;
	}
	
	public static function equals($search, $str, $delimiter = '/')
	{
		$parts = explode($delimiter, $str);
		return in_array($search, $parts) ? true : false;
	}
	
	public static function isNullOrEmpty($item)
	{
		return isset($item) or !empty($item) ? false : true;
	}
}