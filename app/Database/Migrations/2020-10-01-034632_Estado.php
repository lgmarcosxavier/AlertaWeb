<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Estado extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' 				=> 'INT',
				'constraint' 		=> 5,
				'unsigned' 			=> true,
				'auto_increment' 	=> true
			]
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('estado');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('estado');
	}
}
