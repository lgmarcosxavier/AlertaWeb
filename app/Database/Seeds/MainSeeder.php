<?php namespace App\Database\Seeds;

class MainSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $this->call('RolesSeeder');
    }
}