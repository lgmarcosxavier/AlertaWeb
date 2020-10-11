<?php namespace App\Models;

use CodeIgniter\Model;

class MensajePersonalizadoModel extends Model
{
    protected $DBGroup = 'default';

    protected $table      = 'mensajes_personalizados';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id', 
        'id_usuario',
        'asunto',
        'mensaje',
        'estado',
        'fecha_commit',
        'hora_commit'
    ];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}