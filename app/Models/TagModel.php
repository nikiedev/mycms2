<?php

namespace App\Models;

use CodeIgniter\HTTP\Request;
use CodeIgniter\Model;
use Helpers\Arr;

class TagModel extends Model
{
	
	public function getTags()
	{
		return $this->db->table('articles_tags')
			->get()
			->getResult();
	}
	
	public function getTagById($id)
	{
		return $this->db->table('articles_tags')
			->where('id', $id)
			->get()
			->getRow();
	}
	
	public function addTag(Request $request)
	{
		$data = $request->getPost();
		$data['url'] = $data['url'] ? $data['url'] : mb_url_title($data['name'], '-', true);
		$action = Arr::extract('action', $data);
		// TODO: check if tag exists in table
		$result['success'] = $this->db->table('articles_tags')
			->insert($data);
		$id = $this->db->insertID();
		$result['action'] = $action == 'list' ? '' : '/' . $action . '/' . $id;
		
		return $result;
	}
	
	public function editTag($id, Request $request)
	{
		$data = $request->getPost();
		$data['url'] = $data['url'] ? $data['url'] : mb_url_title($data['name'], '-', true);
		$action = Arr::extract('action', $data);
		$result['success'] = $this->db->table('articles_tags')
			->where('id', $id)
			->update($data);
		$result['action'] = $action == 'list' ? '' : '/' . $action . '/' . $id;
		
		return $result;
	}
	
	public function deleteTag($id)
	{
		return $this->db->table('articles_tags')
			->delete(['id' => $id]);
	}
	
}