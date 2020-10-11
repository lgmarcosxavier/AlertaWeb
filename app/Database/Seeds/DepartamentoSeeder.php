<?php namespace App\Database\Seeds;

class DepartamentoSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $this->db->disableForeignKeyChecks;

        // usando Queries simples
        $this->db->execute("DELETE FROM departamento");
        $this->db->execute("ALTER TABLE departamento AUTO_INCREMENT = 1");
        $this->db->execute("INSERT INTO `departamento` (`id`, `descripcion`, `estado`) VALUES
            (1, 'PETÉN', 1),
            (2, 'IZABAL', 1),
            (3, 'ALTA VERAPAZ', 1),
            (4, 'QUICHÉ', 1),
            (5, 'HUEHUETENANGO', 1),
            (6, 'ESCUINTLA', 1),
            (7, 'SAN MARCOS', 1),
            (8, 'JUTIAPA', 1),
            (9, 'BAJA VERAPAZ', 1),
            (10, 'SANTA ROSA', 1),
            (11, 'ZACAPA', 1),
            (12, 'SUCHITEPÉQUEZ', 1),
            (13, 'CHIQUIMULA', 1),
            (14, 'GUATEMALA', 1),
            (15, 'JALAPA', 1),
            (16, 'CHIMALTENANGO', 1),
            (17, 'QUETZALTENANGO', 1),
            (18, 'EL PROGRESO', 1),
            (19, 'RETALHULEU', 1),
            (20, 'SOLOLÁ', 1),
            (21, 'TOTONICAPÁN', 1),
            (22, 'SACATEPÉQUEZ', 1);"
        );

        $this->db->enableForeignKeyChecks;
    }
}