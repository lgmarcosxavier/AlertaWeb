<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuario extends Migration
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
			'id_rol' => [
				'type' 				=> 'INT',
				'constraint' 		=> 5,
				'unsigned' 			=> true
			],
			'nombre' => [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '50',
				'null'				=> false
			],
			'apellido' => [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '50',
				'null'				=> false
			],
			'email' => [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '100',
				'null'				=> false
			],
			'contrasenia' => [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '255',
				'null'				=> false
			],
			'direccion' => [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '255',
				'null'				=> false
			],
			'fotografia' => [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '255',
				'null'				=> true
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
		$this->forge->addForeignKey('id_rol', 'rol', 'id');
		$this->forge->createTable('usuario');

		$this->db->enableForeignKeyChecks();
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('usuario');
	}
}
