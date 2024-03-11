<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\CategoryModel;
use App\Models\CommentModel;
use App\Models\FileManagerModel;
use App\Models\GroupModel;
use App\Models\MenuModel;
use App\Models\MessageModel;
use App\Models\NotificationModel;
use App\Models\TagModel;
use App\Models\UserModel;

class Admin extends BaseController
{
	private $page = 'admin/partials/';
	
	public function dashboard()
	{
		$this->data['page'] = $this->page . 'dashboard';
		
		return view('admin/index', $this->data);
	}
	
	public function pages()
	{
		$this->data['list'] = (new ArticleModel())->getArticles(null, 1);
		$this->data['page'] = $this->page . 'page/_list';
		$this->data['fullPaths'] = (new CategoryModel())->getFullPaths();
		
		return view('admin/index', $this->data);
	}
	
	public function page($action, $id = 0)
	{
		$this->data['page'] = $this->page . 'page/_' . $action;
		
		$model = new ArticleModel();
		
		switch ($action) {
			case 'view':
				$this->data['item'] = $model->getArticleById($id, null, 1);
				$this->data['fullPaths'] = (new CategoryModel())->getFullPaths();
				break;
			case 'add':
				if ($this->request->getMethod() == 'post') {
					$result = $model->addArticle($this->request);
					if ($result['success']) {
						return redirect()->to(base_url('/admin/page' . $result['action']));
					}
				} else {
					$this->data['categories'] = (new CategoryModel())->getCategories();
					$this->data['tags'] = (new TagModel())->getTags();
					$this->data['statuses'] = $model->getStatuses();
				}
				break;
			case 'edit':
				if ($this->request->getMethod() == 'post') {
					$result = $model->editArticle($id, $this->request);
					if ($result['success']) {
						return redirect()->to(base_url('/admin/page' . $result['action']));
					}
				} else {
					$this->data['item'] = $model->getArticleById($id, null, 1);
					$this->data['categories'] = (new CategoryModel())->getCategories();
					$this->data['tags'] = (new TagModel())->getTags();
					$this->data['statuses'] = $model->getStatuses();
					session()->set('item', $this->data['item']);
				}
				break;
			case 'delete':
				$result['id'] = $model->deleteArticle($id);
				return $this->response->setJSON($result);
			default:
				$this->data['item'] = false;
				if (session()->has('item')) {
					session()->remove('item');
				}
				break;
		}
		
		return view('admin/index', $this->data);
	}
	
	public function articles()
	{
		$this->data['list'] = (new ArticleModel())->getArticles();
		$this->data['page'] = $this->page . 'article/_list';
		$this->data['fullPaths'] = (new CategoryModel())->getFullPaths();
		
		return view('admin/index', $this->data);
	}
	
	public function article($action, $id = 0)
	{
		$this->data['page'] = $this->page . 'article/_' . $action;
		
		$model = new ArticleModel();
		
		switch ($action) {
			case 'view':
				$this->data['item'] = $model->getArticleById($id);
				$this->data['fullPaths'] = (new CategoryModel())->getFullPaths();
				$model->tagObjectsToLists($this->data['item']);
				break;
			case 'add':
				if ($this->request->getMethod() == 'post') {
					$result = $model->addArticle($this->request);
					if ($result['success']) {
						return redirect()->to(base_url('/admin/article' . $result['action']));
					}
				} else {
					$this->data['categories'] = (new CategoryModel())->getCategories();
					$this->data['tags'] = (new TagModel())->getTags();
					$this->data['statuses'] = $model->getStatuses();
					$model->tagObjectsToLists($this->data['item']);
				}
				break;
			case 'edit':
				if ($this->request->getMethod() == 'post') {
					$result = $model->editArticle($id, $this->request);
					if ($result['success']) {
						return redirect()->to(base_url('/admin/article' . $result['action']));
					}
				} else {
					$this->data['item'] = $model->getArticleById($id);
					$this->data['categories'] = (new CategoryModel())->getCategories();
					$this->data['tags'] = (new TagModel())->getTags();
					$this->data['statuses'] = $model->getStatuses();
					$model->tagObjectsToLists($this->data['item']);
					session()->set('item', $this->data['item']);
				}
				break;
			case 'delete':
				$result['id'] = $model->deleteArticle($id);
				return $this->response->setJSON($result);
			default:
				$this->data['item'] = false;
				if (session()->has('item')) {
					session()->remove('item');
				}
				break;
		}
		
		return view('admin/index', $this->data);
	}
	
	public function categories()
	{
		$model = new CategoryModel();
		$this->data['list'] = $model->getCategories();
		$this->data['structure'] = $model->getCategoryStructure($this->data['list']);
		$this->data['fullPaths'] = $model->getFullPaths();
		$this->data['page'] = $this->page . 'category/_list';
		
		return view('admin/index', $this->data);
	}
	
	public function category($action, $id = 0)
	{
		$this->data['page'] = $this->page . 'category/_' . $action;
		
		$model = new CategoryModel();
		
		switch ($action) {
			case 'view':
				$this->data['item'] = $model->getCategoryById($id);
				break;
			case 'add':
				if ($this->request->getMethod() == 'post') {
					$result = $model->addCategory($this->request);
					if ($result['success']) {
						return redirect()->to(base_url('/admin/category' . $result['action']));
					}
				} else {
					$this->data['categories'] = $model->getCategories();
				}
				break;
			case 'edit':
				if ($this->request->getMethod() == 'post') {
					$result = $model->editCategory($id, $this->request);
					if ($result['success']) {
						return redirect()->to(base_url('/admin/category' . $result['action']));
					}
				} else {
					$this->data['item'] = $model->getCategoryById($id);
					$this->data['categories'] = $model->getCategories();
				}
				break;
			case 'delete':
				$result['id'] = $model->deleteCategory($id);
				return $this->response->setJSON($result);
			default:
				$this->data['item'] = false;
				break;
		}
		
		return view('admin/index', $this->data);
	}
	
	public function tags()
	{
		$this->data['list'] = (new TagModel())->getTags();
		$this->data['page'] = $this->page . 'tag/_list';
		
		return view('admin/index', $this->data);
	}
	
	public function tag($action, $id = 0)
	{
		$this->data['page'] = $this->page . 'tag/_' . $action;
		
		$model = new TagModel();
		
		switch ($action) {
			case 'view':
				$this->data['item'] = $model->getTagById($id);
				break;
			case 'add':
				if ($this->request->getMethod() == 'post') {
					$result = $model->addTag($this->request);
					if ($result['success']) {
						return redirect()->to(base_url('/admin/tag' . $result['action']));
					}
				} else {
					$this->data['tags'] = $model->getTags();
				}
				break;
			case 'edit':
				if ($this->request->getMethod() == 'post') {
					$result = $model->editTag($id, $this->request);
					if ($result['success']) {
						return redirect()->to(base_url('/admin/tag' . $result['action']));
					}
				} else {
					$this->data['item'] = $model->getTagById($id);
					$this->data['tags'] = $model->getTags();
				}
				break;
			case 'delete':
				$result['id'] = $model->deleteTag($id);
				return $this->response->setJSON($result);
			default:
				$this->data['item'] = false;
				break;
		}
		
		return view('admin/index', $this->data);
	}
	
	public function articleStatuses()
	{
		$this->data['list'] = (new ArticleModel())->getStatuses();
		$this->data['page'] = $this->page . '/article-status/_list';
		
		return view('admin/index', $this->data);
	}
	
	public function articleStatus($action, $id = 0)
	{
		$this->data['page'] = $this->page . 'article-status/_' . $action;
		
		$model = new ArticleModel();
		
		switch ($action) {
			case 'view':
				$this->data['item'] = $model->getStatusById($id);
				break;
			case 'add':
				if ($this->request->getMethod() == 'post') {
					$result = $model->addStatus($this->request);
					if ($result['success']) {
						return redirect()->to(base_url('/admin/article-status' . $result['action']));
					}
				}
				break;
			case 'edit':
				if ($this->request->getMethod() == 'post') {
					$result = $model->editStatus($id, $this->request);
					if ($result['success']) {
						return redirect()->to(base_url('/admin/article-status' . $result['action']));
					}
				} else {
					$this->data['item'] = $model->getStatusById($id);
				}
				break;
			case 'delete':
				$result['id'] = $model->deleteStatus($id);
				return $this->response->setJSON($result);
			default:
				$this->data['item'] = false;
				break;
		}
		
		return view('admin/index', $this->data);
	}
	
	public function users()
	{
		$this->data['list'] = (new UserModel())->getUsers();
		$this->data['page'] = $this->page . 'user/_list';
		
		return view('admin/index', $this->data);
	}
	
	public function user($action, $id = 0)
	{
	
	}
	
	public function groups()
	{
		$this->data['list'] = (new GroupModel())->getGroups();
		$this->data['page'] = $this->page . 'group/_list';
		
		return view('admin/index', $this->data);
	}
	
	public function group($action, $id = 0)
	{
	
	}
	
	public function userStatuses()
	{
		$this->data['list'] = (new UserModel())->getUserStatuses();
		$this->data['page'] = $this->page . '/user-status/_list';
		
		return view('admin/index', $this->data);
	}
	
	public function userStatus($action, $id = 0)
	{
	
	}
	
	public function menus()
	{
		$model = new MenuModel();
		$this->data['userMenu'] = $model->getMenu(2); // before - was MultiLevelMenu
		$this->data['structure'] = $model->getMenuStructure($this->data['userMenu']);
		$this->data['page'] = $this->page . 'menu/_list';
		
		return view('admin/index', $this->data);
	}
	
	public function menu($action, $id = 0)
	{
		$this->data['page'] = $this->page . 'menu/_' . $action;
		
		$model = new MenuModel();
		
		switch ($action) {
			case 'view':
				$this->data['item'] = $model->getItemById($id);
				break;
			case 'add':
				if ($this->request->getMethod() == 'post') {
					$result = $model->addItem($this->request);
					if ($result['success']) {
						return redirect()->to(base_url('/admin/menu' . $result['action']));
					}
				} else {
					$this->data['menuItems'] = $model->getMenu(2);
					$this->data['menuTypes'] = $model->getMenuTypes();
					$this->data['menuSides'] = $model->getMenuSides();
				}
				break;
			case 'edit':
				if ($this->request->getMethod() == 'post') {
					$result = $model->editItem($id, $this->request);
					if ($result['success']) {
						return redirect()->to(base_url('/admin/menu' . $result['action']));
					}
				} else {
					$this->data['item'] = $model->getItemById($id);
					$this->data['menuItems'] = $model->getMenu($this->data['item']->side_id);
					$this->data['menuTypes'] = $model->getMenuTypes();
					$this->data['menuSides'] = $model->getMenuSides();
				}
				break;
			case 'delete':
				$result['id'] = $model->deleteItem($id);
				return $this->response->setJSON($result);
			default:
				$this->data['item'] = false;
				break;
		}
		
		return view('admin/index', $this->data);
	}
	
	public function menuTypes()
	{
		$this->data['list'] = (new MenuModel())->getMenuTypes();
		$this->data['page'] = $this->page . 'menu-type/_list';
		
		return view('admin/index', $this->data);
	}
	
	public function menuType($action, $id = 0)
	{
		$this->data['page'] = $this->page . 'menu-type/_' . $action;
		
		$model = new MenuModel();
		
		switch ($action) {
			case 'view':
				$this->data['item'] = $model->getTagById($id);
				break;
			case 'add':
				if ($this->request->getMethod() == 'post') {
					$result = $model->addTag($this->request);
					if ($result['success']) {
						return redirect()->to(base_url('/admin/menu-type' . $result['action']));
					}
				} else {
					$this->data['tags'] = $model->getTags();
				}
				break;
			case 'edit':
				if ($this->request->getMethod() == 'post') {
					$result = $model->editTag($id, $this->request);
					if ($result['success']) {
						return redirect()->to(base_url('/admin/menu-type' . $result['action']));
					}
				} else {
					$this->data['item'] = $model->getTagById($id);
					$this->data['tags'] = $model->getTags();
				}
				break;
			case 'delete':
				$result['id'] = $model->deleteTag($id);
				return $this->response->setJSON($result);
			default:
				$this->data['item'] = false;
				break;
		}
		
		return view('admin/index', $this->data);
	}
	
	public function comments()
	{
		$this->data['list'] = (new CommentModel())->getComments();
		$this->data['page'] = $this->page . 'comment/_list';
		
		return view('admin/index', $this->data);
	}
	
	public function comment($action, $id = 0)
	{
	
	}
	
	public function messages()
	{
		$this->data['list'] = (new MessageModel())->getMessages();

		$this->data['page'] = $this->page . 'message/_list';
		
		return view('admin/index', $this->data);
	}
	
	public function message($action, $id = 0)
	{
	
	}
	
	public function notifications()
	{
		$this->data['list'] = (new NotificationModel())->getNotifications();
		$this->data['page'] = $this->page . 'notification/_list';
		
		return view('admin/index', $this->data);
	}
	
	public function notification($action, $id = 0)
	{
	
	}
	
	public function media()
	{
//		if ($this->request-> st('do') !== null) {
//			echo json_encode($this->request->post('do'));
//			exit;
//		}
		
		$this->data['page'] = $this->page . 'media/filemanager';
		
		$fileManager = new FileManagerModel();
		
		$fileManager->setLocaleUTF8();
		$fileManager->setMaxUploadFile();
		
		$this->data['allow_create_folder'] = $fileManager->allow_create_folder;
		$this->data['allow_upload'] = $fileManager->allow_upload;
		$this->data['allow_direct_link'] = $fileManager->allow_direct_link;
		$this->data['allow_delete'] = $fileManager->allow_delete;
		$this->data['allow_show_folders'] = $fileManager->allow_show_folders;
		$this->data['MAX_UPLOAD_SIZE'] = $fileManager->MAX_UPLOAD_SIZE;
		
//		if ($this->request->getMethod() == 'POST') {
			$file = $this->request->getFile('file') ?: '.';
			
			$fileManager->makeAction($file);
			$tmp = $fileManager->getFullPath($file);
		$fileManager->checkXSRF($tmp, $file);


//		$this->data['list'] = (new Menu())->getMenu();

//		dd(base_url());
//		define('FM_EMBED', true);
//		define('DOCUMENT_ROOT', base_url(uri_string()));
//		define('FM_SELF_URL', uri_string());
//		require APPPATH . 'Views/admin/media.php';
//		}
		
		
		return view('admin/index', $this->data);
	}
	
	public function modules()
	{
		$this->data['list'] = (new MenuModel())->getMenu();
		$this->data['structure'] = (new MenuModel())->getMenuStructure($this->data['list']);
		$this->data['page'] = $this->page . 'module/_list';
		
		return view('admin/index', $this->data);
	}
	
	public function module($action, $id = 0)
	{
	
	}
	
	public function moduleStatuses()
{
	$this->data['list'] = (new MenuModel())->getMenu();
	$this->data['structure'] = (new MenuModel())->getMenuStructure($this->data['list']);
	$this->data['page'] = $this->page . 'module-status/_list';
	
	return view('admin/index', $this->data);
}
	
	public function moduleStatus($action, $id = 0)
	{
	
	}
	
	public function settings()
	{
		$this->data['list'] = (new MenuModel())->getMenu();
		$this->data['structure'] = (new MenuModel())->getMenuStructure($this->data['list']);
		$this->data['page'] = $this->page . 'settings/_list';
		
		return view('admin/index', $this->data);
	}
	
	public function profile()
	{
		$this->data['list'] = (new MenuModel())->getMenu();
		$this->data['structure'] = (new MenuModel())->getMenuStructure($this->data['list']);
		$this->data['page'] = $this->page . 'profile/_list';
		
		return view('admin/index', $this->data);
	}
	
	public function update()
	{
		$this->data['list'] = (new MenuModel())->getMenu();
		$this->data['structure'] = (new MenuModel())->getMenuStructure($this->data['list']);
		$this->data['page'] = $this->page . 'update/_list';
		
		return view('admin/index', $this->data);
	}
	
	public function security()
	{
		$this->data['list'] = (new MenuModel())->getMenu();
		$this->data['structure'] = (new MenuModel())->getMenuStructure($this->data['list']);
		$this->data['page'] = $this->page . 'security/_list';
		
		return view('admin/index', $this->data);
	}
	
	public function docs()
	{
		$this->data['list'] = (new MenuModel())->getMenu();
		$this->data['structure'] = (new MenuModel())->getMenuStructure($this->data['list']);
		$this->data['page'] = $this->page . 'docs/_list';
		
		return view('admin/index', $this->data);
	}
	
	public function support()
	{
		$this->data['list'] = (new MenuModel())->getMenu();
		$this->data['structure'] = (new MenuModel())->getMenuStructure($this->data['list']);
		$this->data['page'] = $this->page . 'support/_list';
		
		return view('admin/index', $this->data);
	}
	
	// ajax upload
	
	public function upload() {
		$imageFile = $this->request->getFile('file');
		$imageFile->move(IMAGES, $imageFile->getName(), true);
		//$imgPath = $this->request->getFile('image');
		//echo json_encode($imgPath);
		//$d = ['name' => 'foto.jpg', 'alt' => 'test'];
		//return json_encode($d);
//		if($imagefile = $this->request->getFiles())
//		{
//			foreach($imagefile['images'] as $img)
//			{
//				if ($img->isValid() && ! $img->hasMoved())
//				{
//					$newName = $img->getRandomName();
//					$img->move(WRITEPATH.'uploads', $newName);
//				}
//			}
//		}
//		if (isset($_FILES['image'])) {
//			$upload = new Upload($this->request->getFile('image'));
//			$img_result = $upload->getResult();
//
//			if ($img_result['type'] == 'success') {
//				$image = 'media/images/' . $img_result['filename'];
//				echo json_encode($image);
//				return;
//			}
//		}
		$response = [
			'success' => true,
			'data' => [
				'img_name' => $imageFile->getClientName(),
				'file'  => $imageFile->getClientMimeType(),
				'img'  => $imageFile->getName()
			],
			'msg' => "Image successfully uploaded"
		];
		return $this->response->setJSON($response);
	}
	
	public function uploadMultiple()
	{
        $articleModel = new ArticleModel();
        $articleId = (int)$this->request->getVar('article_id');
        $categoryId = (int)$this->request->getVar('category_id');
        $folders = $categoryId ? (new CategoryModel())->getFullPath($categoryId) : '';
        $data['images'] = $articleModel->getImages($articleId);
        
		if($images = $this->request->getFiles())
		{
			foreach($images['gallery'] as $image)
			{
				if ($image->isValid() && !$image->hasMoved())
				{
                    $imgName = mb_url_title(
                            pathinfo(
                                $image->getName(), PATHINFO_FILENAME
                            ),
                            '-',
                            true
                        ) . '.' . $image->getExtension();
                    
                    $targetPath = IMAGES . $folders;
                    
                    $imgSavePath = str_replace('\\', '/', $targetPath .
                        DIRECTORY_SEPARATOR . '_gallery' .
                        DIRECTORY_SEPARATOR . $imgName
                    );
                    $folder = dirname($imgSavePath);
                    
                    if (!is_dir($folder)) {
                        mkdir($folder, 0755, true);
                    }
                    \Config\Services::image()
                        ->withFile($image->getTempName())
                        ->fit(1760, 840, 'center')
                        ->save($imgSavePath, 100);
                    
                    $data['images']['gallery'][] = [
                        'img' => $imgName,
                        'alt' => str_replace(
                            '-', ' ', pathinfo(
                                $imgName, PATHINFO_FILENAME
                            )
                        )
                    ];
                    $articleModel->saveImages($articleId, json_encode($data['images']));
				}
			}
		}
  
		$response = [
			'success' => true,
			'msg' => "Images successfully uploaded",
			'IMAGES' => IMAGES,
			'img_files' => $images['gallery'],
			'categoryId' => $categoryId,
			'folders' => $folders,
			'imgSavePath' => $imgSavePath,
			'folder' => $folder,
			'dataImg' => $data
		];
		return $this->response->setJSON($response);
	}
	
}
