<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comments extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'parent_id' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'default'        => 0,
			],
			'article_id' => [
				'type'           => 'INT',
				'unsigned'       => true,
			],
			'user_id' => [
				'type'           => 'INT',
				'unsigned'       => true,
			],
			'comment' => [
				'type'           => 'TEXT',
			],
			'vote_up' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'default'        => 0,
			],
			'vote_down' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'default'        => 0,
			],
			'thank' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'default'        => 0,
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP',
		]);
		
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('comments', true);
	}
	
	public function down()
	{
		$this->forge->dropTable('comments', true);
	}
}
