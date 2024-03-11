<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Modules extends Migration
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
			'status' => [
				'type'           => 'TINYINT',
				'unsigned'       => true,
				'default'        => 1,
			],
		]);
		
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('modules', true);
	}
	
	public function down()
	{
		$this->forge->dropTable('modules', true);
	}
}
