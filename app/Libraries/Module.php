<?php

namespace App\Libraries;

use CodeIgniter\Model;

class Module extends Model
{
	public static function load($name, $view)
	{
		$data = [
			'key1' => 'val1',
			'key2' => 'val2',
			'params' => [$name,$view]
		];
		echo json_encode($data);
	}
	public static function getData($name, $view)
	{
		$data = [
			'key1' => 'val1',
			'key2' => 'val2'
		];
		viewBlock('layouts/default', 'microformats', $data);
	}
}