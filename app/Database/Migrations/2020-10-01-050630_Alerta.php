<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Alerta extends Migration
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
			'fecha_emitida' => [
				'type'           	=> 'DATE',
				'null'				=> true,
			],
			'id_tipo_alerta' => [
				'type' 				=> 'INT',
				'constraint' 		=> 5,
				'unsigned' 			=> true,
				'null'				=> false
			],
			'id_municipio' => [
				'type' 				=> 'INT',
				'constraint' 		=> 5,
				'unsigned' 			=> true,
				'null'				=> false
			],
			'descripcion' => [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '200',
				'null'				=> false
			],
			'longitud' => [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '255',
				'null'				=> false
			],
			'latitud' => [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '255',
				'null'				=> false
			],
			'foto' => [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '255',
				'null'				=> true
			],
			'id_usuario' => [
				'type' 				=> 'INT',
				'constraint' 		=> 5,
				'unsigned' 			=> true,
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
		$this->forge->addForeignKey('id_tipo_alerta', 'tipo_alerta', 'id');
		$this->forge->addForeignKey('id_municipio', 'municipio', 'id');
		$this->forge->addForeignKey('id_usuario', 'usuario', 'id');
		$this->forge->createTable('alerta');

		$this->db->enableForeignKeyChecks();
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('alerta');
	}
}
