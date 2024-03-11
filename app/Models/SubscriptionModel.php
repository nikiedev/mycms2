<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Services;
use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;

class SubscriptionModel extends Model
{
	protected $useTimestamps = true;
	protected $createdField  = 'date_subscribe';
	
	public function getSubscriptions()
	{
		return $this->db->table('subscriptions')
			->select(
				'subscriptions.*,
				users.id AS u_id
				users_groups.id AS g_id,
				users_groups.name AS g_name,
				users_status.id AS s_id,
				users_status.name AS s_name'
			)
			->join(
				'users',
				'subscriptions.user_id = users.id',
				'left'
			)
			->join(
				'users_group',
				'users.user_id = users_group.id',
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
	
	public function addSubscription($email)
	{
		$result = [];
		
		$user = $this->db->table('users')
			->where('email', $email)
			->get()->getRow();
		
		if (isset($user)) {
			$result['success'] = false;
			$result['exists'] = true;
			$result['info'] = 'Такая почта уже существует!';
			return $result;
		}
		
		$generator = new ComputerPasswordGenerator();
		
		$generator
			->setUppercase()
			->setLowercase()
			->setNumbers()
			->setSymbols(false)
			->setLength(12);
		
		$password = $generator->generatePassword();
		
		$hash = password_hash($password, PASSWORD_DEFAULT);

		$result['success'] = $this->db->table('users')
			->insert([
				'email' => $email,
				'pass' => $hash,
				'status' => 1
			]);
		
		if (!$result['success']) {
			$result['info'] = 'Ошибка! Не удалось создать пользователя.';
			return $result;
		}
		
		$id = $this->db->insertID();
		$login = 'user' . $id;
		$result['success'] = $this->db->table('users')
			->where('id', $id)
			->update([
				'login' => $login
			]);
		
		if (!$result['success']) {
			$result['info'] = 'Ошибка! Не удалось сгенерировать логин.';
			return $result;
		}
		
		$result['success'] = $this->db->table('subscriptions')
			->insert([
				'user_id' => $id
			]);
		
		if (!$result['success']) {
			$result['info'] = 'Ошибка! Не удалось создать подписчика.';
			return $result;
		}
		
		$mailer = Services::email();
		
		$mailer->setFrom('info@mycms.local', 'Advant Travel');
		
		$mailer->setTo($email);
//		$email->setCC('another@another-example.com');
//		$email->setBCC('them@their-example.com');
		
		$mailer->setSubject('Email Test Message');
		$mailer->setMessage('Testing the email class.');
		
		if (!$mailer->send())
		{
			$result['info'] = 'Ошибка! Не удалось отправить сообщение.';
			return $result;
		}
		
		//$login = trim(substr($email, 0, strrpos($email, '@')), ' -.,:;\'"+|=&%#@$!()/^*<>');
		//str_replace([' -.,:;\'"+|=&%#@$!()/^*<>'], '', $email);
		$result['info'] = 'Успех! Подписка оформлена.';
		return $result;
	}
	
	public function deleteSubscription($id)
	{
		$user = $this->db->table('subscriptions')
			->where([
				'id' => $id,
				'date_unsubscribe' => null
			])
			->get()->getRow();
		
		if (isset($user)) {
		
		}
	}
	
}