<?php namespace App\Models;

use CodeIgniter\Model;

class MunicipioModel extends Model
{
    protected $DBGroup = 'default';

    protected $table      = 'municipio';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id', 
        'id_departamento', 
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