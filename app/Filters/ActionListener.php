<?php

namespace App\Filters;

use App\Controllers\Article;
use App\Models\ArticleModel;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class ActionListener implements FilterInterface
{
	
	public function before(RequestInterface $request, $arguments = null)
	{
		// TODO: Implement before() method.
	}
	
	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		if (Article::$isFullView) {
			Article::hitsAdd(Article::$item->hits, Article::$item->url);
		}
	}
}