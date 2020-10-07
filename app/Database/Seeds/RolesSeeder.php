<?php namespace App\Database\Seeds;

class RolesSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $this->db->disableForeignKeyChecks;

        $data = [
            [
                'nombre'    => 'Administrador',
                'estado'    => 1
            ],[
                'nombre'    => 'Usuario',
                'estado'    => 1
            ]
        ];

        // usando Queries simples
        //$this->db->query("INSERT INTO rol (nombre) VALUES(:nombre:, :estado:)", $data );
        $this->db->execute("DELETE FROM rol");
        $this->db->execute("ALTER TABLE rol AUTO_INCREMENT = 1");
        $this->db->execute("INSERT INTO rol (nombre, estado) VALUES('Administrador', 1)");
        $this->db->execute("INSERT INTO rol (nombre, estado) VALUES('Usuario', 1)");

        // usando Query Builder
        //$this->db->table('rol')->insert($data);

        $this->db->enableForeignKeyChecks;
    }
}