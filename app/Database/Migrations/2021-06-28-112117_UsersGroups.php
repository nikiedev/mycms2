<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersGroups extends Migration
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
		]);
		
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('users_group', true);
	}
	
	public function down()
	{
		$this->forge->dropTable('users_group', true);
	}
}
