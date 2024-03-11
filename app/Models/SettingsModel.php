<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingsModel extends Model
{
	
	public function getSettings()
	{
		return $this->db->table('settings')
			->get()
			->getResult();
	}

}