<?php

namespace App\Filters;

use App\Models\UserModel;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Noauth implements FilterInterface
{
	public function before(RequestInterface $request, $arguments = null)
	{
		if (isset(session()->get('user')->group_id) and session()->get('user')->group_id == 1) {
			if ($request->uri->getPath() == 'admin/login')
			{
				return redirect()->to(base_url('admin/dashboard'));
			}
			return redirect()->to(base_url($request->uri->getPath()));
		}
	}
	
	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		// TODO: Implement after() method.
	}
}