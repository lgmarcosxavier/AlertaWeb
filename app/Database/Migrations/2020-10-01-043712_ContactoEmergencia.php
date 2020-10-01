<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ContactoEmergencia extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();

		$this->forge->addField([
			'id' => [
				'type' 				=> 'INT',
				'constraint' 		=> 5,
				'unsigned' 			=> true,
				'auto_increment' 	=> true
			],
			'id_usuario' => [
				'type' 				=> 'INT',
				'constraint' 		=> 5,
				'unsigned' 			=> true
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
		$this->forge->addForeignKey('id_usuario', 'usuario', 'id');
		$this->forge->createTable('contacto_emergencia');

		$this->db->enableForeignKeyChecks();
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('contacto_emergencia');
	}
}
