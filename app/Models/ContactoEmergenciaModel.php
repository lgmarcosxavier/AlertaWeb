<?php namespace App\Models;

use CodeIgniter\Model;

class ContactoEmergenciaModel extends Model
{
    protected $DBGroup = 'default';

    protected $table      = 'contacto_emergencia';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id', 
        'id_usuario', 
        'nombre', 
        'estado',
        'reset_expires',
        'fecha_commit',
        'hora_commit'
    ];

}