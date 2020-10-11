<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

// ya no se usa
class TelefonoUsuario extends Migration
{
	public function up()
	{
		/*$this->db->disableForeignKeyChecks();

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
			'numero_telefono' => [
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
		$this->forge->createTable('telefono_usuario');

		$this->db->enableForeignKeyChecks();
		*/
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//$this->forge->dropTable('telefono_usuario');
	}
}
