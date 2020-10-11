<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Departamento extends Migration
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
			'descripcion' => [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '100',
				'null'				=> false
			],
			'estado' => [
				'type'           	=> 'INT',
				'constraint'     	=> '1',
				'null'				=> false,
				'default'			=> 1
			],
			'fecha_commit' => [
				'type'           	=> 'DATE',
				'null'				=> true,
			],
			'hora_commit' => [
				'type'           	=> 'TIME',
				'null'				=> true,
			]
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('departamento');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('departamento');
	}
}
