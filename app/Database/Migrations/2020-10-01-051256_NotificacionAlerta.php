<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NotificacionAlerta extends Migration
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
			'id_alerta' => [
				'type' 				=> 'INT',
				'constraint' 		=> 5,
				'unsigned' 			=> true,
				'null'				=> false
			],
			'fecha_recibido' => [
				'type'           	=> 'DATE',
				'null'				=> true,
			],
			'hora_recibido' => [
				'type'           	=> 'TIME',
				'null'				=> true,
			],
			'id_usuario_emisor' => [
				'type' 				=> 'INT',
				'constraint' 		=> 5,
				'unsigned' 			=> true,
				'null'				=> false
			],
			'id_usuario_receptor' => [
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
		$this->forge->addForeignKey('id_alerta', 'alerta', 'id');
		$this->forge->addForeignKey('id_usuario_emisor', 'usuario', 'id');
		$this->forge->addForeignKey('id_usuario_receptor', 'usuario', 'id');
		$this->forge->createTable('notificacion_alerta');

		$this->db->enableForeignKeyChecks();
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('notificacion_alerta');
	}
}
