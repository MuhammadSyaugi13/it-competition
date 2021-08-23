<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Debit extends Migration
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
			'dataDebit' => [
				'type'       => 'LONGTEXT',
				'null' => TRUE
			],
			'TotalDebit' => [
				'type' => 'BIGINT',
				'null' => TRUE
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => TRUE,
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => TRUE,
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('debit');
	}

	public function down()
	{
		$this->forge->dropTable('debit');
	}
}
