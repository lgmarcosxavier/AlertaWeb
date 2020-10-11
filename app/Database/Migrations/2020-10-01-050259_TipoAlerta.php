<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TipoAlerta extends Migration
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
				'null'				=> false,
			],
			'hora_commit' => [
				'type'           	=> 'TIME',
				'null'				=> false,
			]
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('tipo_alerta');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('tipo_alerta');
	}
}
