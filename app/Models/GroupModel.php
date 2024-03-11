<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupModel extends Model
{
	
	public function getGroups()
	{
		return $this->db->table('users_group')
			->get()
			->getResult();
	}

}