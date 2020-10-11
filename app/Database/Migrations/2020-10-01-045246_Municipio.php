<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Municipio extends Migration
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
			'id_departamento' => [
				'type' 				=> 'INT',
				'constraint' 		=> 5,
				'unsigned' 			=> true,
				'null'				=> false,
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
		$this->forge->addForeignKey('id_departamento', 'departamento', 'id');
		$this->forge->createTable('municipio');

		$this->db->enableForeignKeyChecks();
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('municipio');
	}
}
