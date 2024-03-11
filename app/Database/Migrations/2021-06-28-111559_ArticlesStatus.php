<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ArticlesStatus extends Migration
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
				'constraint'     => 150,
			],
		]);
		
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('articles_status', true);
	}
	
	public function down()
	{
		$this->forge->dropTable('articles_status', true);
	}
}
