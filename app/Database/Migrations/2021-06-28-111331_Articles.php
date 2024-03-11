<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Articles extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'title' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'meta_title' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
				'null'           => true,
			],
			'meta_desc' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
				'null'           => true,
			],
			'text_intro' => [
				'type'           => 'TEXT',
				'null'           => true,
			],
			'text_full' => [
				'type'           => 'TEXT',
				'null'           => true,
			],
			'images' => [
				'type'           => 'JSON',
				'null'           => true,
			],
			'featured' => [
				'type'           => 'BOOLEAN',
				'default'        => false,
			],
			'page' => [
				'type'           => 'BOOLEAN',
				'default'        => false,
			],
			'home' => [
				'type'           => 'BOOLEAN',
				'default'        => false,
			],
			'rating' => [
				'type'           => 'FLOAT',
				'constraint'     => '2, 1',
				'default'        => 0.0,
			],
			'rating_count' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'default'        => 0,
			],
			'hits' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'default'        => 0,
			],
			'likes' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'default'        => 0,
			],
			'status' => [
				'type'           => 'TINYINT',
				'unsigned'       => true,
				'default'        => 1,
			],
			'comments_on' => [
				'type'           => 'TINYINT',
				'constraint'     => 1,
				'default'        => 0,
			],
			'user_id' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'default'        => 0,
			],
			'category_id' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'default'        => 0,
			],
			'url' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
				'default'        => '',
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP',
		]);
		
		$this->forge->addPrimaryKey('id');
		$this->forge->addKey('status');
		$this->forge->createTable('articles', true);
	}

	public function down()
	{
		$this->forge->dropTable('articles', true);
	}
}
