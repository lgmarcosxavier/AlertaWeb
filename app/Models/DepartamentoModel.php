<?php namespace App\Models;

use CodeIgniter\Model;

class DepartamentoModel extends Model
{
    protected $DBGroup = 'default';

    protected $table      = 'departamento';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id', 
        'descripcion',
        'estado',
        'fecha_commit',
        'hora_commit'
    ];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}