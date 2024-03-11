<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Notifications extends Migration
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
				'null'           => true,
			],
			'message' => [
				'type'           => 'TEXT',
			],
			'icon' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
				'default'        => '',
			],
			'user_id' => [
				'type'           => 'INT',
				'unsigned'       => true,
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP',
		]);
		
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('notifications', true);
	}
	
	public function down()
	{
		$this->forge->dropTable('notifications', true);
	}
}
