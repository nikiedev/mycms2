<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\HTTP\Request;
use CodeIgniter\Model;
use CodeIgniter\Validation\ValidationInterface;
use Helpers\Arr;

class CategoryModel extends Model
{
	private $categories = null;
	private $categoriesTree = null;
	private $categoryInfo = null;
	public static $fullPaths = [];
	
	/*protected $DBGroup              = 'default';
	protected $table                = 'categories';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];*/
	
	public function __construct(?ConnectionInterface $db = null, ?ValidationInterface $validation = null)
	{
		parent::__construct($db, $validation);
	}
	
	public function getCategories()
	{
		return $this->db->table('articles_category')
			->get()
			->getResult();
	}
	
	public function getCategoryById($id)
	{
		return $this->db->table('articles_category')
			->where('id', $id)
			->get()
			->getRow();
	}
	
	public function getSubCategories($catId)
	{
		$sql = "select id from articles_category
				where id in
				(select id from (select * from articles_category
				order by parent_id, id) categories_sorted,
				(select @main_category_id := ?) initialisation
				where (find_in_set(parent_id, @main_category_id) > 0
				and @main_category_id := concat(@main_category_id, ',', id))
				or id = @main_category_id)";
		
		$categories = $this->db->query($sql, [$catId])->getResult();
		$result = [];
		foreach ($categories as $category) {
			$result[] = (int)$category->id;
		}
		return $result;
	}
	
	public function addCategory(Request $request)
	{
		$data = $request->getPost();
		$data['url'] = $data['url'] ? $data['url'] : mb_url_title($data['name'], '-', true);
		$image = $request->getFile('img');
		$data['img'] = !empty($image->getName()) ? $image->getName() : null;
		
		$action = Arr::extract('action', $data);
		
		$result['success'] = $this->db->table('articles_category')
			->insert($data);
		
		$id = $this->db->insertID();
		if (isset($data['img'])) {
			$targetPath = IMAGES . $this->getFullPath($id);
			$imgFile = $targetPath . DIRECTORY_SEPARATOR . $image->getName();
			
			if (!file_exists($imgFile)) {
				$image->move($targetPath, $image->getName(), true);
			}
		}
		
		$result['action'] = $action == 'list' ? '' : '/' . $action . '/' . $id;
		
		return $result;
	}
	
	public function editCategory($id, Request $request)
	{
		$data = $request->getPost();
		$data['url'] = $data['url'] ? $data['url'] : mb_url_title($data['name'], '-', true);
		$image = $request->getFile('img');
		
		$action = Arr::extract('action', $data);
		
		if (!empty($image->getName())) {
			$data['img'] = $image->getName();
			$targetPath = IMAGES . $this->getFullPath($id);
			$imgFile = $targetPath . DIRECTORY_SEPARATOR . $image->getName();
			
			if (!file_exists($imgFile)) {
				$image->move($targetPath, $image->getName(), true);
			}
		}
		
		$result['success'] = $this->db->table('articles_category')
			->where('id', $id)
			->update($data);
		
		$result['action'] = $action == 'list' ? '' : '/' . $action . '/' . $id;
		
		return $result;
	}
	
	public function deleteCategory($id)
	{
		return $this->db->table('articles_category')
			->delete(['id' => $id]);
	}
	
	public function getCategoryInfo()
	{
		if (isset($this->categoryInfo)) {
			return $this->categoryInfo;
		}
		
		$this->categories = $this->getCategories();
		$this->categoryInfo = new \stdClass();
		
		foreach ($this->categories as $category) {
			$this->categoryInfo->category[$category->id] = $category->url;
			$this->categoryInfo->name[$category->url] = $category->name;
			$this->categoryInfo->index[$category->url] = (int)$category->id;
		}
		
		return $this->categoryInfo;
	}
	
	public function getParentUrl($url)
	{
		$result = (new ArticleModel())->getArticle($url, null);
		
		if (empty($result)) {
			if (!isset($result)) {
				$result = new \stdClass();
			}
			$result->c_id = $this->categoryInfo->index[$url] ?? 0;
		}
		
		$this->categoriesTree = $this->buildTree(
			$this->categories, self::$fullPaths
		);
		
		$result->parent_url = $result->c_id
			? self::$fullPaths[$result->c_id]
			: base_url();
		
		return $result;
	}
	
	public function getCategoryStructure($categories = null)
	{
		if (isset($this->categoriesTree)) {
			return $this->categoriesTree;
		}
		
		if (!isset($categories)) {
			$categories = $this->getCategories();
		}
		
		return $this->buildTree($categories, self::$fullPaths);
	}
	
	public function getBreadcrumbs($urlParts)
	{
		$breadcrumbs = [];
		foreach ($this->categoryInfo->name as $url => $name) {
			
			if (in_array($url, $urlParts)) {
				$id = $this->categoryInfo->index[$url];
				$breadcrumbs[] = (object)['url' => self::$fullPaths[$id], 'name' => $name];
			}
		}
		return $breadcrumbs;
	}
	
	public function buildTree(array $items, array &$urlNames, int $parentId = 0, string $parentUrl = '')
	{
		$node = [];
		foreach ($items as $item) {
			if ($item->parent_id == $parentId) {
				$item->parent_url = empty($parentUrl) ? $item->url : $parentUrl . '/' . $item->url;
				$urlNames[$item->id] = $item->parent_url;
				$children = $this->buildTree($items, $urlNames, $item->id, $item->parent_url);
				if ($children) {
					$item->children = $children;
				}
				$node[$item->url] = $item;
			}
		}
		return $node;
	}
	
	public function getFullPath($categoryId)
	{
		if (!empty(self::$fullPaths[$categoryId])) {
			return self::$fullPaths[$categoryId];
		}
		$this->categories = $this->getCategories();
		$this->categoriesTree = $this->buildTree($this->categories, self::$fullPaths);
		return self::$fullPaths[$categoryId] ?? '/';
	}
	
	public function getFullPaths()
	{
		if (isset($this->categoriesTree)) {
			return $this->categoriesTree;
		}
		self::$fullPaths[0] = '';
		if (!isset($this->categories)) {
			$this->categories = $this->getCategories();
		}
		$this->categoriesTree = $this->buildTree($this->categories, self::$fullPaths);
		return self::$fullPaths;
	}
	
	/**
	 * create directory recursively
	 * @param $dirName
	 * @param int $rights
	 * @param string $dir_separator
	 * @return bool
	 */
	public function mkdir_r($dirName, $rights = 0755, $dir_separator = DIRECTORY_SEPARATOR) {
		$dirs = explode($dir_separator, $dirName);
		$dir = '';
		$created = false;
		foreach ($dirs as $part) {
			$dir .= $part . $dir_separator;
			if (!is_dir($dir) && strlen($dir) > 0) {
				$created = mkdir($dir, $rights);
			}
		}
		return $created;
	}
	
	public function setCategoriesTree(array $buildTree)
	{
		$this->categoriesTree = $buildTree;
	}
	
	public function getCategoriesTree()
	{
		return $this->categoriesTree;
	}
	
	private function searchCategoryRecursive($search, $categories, $result=[])
	{
		foreach ($categories as $category) {
			if ($category->url != $search) {
				if (!in_array($category->url, $result)) {
					$result[] = $category->url;
				}
			} elseif (!empty($category->children)) {
				$result[] = $category->url;
				$this->searchCategoryRecursive($search, $category->children, $result);
//				if ($result !== false){
//					return $result;
//				}
			}
		}
		if ($result !== false){
			return $result;
		}
		return false;
	}
	
	/* TODO: remove
	private function getUrlFullPaths(array $array = [], string $parent = '', array &$names = [])
	{
		foreach ($array as $data) {
			if (isset($data->url)) {
				$name = empty($parent) ? $data->url : $parent . '/' . $data->url;
				$names[$data->id] = $name;
				if (isset($data->children)) {
					$this->getUrlFullPaths($data->children, $name, $names);
				}
			}
		}
		return $names;
	}
	*/
	
}
