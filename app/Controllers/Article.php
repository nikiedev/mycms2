<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\CategoryModel;
use App\Models\TagModel;

class Article extends BaseController
{
	public static $isFullView = false;
	
	public static $item = null;
	
	public function index()
	{
//		$this->cachePage(30);
		
		$this->data['page'] = (new ArticleModel())->getHome();
		
		return view('index', $this->data);
	}
	
	// articles
	public function articles($url, $key, $title)
	{
		switch ($key)
		{
			case 'sort':
				
				$orderType = 'DESC';
				
				if ($title == 'date_asc' or $title == 'date_desc') {
					$orderTitle = 'created_at';
				} else {
					$orderTitle = $title;
				}
				
				if (in_array($title, ['date_asc', 'title'])) {
					$orderType = 'ASC';
				}
				
				$order = [
					'title' => $orderTitle,
					'type' => $orderType
				];
				
				$this->data['articles'] = (new ArticleModel())->getArticlesSortedBy($url, $order);
				
				break;
				
			default:
				break;
		}
			
		return $this->response->setJSON($this->data['articles']);
	}
	
	/**
	 * @param ...$url
	 * @return \CodeIgniter\HTTP\RedirectResponse|string
	 *
	 * Smart routing
	 */
	public function article(...$url)
	{
		// $urlParams = array_filter($url);
		$last = $url[count($url) - 1];
		
		$articleModel = new ArticleModel();
		$categoryModel = new CategoryModel();
		$categoryInfo = $categoryModel->getCategoryInfo();
		
		// get the article data with parent url
		$result = $categoryModel->getParentUrl($last);
		
		$this->data['tags'] = (new TagModel())->getTags();
		$this->data['categories'] = $categoryModel->getCategoryStructure();
		$this->data['breadcrumbs'] = $categoryModel->getBreadcrumbs($url);

		// check if tag
		if (strpos($this->request->getPath(), 'tags-') === 0) {
			$tags = array_filter(explode(',', substr($this->request->getPath(), 5)));
			// search articles by tag(s)
			$this->data['articles'] = $articleModel->getArticlesByTags($tags);
			
			return view('blog', $this->data);
		}
		
		// check if category
		if (in_array($last, $categoryInfo->category)) {
			
			if ($this->request->getPath() !== $result->parent_url) {
				return redirect()->to(base_url($result->parent_url));
			}
			
			$this->data['articles'] = $articleModel->getArticlesByCategory(
				$categoryInfo->index[$last], $categoryModel
			);
			
			return view('blog', $this->data);
		}
		
		// check if article/page exists
		if (isset($result->page)) {
			
			self::$isFullView = true;
			
			// check if page
			if ($result->page == 1) {
				
				if ($this->request->getPath() !== $last and !isset($result->c_id)) {
					return redirect()->to(base_url($last));
				}
				$this->data['page'] = $articleModel->getArticle($last, 1);
				self::$item = $this->data['page'];
				
				return view('page', $this->data);
			}
			
			// check if article
			if (!(strpos($this->request->getPath(), $result->parent_url) !== false) and $result->page == 0) {
				if (base_url() === $result->parent_url and !isset($result->c_id) and $this->request->getPath() !== $last) {
					return redirect()->to(base_url($result->parent_url . '/' . $last));
				}
				if (base_url() !== $result->parent_url and isset($result->c_id)) {
					return redirect()->to(base_url($result->parent_url . '/' . $last));
				}
			}
			
			$this->data['article'] = $articleModel->getArticle($last);
			self::$item = $this->data['article'];
			
			return view('article', $this->data);
		}
		
		return view('error');
	}
	
	public function contact()
	{
		return view('contact', $this->data);
	}
	
	public function error()
	{
		return view('error');
	}
	
	public static function hitsAdd($n, $url)
	{
		(new ArticleModel())->hitsAdd($n, $url);
	}
	
}
