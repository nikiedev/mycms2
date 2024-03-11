<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Messages extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'chain_number' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'default'        => 0,
			],
			'chain_title' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
				'null'           => true,
			],
			'message' => [
				'type'           => 'TEXT',
			],
			'type_id' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'default'        => 0,
			],
			'user_id' => [
				'type'           => 'INT',
				'unsigned'       => true,
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP',
		]);
		
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('messages', true);
	}
	
	public function down()
	{
		$this->forge->dropTable('messages', true);
	}
}
