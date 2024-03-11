<?php

namespace App\Controllers;

use App\Models\SubscriptionModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\Request;
use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;

class User extends BaseController
{
	public function account(Request $url = null)
	{
		return view('article', ['key' => ['id' => 1, 'name' => 'imya']]);
	}
	
	public function profile(Request $url = null)
	{
		
		return view('article', ['key' => ['id' => 1, 'name' => 'imya']]);
	}
	
	public function login()
	{
		if ($this->request->getMethod() == 'post')
		{
//			dd($this->request->getPost());
			$model = new UserModel();
			
			$login = $this->request->getPost('login');
			$password = $this->request->getPost('password');
//			$password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
			
			$user = $model->getUser($login);
			
			if (password_verify($password, $user->pass))
			{
				session()->set('user', $user);
				
				return redirect()->to(base_url('admin/dashboard'));
			}
			
			return redirect()->to(base_url('admin/login'));
		}
		
		return view('admin/login');
	}
	
	public function logout()
	{
		session()->destroy();
		return redirect()->to(base_url('admin/login'));
	}
	
	public function subscribe()
	{
		$email = $this->request->getVar('email');
		
		$result = (new SubscriptionModel())->addSubscription($email);
		
		return $this->response->setJSON($result);
	}
	
	public function unsubscribe($id)
	{
		$result = (new SubscriptionModel())->deleteSubscription($id);
	}
}
