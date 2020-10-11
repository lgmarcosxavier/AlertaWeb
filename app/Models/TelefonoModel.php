<?php namespace App\Models;

use CodeIgniter\Model;

class TelefonoModel extends Model
{
    protected $DBGroup = 'default';

    protected $table      = 'telefono';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id', 
        'id_contacto_emergencia', 
        'numero_telefono', 
        'estado',
        'reset_expires',
        'fecha_commit',
        'hora_commit'
    ];

}