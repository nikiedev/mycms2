<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $useTimestamps = true;
	
	public function getUsers()
	{
		return $this->db->table('users')
			->select(
				'users.*,
				users_group.id AS g_id,
				users_group.name AS g_name,
				users_status.id AS s_id,
				users_status.name AS s_name'
			)
			->join(
				'users_group',
				'users_group.id = users.group_id',
				'left'
			)
			->join(
				'users_status',
				'users_status.id = users.status',
				'left'
			)
			->get()
			->getResult();
	}
	
	public function getUserStatuses()
	{
		return $this->db->table('users_status')
			->get()
			->getResult();
	}
	
	public function getUser($login)
	{
		return $this->db->table('users')
			->select(
				'users.*,
				users_group.id AS g_id,
				users_group.name AS g_name,
				users_status.id AS s_id,
				users_status.name AS s_name'
			)
			->join(
				'users_group',
				'users_group.id = users.group_id',
				'left'
			)
			->join(
				'users_status',
				'users_status.id = users.status',
				'left'
			)
			->where('login', $login)
			->get()
			->getRow();
	}
	
}