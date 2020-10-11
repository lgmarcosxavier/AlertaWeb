<?php namespace App\Models;

use CodeIgniter\Model;

class AlertaModel extends Model
{
    protected $DBGroup = 'default';

    protected $table      = 'alerta';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id', 
        'id_tipo_alerta',
        'descripcion',
        'longitud',
        'latitud',
        'foto',
        'id_usuario',
        'estado',
        'fecha_commit',
        'hora_commit'
    ];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}