<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Menu extends Migration
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
				'constraint'     => 150,
			],
			'url' => [
				'type'           => 'VARCHAR',
				'constraint'     => 2083,
				'null'           => true,
			],
			'icon' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
				'null'           => true,
			],
			'type_id' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'default'        => 0,
			],
			'order' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'default'        => 0,
			],
		]);
		
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('menu', true);
	}
	
	public function down()
	{
		$this->forge->dropTable('menu', true);
	}
}
