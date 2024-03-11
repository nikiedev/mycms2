<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ArticlesTags extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'auto_increment' => true,
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
		]);
		
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('articles_tags', true);
	}
	
	public function down()
	{
		$this->forge->dropTable('articles_tags', true);
	}
}
