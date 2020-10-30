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
        'estado', // 0=inactiva, 1=activa, 2=sancionada, 3=atendida
        'fecha_commit',
        'hora_commit'
    ];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}