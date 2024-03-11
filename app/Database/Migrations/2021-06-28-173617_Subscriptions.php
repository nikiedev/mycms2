<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Subscriptions extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'user_id' => [
				'type'           => 'INT',
				'unsigned'       => true,
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP',
			'deleted_at DATETIME DEFAULT NULL ON DELETE CURRENT_TIMESTAMP',
		]);
		
		$this->forge->addPrimaryKey('id');
		$this->forge->addKey('user_id');
		$this->forge->createTable('subscriptions', true);
	}
	
	public function down()
	{
		$this->forge->dropTable('subscriptions', true);
	}
}
