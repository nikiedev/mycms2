<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
	protected $useTimestamps = true;
	
	public function getNotifications()
	{
		return $this->db->table('notifications')
			->select(
				'notifications.*, users.*,
				users.id AS u_id,
				users_group.id AS g_id,
				users_group.name AS g_name,
				users_status.id AS s_id,
				users_status.name AS s_name'
			)
			->join(
				'users',
				'notifications.user_id = users.id',
				'left'
			)
			->join(
				'users_group',
				'users.id = users_group.id',
				'left'
			)
			->join(
				'users_status',
				'users.status = users_status.id',
				'left'
			)
			->get()
			->getResult();
	}

}