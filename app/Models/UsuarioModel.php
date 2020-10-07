<?php namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $DBGroup = 'default';

    protected $table      = 'usuario';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id', 
        'id_rol', 
        'nombre', 
        'apellido', 
        'email', 
        'contrasenia',
        'password_hash', 
        'direccion',
        'fotografia',
        'estado',
        'activate_hash',
        'reset_hash',
        'reset_expires',
        'fecha_commit',
        'hora_commit'
    ];

    //protected $useTimestamps = false;

    //protected $validationRules    = [];
    // we need different rules for registration, account update, etc
	/*protected $dynamicRules = [
		'registration' => [
			//'nombre' 				=> 'required|alpha_space|min_length[2]',
			'email' 			    => 'required|valid_email|is_unique[users.email]',
			'contrasenia'			=> 'required|min_length[5]',
			'contrasenia_confirm'	=> 'matches[contrasenia]'
		],
		'updateAccount' => [
			'id'	=> 'required|is_natural',
			'nombre'	=> 'required|alpha_space|min_length[2]'
		],
		'changeEmail' => [
			'id'			=> 'required|is_natural',
			'new_email'		=> 'required|valid_email|is_unique[users.email]',
			'activate_hash'	=> 'required'
		]
	];*/
    
    //protected $validationMessages = [];
    //protected $skipValidation     = false;

    // this runs after field validation
	//protected $beforeInsert = ['hashPassword'];
    //protected $beforeUpdate = ['hashPassword'];
    
    //--------------------------------------------------------------------

    /**
     * Retrieves validation rule
     */
	/*public function getRule(string $rule)
	{
		return $this->dynamicRules[$rule];
	}*/

    //--------------------------------------------------------------------

    /**
     * Hashes the password after field validation and before insert/update
     */
	/*protected function hashPassword(array $data)
	{
		if (! isset($data['data']['contrasenia'])) return $data;

		$data['data']['password_hash'] = password_hash($data['data']['contrasenia'], PASSWORD_DEFAULT);
        unset($data['data']['contrasenia']);
		//unset($data['data']['password_confirm']);

		return $data;
	}*/
}