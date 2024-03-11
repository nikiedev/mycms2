<?php


namespace Modules\Seo;


class Seo
{
	public static function getData($name, $view)
	{
		$data = [
			'key1' => 'val1',
			'key2' => 'val2'
		];
		viewBlock('@modules/seo/microformats', $data);
	}
}