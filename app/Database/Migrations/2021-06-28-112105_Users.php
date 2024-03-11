<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'group_id' => [
				'type'           => 'TINYINT',
				'unsigned'       => true,
				'default'        => 0,
			],
			'login' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
				'null'           => true,
			],
			'pass' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
				'null'           => true,
			],
			'first_name' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
				'null'           => true,
			],
			'last_name' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
				'null'           => true,
			],
			'patronymic' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
				'null'           => true,
			],
			'nickname' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
				'null'           => true,
			],
			'email' => [
				'type'           => 'VARCHAR',
				'constraint'     => 150,
			],
			'tel' => [
				'type'           => 'VARCHAR',
				'constraint'     => 50,
				'null'           => true,
			],
			'img' => [
				'type'           => 'VARCHAR',
				'constraint'     => 150,
				'null'           => true,
			],
			'speciality' => [
				'type'           => 'VARCHAR',
				'constraint'     => 150,
				'null'           => true,
			],
			'info' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
				'null'           => true,
			],
			'total_thanks' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'default'        => 0,
			],
			'status' => [
				'type'           => 'TINYINT',
				'unsigned'       => true,
				'default'        => 0,
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP',
			
		]);
		
		$this->forge->addPrimaryKey('id');
		$this->forge->addKey('status');
		$this->forge->createTable('users', true);
	}
	
	public function down()
	{
		$this->forge->dropTable('users', true);
	}
}
