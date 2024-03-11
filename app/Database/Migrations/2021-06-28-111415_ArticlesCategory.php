<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ArticlesCategory extends Migration
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
			'name' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'url' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
				'default'        => '',
			],
			'img' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
				'null'           => true,
			],
		]);
		
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('articles_category', true);
	}
	
	public function down()
	{
		$this->forge->dropTable('articles_category', true);
	}
}
