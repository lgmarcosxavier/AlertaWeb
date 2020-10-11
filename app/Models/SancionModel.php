<?php namespace App\Models;

use CodeIgniter\Model;

class SancionModel extends Model
{
    protected $DBGroup = 'default';

    protected $table      = 'sancion';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id', 
        'id_alerta', 
        'id_usuario', 
        'fecha', 
        'observacion', 
        'estado',
        'fecha_commit',
        'hora_commit'
    ];
}