<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MessagesTypes extends Migration
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
		$this->forge->createTable('messages_types', true);
	}
	
	public function down()
	{
		$this->forge->dropTable('messages_types', true);
	}
}
