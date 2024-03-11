<?php

namespace Helpers;

class Arr
{
	public static function extract($key, &$arr)
	{
		$item = array_key_exists($key, $arr) ? $arr[$key] : false;
		if (isset($item)) {
			unset($arr[$key]);
		}
		return $item;
	}
}