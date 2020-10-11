<?php namespace App\Models;

use CodeIgniter\Model;

class UsuarioConfianzaModel extends Model
{
    protected $DBGroup = 'default';

    protected $table      = 'usuario_confianza';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id', 
        'id_usuario',
        'id_usuario_confianza',
        'estado',
        'fecha_commit',
        'hora_commit'
    ];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}