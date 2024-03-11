<?php

namespace App\Helpers;

use CodeIgniter\Model;

class Module extends Model
{
	public static $list = null;
	
	public static function loadModules()
	{
		$dir = APPPATH . 'Modules';
		if ($handle = opendir(APPPATH . 'Modules')) {
			while (false !== ($entry = readdir($handle))) {
				if ($entry != '.' and $entry != '..') {
					$file = $dir . '/' . $entry . '/module.json';
					if (file_exists($file)) {
						Module::$list[$entry] = json_decode(file_get_contents($file));
					}
				}
			}
			closedir($handle);
		}
	}
	
	public function getModules() {
		$modules = $this->db->table('modules')
			->getAll();
		
		$data = [];
		
		for ($i = 0; $i < count($modules); $i++) {
			
			$name = $modules[$i]->name;
			unset($modules[$i]->name);
			$data[$name] = $modules[$i];
		}
		
		return $data;
	}
	
	public static function htmlStart()
	{
		ob_start();
	}
	
	public static function htmlEnd()
	{
		return ob_get_clean();
	}
	
	public static function load($name, $action)
	{
		return view_cell('\Modules\Shop\Controllers\ShopController::productList');
//		return Module::$list[$name];
	}
	
	protected function createTable($sql)
	{
		return $this->db->query($sql)->exec();
	}
	
	protected function dropTable($sql)
	{
		return $this->db->query($sql)->exec();
	}
}
