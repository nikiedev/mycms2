<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Settings extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'option_name' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
			'option_value' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'option_info' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
		]);
		
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('settings', true);
	}
	
	public function down()
	{
		$this->forge->dropTable('settings', true);
	}
}
