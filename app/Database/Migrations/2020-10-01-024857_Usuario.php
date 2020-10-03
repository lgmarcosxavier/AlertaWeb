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
				'null'				=> true
			],
			'apellido' => [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '50',
				'null'				=> true
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
			'password_hash' => [
				'type' 				=> 'VARCHAR', 
				'constraint' 		=> 191
			],
			'direccion' => [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '255',
				'null'				=> true
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
			'activate_hash' => [
				'type' 				=> 'VARCHAR', 
				'constraint' 		=> 191, 
				'null' 				=> true
			],
            'reset_hash' => [
				'type' 				=> 'VARCHAR', 
				'constraint' 		=> 191, 
				'null' 				=> true
			],
        	'reset_expires' => [
				'type' 				=> 'BIGINT', 	
				'null' 				=> true
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
