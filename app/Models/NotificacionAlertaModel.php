<?php namespace App\Models;

use CodeIgniter\Model;

class NotificacionAlertaModel extends Model
{
    protected $DBGroup = 'default';

    protected $table      = 'notificacion_alerta';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id', 
        'id_alerta',
        'fecha_recibido',
        'hora_recibido',
        'id_usuario_emisor',
        'id_usuario_receptor',
        'estado',
        'fecha_commit',
        'hora_commit'
    ];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}