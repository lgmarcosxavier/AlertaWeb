<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rol extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' 				=> 'INT',
				'constraint' 		=> 5,
				'unsigned' 			=> true,
				'auto_increment' 	=> true
			],
			'nombre' => [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '100',
				'null'				=> false
			],
			'estado' => [
				'type'           	=> 'INT',
				'constraint'     	=> '1',
				'null'				=> false,
				'default'			=> 1
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('rol');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('rol');
	}
}
