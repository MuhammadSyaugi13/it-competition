<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Planning extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'user_id'       => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
			],
			'income'       => [
				'type'       => 'BIGINT',
				'null' => TRUE
			],
			'limit'       => [
				'type'       => 'BIGINT',
				'null' => TRUE
			],
			'bulan'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('planning');
	}

	public function down()
	{
		$this->forge->dropTable('planning');
	}
}
