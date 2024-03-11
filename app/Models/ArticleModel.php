<?php

namespace App\Models;

use CodeIgniter\HTTP\Request;
use CodeIgniter\Model;
use DateTime;
use Helpers\Arr;
use Helpers\Str;
use Helpers\Upload;

class ArticleModel extends Model
{
	protected $useTimestamps = true;
	
	public function getArticles($status = null, $pageState = 0, $featured = null)
	{
		$builder = $this->selectCommonData();
		
		if (isset($status)) {
			$builder->where(
				'articles.status', $status
			);
		}
		
		if (isset($featured)) {
			$builder->where(
				'articles.featured', $featured
			);
		}
		
		$builder->where('articles.page', $pageState);
		$articles = $builder->get()->getResult();
		$uniqueArticles = $this->getUniqueArticles($articles);

		return $uniqueArticles;
	}
	
	public function getArticle($url, $page = 0, $status = 1, $featured = null)
	{
		$builder = $this->selectCommonData();
		
		if (isset($status)) {
			$builder->where(
				'articles.status', $status
			);
		}
		
		if (isset($featured)) {
			$builder->where(
				'articles.featured', $featured
			);
		}
		
		if (isset($page)) {
			$builder->where(
				'articles.page', $page
			);
		}
		
		$builder->where('articles.url', $url);
		
		$articles = $builder->get()->getResult();
		$uniqueArticles = $this->getUniqueArticles($articles);
		
		return $uniqueArticles[0] ?? null;
	}
	
	public function getArticleById($id, $status = null, $pageState = 0, $featured = null)
	{
		$builder = $this->selectCommonData();
		
		if (isset($status)) {
			$builder->where(
				'articles.status', $status
			);
		}
		
		if (isset($featured)) {
			$builder->where(
				'articles.featured', $featured
			);
		}
		
		$builder
			->where('articles.id', $id)
			->where('articles.page', $pageState);
		
		$articles = $builder->get()->getResult();
		$uniqueArticles = $this->getUniqueArticles($articles);

		return $uniqueArticles[0];
	}
	
	public function getArticlesByTags($tags, $status = null, $pageState = 0, $featured = null)
	{
		$builder = $this->selectCommonData();
		
		if (isset($status)) {
			$builder->where(
				'articles.status', $status
			);
		}
		
		if (isset($featured)) {
			$builder->where(
				'articles.featured', $featured
			);
		}
		
		$builder->where('articles.page', $pageState);
		$builder->whereIn('articles_tags.url', $tags);
		$articles = $builder->get()->getResult();
		$uniqueArticles = $this->getUniqueArticles($articles);
		
		return $uniqueArticles;
	}
	
	public function addArticle(Request $request)
	{
		$data = $request->getPost();
		
		$data['url'] = $data['url'] ?: mb_url_title($data['title'], '-', true);
		$data['meta_title'] = $data['meta_title'] ?: null;
		$data['meta_desc'] = $data['meta_desc'] ?: null;
		$data['text_intro'] = $data['text_intro'] ?: null;
		$data['text_full'] = $data['text_full'] ?: null;
		$data['rating'] = $data['rating'] ?? 0.0;
		$data['rating_count'] = $data['rating_count'] >= 0 ? $data['rating_count'] : null;
		
		$imageIntro = $request->getFile('image_intro');
		$imageFull = $request->getFile('image_full');
		$altIntro = Arr::extract('alt_intro', $data);
		$altFull = Arr::extract('alt_full', $data);
		$dataTags = Arr::extract('tags', $data);
		//$data['images']['image_intro'] = !empty($imageIntro->getName()) ? $imageIntro->getName() : null;
		$data['images']['alt_intro'] = !empty($altIntro) ? $altIntro : null;
		//$data['images']['image_full'] = !empty($imageFull->getName()) ? $imageFull->getName() : null;
		$data['images']['alt_full'] = !empty($altFull) ? $altFull : null;
		
		$gallery = Arr::extract('gallery', $data);
		$data['images']['gallery'] = null;
		
		if (!empty($gallery)) {
			$gallery = explode(',', $gallery);
			for ($i = 0; $i < count($gallery); $i++) {
				$data['images']['gallery'][$i]['img'] = $gallery[$i];
				$data['images']['gallery'][$i]['alt'] = pathinfo($gallery[$i], PATHINFO_FILENAME);
			}
			
		}
		
		$categoryId = (int)$data['category_id'];
		$folders = $categoryId ? (new CategoryModel())->getFullPath($categoryId) : '';
		if (!empty($imageIntro->getName())) {
			
			$imgName = mb_url_title(
				pathinfo(
					$imageIntro->getName(), PATHINFO_FILENAME
				),
				'-',
				true
			) . '.' . $imageIntro->getExtension();
			$data['images']['image_intro'] = $imgName;
			$targetPath = IMAGES . $folders;
			$imgFile = $targetPath . DIRECTORY_SEPARATOR . $imgName;
			
			if (!file_exists($imgFile)) {
				$imageIntro->move($targetPath, $imgName, true);
			}
			
			$imgSavePath = $targetPath .
				DIRECTORY_SEPARATOR . '_intro' .
				DIRECTORY_SEPARATOR . $imgName;
			$folder = dirname($imgSavePath);
			if (!is_dir($folder)) {
				mkdir($folder, 0755, true);
			}
			\Config\Services::image()
				->withFile($imgFile)
				->fit(430, 550, 'center')
				->save($imgSavePath, 100);
		}
		if (!empty($imageFull->getName())) {
			
			$imgName = mb_url_title(
				pathinfo(
					$imageFull->getName(), PATHINFO_FILENAME
				),
				'-',
				true
			) . '.' . $imageFull->getExtension();
			$data['images']['image_full'] = $imgName;
			$targetPath = IMAGES . $folders;
			$imgFile = $targetPath . DIRECTORY_SEPARATOR . $imgName;
			
			if (!file_exists($imgFile)) {
				$imageFull->move($targetPath, $imgName, true);
			}
			
			$imgSavePath = $targetPath .
				DIRECTORY_SEPARATOR . '_full' .
				DIRECTORY_SEPARATOR . $imgName;
			$folder = dirname($imgSavePath);
			if (!is_dir($folder)) {
				mkdir($folder, 0755, true);
			}
			\Config\Services::image()
				->withFile($imgFile)
				->fit(1760, 840, 'center')
				->save($imgSavePath, 95);
		}
		
		$data['images'] = json_encode($data['images']);
		//$data['date_create'] = (new DateTime())->format('Y-m-d H:i:s');
		//$data['date_update'] = null;
		
		
//		$images = $request->getFiles();
//		foreach ($images as $image) {
//
//		}
		
		
		$action = Arr::extract('action', $data);
		
		$result['success'] = $this->db->table('articles')
			->insert($data);
		$id = $this->db->insertID();
		if (!$id) {
			//$_SESSION['errors'] = 'Ошибка! Не удалось добавить материал.';
			return false;
		}
		
		if (!empty($dataTags)) {
			
			$tags = (new TagModel())->getTags();
			//$tagSql = "";
			$tagId = 0;
			
			for ($i = 0; $i < count($dataTags); $i++) {
				
				$isTagFound = false;
				for ($j = 0; $j < count($tags); $j++) {
					if ($tags[$j]->name == $dataTags[$i]) {
						$tagId = $tags[$j]->id;
						$isTagFound = true;
					}
				}
				
				if (!$isTagFound) {
					$this->db->table('articles_tags')->insert([
						'name' => $dataTags[$i],
						'url' => mb_url_title($dataTags[$i], '-', true)
					]);
					$tagId = $this->db->insertID();
					
					if (!$tagId) {
						//$_SESSION['errors'] = 'Ошибка! Не удалось добавить метки.';
						return false;
					}
				}
				
				$this->db->table('articles_tags_ids')->insert([
					'article_id' => $id,
					'tag_id' => $tagId
				]);
				
				//$tagSql .= "INSERT INTO articles_tag_ids (id, article_id, tag_id) VALUES (NULL, " . $id . ", " . $tagId . ");";
			}
			
			/*if (!empty($tagSql)) {
				$tagResult = $this->db->query($tagSql)->exec();
				if (!$tagResult) {
					//$_SESSION['errors']['tags'] = 'Ошибка! Не удалось добавить метки.';
					return false;
				}
			}*/
		}
		
		$result['action'] = $action == 'list' ? '' : '/' . $action . '/' . $id;
		
		return $result;
	}
	
	public function editArticle(int $id, Request $request)
	{
		$data = $request->getPost();
		
		$data['url'] = $data['url'] ?: mb_url_title($data['title'], '-', true);
		$data['meta_title'] = $data['meta_title'] ?: null;
		$data['meta_desc'] = $data['meta_desc'] ?: null;
		$data['text_intro'] = $data['text_intro'] ?: null;
		$data['text_full'] = $data['text_full'] ?: null;
		$data['rating_count'] = $data['rating_count'] >= 0 ? $data['rating_count'] : null;
		
		$imageIntro = $request->getFile('image_intro');
		$imageFull = $request->getFile('image_full');
		$imageIntroOld = Arr::extract('image_intro_old', $data);
		$imageFullOld = Arr::extract('image_full_old', $data);
		$altIntro = Arr::extract('alt_intro', $data);
		$altFull = Arr::extract('alt_full', $data);
		$dataTags = Arr::extract('tags', $data);
		$dataTagsOld = Arr::extract('tags_old', $data);
		
		$data['images']['image_intro'] = !empty($imageIntroOld) ? $imageIntroOld : null;
		$data['images']['image_full'] = !empty($imageFullOld) ? $imageFullOld : null;
		$data['images']['alt_intro'] = !empty($altIntro) ? $altIntro : null;
		$data['images']['alt_full'] = !empty($altFull) ? $altFull : null;
		
		$gallery = Arr::extract('gallery', $data);
		$data['images']['gallery'] = null;
		
		if (!empty($gallery)) {
			$gallery = explode(',', $gallery);
			for ($i = 0; $i < count($gallery); $i++) {
				$data['images']['gallery'][$i]['img'] = $gallery[$i];
				$data['images']['gallery'][$i]['alt'] = pathinfo($gallery[$i], PATHINFO_FILENAME);
			}
		}
		
		$categoryId = (int)$data['category_id'];
		$categoryModel = new CategoryModel();
		$folders = $categoryId ? $categoryModel->getFullPath($categoryId) : '';
		
		if (session()->has('item') and session()->get('item')->category_id != $categoryId) {
			$categoryOldId = (int)session()->get('item')->category_id;
			$foldersOld = $categoryOldId ? $categoryModel->getFullPath($categoryOldId) : '';

			$targetPathOld = IMAGES . $foldersOld;
			$targetPath = IMAGES . $folders;
			
			$imgFileIntroOld = str_replace('\\', '/', $targetPathOld .
				DIRECTORY_SEPARATOR . '_intro' .
				DIRECTORY_SEPARATOR . session()->get('item')->images->image_intro
			);
			$imgFileIntro = str_replace('\\', '/', $targetPath .
				DIRECTORY_SEPARATOR . '_intro' .
				DIRECTORY_SEPARATOR . session()->get('item')->images->image_intro
			);
			
			if (!file_exists($imgFileIntro)) {
				$folder = dirname($imgFileIntro);
				if (!is_dir($folder)) {
					mkdir($folder, 0755, true);
				}
				\Config\Services::image()
					->withFile($imgFileIntroOld)
					->save($imgFileIntro, 100);
				
				// original image
				$imgFileOld = str_replace('\\', '/', $targetPathOld .
					DIRECTORY_SEPARATOR . session()->get('item')->images->image_intro
				);
				$imgFile = str_replace('\\', '/', $targetPath .
					DIRECTORY_SEPARATOR . session()->get('item')->images->image_intro
				);
				\Config\Services::image()
					->withFile($imgFileOld)
					->save($imgFile, 100);
				if (file_exists($imgFileOld)) {
					unlink($imgFileOld);
				}
			}
			
			if (file_exists($imgFileIntroOld)) {
				unlink($imgFileIntroOld);
			}
			
			$imgFileFullOld = str_replace('\\', '/', $targetPathOld .
				DIRECTORY_SEPARATOR . '_full' .
				DIRECTORY_SEPARATOR . session()->get('item')->images->image_full
			);
			$imgFileFull = str_replace('\\', '/', $targetPath .
				DIRECTORY_SEPARATOR . '_full' .
				DIRECTORY_SEPARATOR . session()->get('item')->images->image_full
			);
			
			if (!file_exists($imgFileFull)) {
				$folder = dirname($imgFileFull);
				if (!is_dir($folder)) {
					mkdir($folder, 0755, true);
				}
				\Config\Services::image()
					->withFile($imgFileFullOld)
					->save($imgFileFull, 100);
			}
			if (file_exists($imgFileFullOld)) {
				unlink($imgFileFullOld);
			}
			
//			$imgSavePath = $targetPath .
//				DIRECTORY_SEPARATOR . '_intro' .
//				DIRECTORY_SEPARATOR . $imgName;
//			$folder = dirname($imgSavePath);
//			if (!is_dir($folder)) {
//				mkdir($folder, 0755);
//			}
//			\Config\Services::image()
//				->withFile($imgFileIntro)
//				->save($imgSavePath, 100);
		
		}
		if (!empty($imageIntro->getName())) {
			
			$imgName = /*mb_url_title(
				pathinfo(
					$imageIntro->getName(), PATHINFO_FILENAME
				),
				'-',
				true
			)*/ $data['url'] . '.' . $imageIntro->getExtension();
			$data['images']['image_intro'] = $imgName;
			$targetPath = IMAGES . $folders;
			$imgFile = $targetPath . DIRECTORY_SEPARATOR . $imgName;
			
			if (!file_exists($imgFile)) {
				$imageIntro->move($targetPath, $imgName, true);
			}
			
			$imgSavePath = $targetPath .
				DIRECTORY_SEPARATOR . '_intro' .
				DIRECTORY_SEPARATOR . $imgName;
			$folder = dirname($imgSavePath);
			if (!is_dir($folder)) {
				mkdir($folder, 0755, true);
			}
			\Config\Services::image()
				->withFile($imgFile)
				->fit(430, 550, 'center')
				->save($imgSavePath, 100);
		}
		if (!empty($imageFull->getName())) {
			
			$imgName = mb_url_title(
				pathinfo(
					$imageFull->getName(), PATHINFO_FILENAME
				),
				'-',
				true
			) . '.' . $imageFull->getExtension();
			$data['images']['image_full'] = $imgName;
			$targetPath = IMAGES . $folders;
			$imgFile = $targetPath . DIRECTORY_SEPARATOR . $imgName;
			
			if (!file_exists($imgFile)) {
				$imageFull->move($targetPath, $imgName, true);
			}
			
			$imgSavePath = $targetPath .
				DIRECTORY_SEPARATOR . '_full' .
				DIRECTORY_SEPARATOR . $imgName;
			$folder = dirname($imgSavePath);
			if (!is_dir($folder)) {
				mkdir($folder, 0755, true);
			}
			\Config\Services::image()
				->withFile($imgFile)
				->fit(1760, 840, 'center')
				->save($imgSavePath, 95);
		}
		
		$data['images'] = json_encode($data['images']);
		//$data['date_update'] = (new DateTime())->format('Y-m-d H:i:s');
		
		$action = Arr::extract('action', $data);
		
		$result['success'] = $this->db->table('articles')
			->where('id', $id)
			->update($data);
		
		$isPage = (int)$data['page'];
		if (!$isPage) {
			$tagsOld = array_filter(explode(',', $dataTagsOld));
		
			if (!$dataTags) {
				$dataTags = [];
			}
			
			if (!$tagsOld) {
				$tagsOld = [];
			}
			
			$tagsNeedAdd = array_diff($dataTags, $tagsOld);
			$tagsNeedRemove = array_diff($tagsOld, $dataTags);
			
			if ($tagsNeedAdd or $tagsNeedRemove) {
				
				$tags = (new TagModel())->getTags();
				$tagIdsAdd = [];
				$tagIdsRemove = [];
				
				foreach ($dataTags as $tagName) {
					$isTagFound = false;
					foreach ($tags as $tag) {
						if ($tag->name == $tagName) {
							$isTagFound = true;
						}
					}
					
					if (!$isTagFound) {
						$this->db->table('articles_tags')->insert([
							'name' => $tagName,
							'url' => mb_url_title($tagName, '-', true)
						]);
						$tagId = $this->db->insertID();
						$tagIdsAdd[] = $tagId;
					}
				}
				
				foreach ($tags as $tag) {
					foreach ($tagsNeedAdd as $tagName) {
						if ($tag->name == $tagName) {
							$tagIdsAdd[] = $tag->id;
						}
					}
					foreach ($tagsNeedRemove as $tagName) {
						if ($tag->name == $tagName) {
							$tagIdsRemove[] = $tag->id;
						}
					}
				}
				
				if (count($tagIdsAdd) > 0) {
					foreach ($tagIdsAdd as $tagId) {
						$this->db->table('articles_tags_ids')->insert([
							'article_id' => $id,
							'tag_id' => $tagId
						]);
					}
					
				}
				
				if (count($tagIdsRemove) > 0) {
					foreach ($tagIdsRemove as $tagId) {
						$this->db->table('articles_tags_ids')->delete([
							'article_id' => $id,
							'tag_id' => $tagId
						]);
					}
				}
			}
		}
		
		$result['action'] = $action == 'list' ? '' : '/' . $action . '/' . $id;
		
		return $result;
	}
	
	public function deleteArticle($id)
	{
		return $this->db->table('articles')
			->delete(['id' => $id]);
	}
	
	/*public function getArticleInfo($url, $categoryInfo)
	{
		$result = $this->getArticle($url, null);
		
		if (empty($result)) {
			if (!($result instanceof \stdClass)) {
				$result = new \stdClass();
			}
			$result->c_id = $categoryInfo->index[$url];
		}
		
		$categoryModel->setCategoriesTree(
			$categoryModel->buildTree($categoryModel->categories, $categoryModel->getFullPaths())
		);
		
		$result->parent_url = $this->fullPaths[$result->c_id] ?? '/';
		
		return $result;
	}*/
	
	public function getHome()
	{
		return $this->db->table('articles')
			->select('*, articles_category.id AS c_id, articles_category.name AS c_name')
			->join('articles_category', 'articles.category_id = articles_category.id', 'left')
			->get()
			->getResult();
	}
	
	public function getArticlesByCategory($id, CategoryModel $categoryModel, $status = 1, $featured = null, $children = true, $order = ['title' => 'created_at', 'type' => 'DESC'])
	{
		$builder = $this->selectCommonData();
		
		if (isset($status)) {
			$builder->where(
				'articles.status', $status
			);
		}
		
		if (isset($featured)) {
			$builder->where(
				'articles.featured', $featured
			);
		}
		
		if ($children) {
			$subCategories = $categoryModel->getSubCategories($id);
			$builder->whereIn('articles_category.id', $subCategories);
		}
		
		if (isset($order)) {
			$builder->orderBy(
				'articles.'.$order['title'], $order['type']
			);
		}
		
		$articles = $builder->get()->getResult();
		
		$uniqueArticles = $this->getUniqueArticles($articles);
		
		return $uniqueArticles ?? false;
	}
	
	public function getStatuses()
	{
		return $this->db->table('articles_status')
			->get()
			->getResult();
	}
	
	public function getStatusById($id)
	{
		return $this->db->table('articles_status')
			->where('id', $id)
			->get()
			->getRow();
	}
	
	public function addStatus(Request $request)
	{
		$data = $request->getPost();
		$action = Arr::extract('action', $data);
		$result['success'] = $this->db->table('articles_status')
			->insert($data);
		$id = $this->db->insertID();
		$result['action'] = $action == 'list' ? '' : '/' . $action . '/' . $id;
		
		return $result;
	}
	
	public function editStatus($id, Request $request)
	{
		$data = $request->getPost();
		$action = Arr::extract('action', $data);
		$result['success'] = $this->db->table('articles_status')
			->where('id', $id)
			->update($data);
		$result['action'] = $action == 'list' ? '' : '/' . $action . '/' . $id;
		
		return $result;
	}
	
	public function deleteStatus($id)
	{
		return $this->db->table('articles_status')
			->delete(['id' => $id]);
	}
	
	private function selectCommonData() {
		return $this->db->table('articles')
			->select('articles.*,
			articles_tags.id AS t_id,
			articles_tags.name AS t_name,
			articles_tags.url AS t_url,
			articles_category.id AS c_id,
			articles_category.parent_id AS c_parent_id,
			articles_category.name AS c_name,
			articles_category.url AS c_url,
			articles_status.id AS s_id,
			articles_status.name AS s_name,
			users.login,
			comments.id AS comm_id,
			comments.user_id AS comm_user_id,
			comments.article_id AS comm_article_id,
            comments.parent_id AS comm_parent_id,
            comments.comment AS comm_text,
            comments.vote_up AS comm_vote_up,
            comments.vote_down AS comm_vote_down,
            comments.thank AS comm_thank,
            comments.created_at AS comm_created_at,
            comments.updated_at AS comm_updated_at'
			)->join(
				'articles_category',
				'articles.category_id = articles_category.id',
				'left'
			)->join(
				'articles_tags_ids',
				'articles_tags_ids.article_id = articles.id',
				'left'
			)->join(
				'articles_tags',
				'articles_tags_ids.tag_id = articles_tags.id',
				'left'
			)->join(
				'articles_status',
				'articles.status = articles_status.id',
				'left'
			)->join(
				'users',
				'articles.user_id = users.id',
				'left'
			)->join(
				'comments',
				'articles.id = comments.article_id and users.id = comments.user_id',
				'left'
			);
	}
	
	private function getUniqueArticles($articles)
	{
		helper('text');
		
		$uniqueArticles = [];
		$ids = [];
		$commIds = [];
		foreach ($articles as $article)
		{
			if (isset($article->images)) {
				$article->images = json_decode($article->images, false);
			}
			
			if (!in_array($article->id, $ids)) {
				$uniqueArticles[] = $article;
				$ids[] = $article->id;
			}
			
			$index = array_search($article->id, $ids);
			
			if (isset($article->t_id)) {
				
				if (empty($uniqueArticles[$index]->tags)) {
					$uniqueArticles[$index]->tags = [];
				}
				
				if (in_array($article->id, $ids)) {
					$uniqueArticles[$index]->tags[] = (object)[
						'id' => $article->t_id,
						'name' => $article->t_name,
						'url' => $article->t_url
					];
				}
				
				unset(
					$uniqueArticles[$index]->t_id,
					$uniqueArticles[$index]->t_name,
					$uniqueArticles[$index]->t_url
				);
			}
			
			if (isset($article->comm_id)) {
				if (!in_array($article->comm_id, $commIds)) {
					$commIds[] = $article->comm_id;
					
					if (empty($uniqueArticles[$index]->comments)) {
						$uniqueArticles[$index]->comments = [];
						$uniqueArticles[$index]->comments_count = 0;
					}
					
					$uniqueArticles[$index]->comments[] = (object)[
						'comm_id' => $article->comm_id,
						'comm_parent_id' => $article->comm_parent_id,
						'comm_user_id' => $article->comm_user_id,
						'comm_article_id' => $article->comm_article_id,
						'comm_text' => $article->comm_text,
						'comm_vote_up' => $article->comm_vote_up,
						'comm_vote_down' => $article->comm_vote_down,
						'comm_thank' => $article->comm_thank,
						'comm_created_at' => $article->comm_created_at,
						'comm_updated_at' => $article->comm_updated_at,
					];
					
					$uniqueArticles[$index]->comments_count++;
				}
			}
			
			unset(
				$uniqueArticles[$index]->comm_id,
				$uniqueArticles[$index]->comm_parent_id,
				$uniqueArticles[$index]->comm_user_id,
				$uniqueArticles[$index]->comm_article_id,
				$uniqueArticles[$index]->comm_text,
				$uniqueArticles[$index]->comm_vote_up,
				$uniqueArticles[$index]->comm_vote_down,
				$uniqueArticles[$index]->comm_thank,
				$uniqueArticles[$index]->comm_created_at,
				$uniqueArticles[$index]->comm_updated_at
			);
			
			if (!empty(CategoryModel::$fullPaths)) {
				$uniqueArticles[$index]->parent_url = $uniqueArticles[$index]->c_id
					? CategoryModel::$fullPaths[$uniqueArticles[$index]->c_id]
					: base_url();
			}
			
			if (!isset($uniqueArticles[$index]->text_intro) and !url_is('admin*')) {
				$uniqueArticles[$index]->text_intro = word_limiter(strip_tags($article->text_full), 12);
			}
			
			$uniqueArticles[$index]->created_at = date_format(
				date_create($article->created_at),'d.m.Y H:i:s'
			);
			
			if (isset($uniqueArticles[$index]->date_update)) {
				$uniqueArticles[$index]->updated_at = date_format(
					date_create($article->updated_at),'d.m.Y H:i:s'
				);
			}
			
		}
		
		return $uniqueArticles;
	}
	
	public function tagObjectsToLists(&$item)
	{
		if (isset($item->tags)) {
			$tags = $item->tags;
			$item->tags = new \stdClass();
			foreach ($tags as $tag) {
				$item->tags->id[] = $tag->id;
				$item->tags->name[] = $tag->name;
				$item->tags->url[] = $tag->url;
			}
		}
	}
	
	public function getArticlesSortedBy($url, $order)
	{
		$categoryModel = new CategoryModel();
		$categoryInfo = $categoryModel->getCategoryInfo();
		$articles = $this->getArticlesByCategory(
			$categoryInfo->index[$url],
			$categoryModel,
			1,
			null,
			true,
			$order
		);
		
		$fullPath = (new CategoryModel())->getFullPaths();
		foreach ($articles as $article) {
			if (!isset($article->parent_url)) {
				$article->parent_url = $fullPath[$article->c_id];
			}
		}
		return $articles;
	}
	
	public function hitsAdd($n, $url)
	{
		$this->db->table('articles')
			->where('url', $url)
			->update(['hits' => ++$n]);
	}
    
    public function getImages($id)
    {
        $date = $this->db->table('articles')
            ->select('images')
            ->where('id', $id)
            ->get()->getRowArray();
        return json_decode($date['images'], true);
    }
    
    public function saveImages($id, $images)
    {
        return $this->db->table('articles')
            ->where('id', $id)
            ->update(['images' => $images]);
    }
    
}