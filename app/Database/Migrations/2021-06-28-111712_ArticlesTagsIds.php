<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ArticlesTagsIds extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'article_id' => [
				'type'           => 'INT',
				'null'           => true,
			],
			'tag_id' => [
				'type'           => 'INT',
				'null'           => true,
			],
		]);
		
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('articles_tags_ids', true);
	}
	
	public function down()
	{
		$this->forge->dropTable('articles_tags_ids', true);
	}
}
