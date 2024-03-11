<?php

namespace App\Models;

use CodeIgniter\HTTP\Request;
use CodeIgniter\Model;
use Helpers\Arr;

class MenuModel extends Model
{
	/**
	 * @param int $side
	 * 0 - public menu
	 * 1 - admin menu
	 * 2 - user menu
	 * @return array
	 */
	public function getMenu($side)
	{
		return $this->db->table('menu')
			->select([
				'menu.*',
				'menu_types.id AS type_id',
				'menu_types.name AS type_name',
				'menu_side.id AS side_id',
				'menu_side.name AS side_name'
			])
			->join(
			'menu_side',
			'menu.side_id = menu_side.id',
			'left'
			)
			->join(
				'menu_types',
				'menu.type_id = menu_types.id',
				'left'
			)
			->where(
			'menu.side_id', $side
			)
			->orderBy('menu.order')
			->get()
			->getResult();
	}
	
	public function getItem($url)
	{
		return $this->db->table('menu_types')
			->get()
			->getRow();
	}
	
	public function getItemById($id)
	{
		return $this->db->table('menu')
			->where('id', $id)
			->get()
			->getRow();
	}
	
	public function addItem(Request $request)
	{
		$data = $request->getPost();
		$data['url'] = $data['url'] ?: mb_url_title($data['name'], '-', true);
		$icon = $request->getFile('icon');
		$data['icon'] = $icon->getName() ?: null;
		$action = Arr::extract('action', $data);
		// TODO: check if menu item exists in table
		$data['order'] = $this->db->table('menu')->countAll();
		$result['success'] = $this->db->table('menu')
			->insert($data);
		$id = $this->db->insertID();
		$result['action'] = $action == 'list' ? '' : '/' . $action . '/' . $id;
		
		return $result;
	}
	
	public function editItem($id, Request $request)
	{
		$data = $request->getPost();
		$data['url'] = $data['url'] ?: mb_url_title($data['name'], '-', true);
		$icon = $request->getFile('icon');
		$data['icon'] = $icon->getName() ?: null;
		$action = Arr::extract('action', $data);
		$result['success'] = $this->db->table('menu')
			->where('id', $id)
			->update($data);
		$result['action'] = $action == 'list' ? '' : '/' . $action . '/' . $id;
		
		return $result;
	}
	
	public function deleteItem($id)
	{
		return $this->db->table('menu')
			->delete(['id' => $id]);
	}
	
	public function getMenuTypes()
	{
		return $this->db->table('menu_types')
			->get()
			->getResult();
	}
	
	public function getMenuSides()
	{
		return $this->db->table('menu_side')
			->get()
			->getResult();
	}
	
	public function getMenuType($id)
	{
	
	}

//	private function buildMenu(array $items)
//	{
//		echo '<ul>';
//		foreach ($items as $item)
//		{
//			echo '<li><a href="'.$item->url.'">'.$item->name.'</a>';
//			if (!empty($item->children))
//			{
//				Menu::buildMenu($item->children);
//			}
//			echo '</li>';
//		}
//		echo '</ul>';
//	}
	
	public function buildTree($items, $parentId = 0) {
		$node = [];
		
		foreach ($items as $item) {
			if ($item->parent_id == $parentId) {
				$children = $this->buildTree($items, $item->id);
				if ($children) {
					$item->children = $children;
				}
				$item->basename = basename($item->url);
				$node[] = $item;
			}
		}
		
		return $node;
	}
	
	public function getMenuStructure($menu)
	{
		return $this->buildTree($menu);
	}
	
	public function getTypes() {
		return $this->db->table('menu_types')
			->get()
			->getResult();
	}
	
	public function getMultiLevelMenu($side = 1) {
		return $this->buildTree(
			$this->getMenu($side)
		);
	}
	
}