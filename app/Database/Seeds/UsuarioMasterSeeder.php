<?php namespace App\Database\Seeds;

class UsuarioMasterSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $this->db->disableForeignKeyChecks;

        $data = [
            'id_rol'            => 1, // Administrador
            'nombre'            => 'Administrador',
            'apellido'          => 'admin',
            'numero_telefono'   => 'xxxx-xxxx   ',
            'email'             => 'admin@admin.com',
            'contrasenia'       => 'admin2020',
            'password_hash'     => password_hash('admin2020', PASSWORD_DEFAULT),
            'direccion'         => 'Zacapa',
            'fotografia'        => null,
            'estado'            => 1,
            'activate_hash'     => null,
            'reset_hash'        => null,
            'reset_expires'        => null,
            'fecha_commit'      => date('Y-m-d'),
            'hora_commit'       => date('H:i:s')
        ];

        // usando Query Builder
        $this->db->table('usuario')->insert($data);
        print_r($this->db->error());

        $this->db->enableForeignKeyChecks;
    }
}