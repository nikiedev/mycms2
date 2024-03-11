<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MenuSide extends Migration
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
				'constraint'     => 100,
			],
		]);
		
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('menu_side', true);
	}
	
	public function down()
	{
		$this->forge->dropTable('menu_side', true);
	}
}
