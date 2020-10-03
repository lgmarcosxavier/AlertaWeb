<?php
 
namespace App\Controllers;

use App\Models\UsuarioModel;
use Config\Services;
use CodeIgniter\RESTful\ResourceController;
 
class RestController extends ResourceController
{
    /**
	 * Access to current session.
	 *
	 * @var \CodeIgniter\Session\Session
	 */
	protected $session;

	/**
	 * Authentication settings.
	 */
	protected $config;
    protected $format = 'json';

    public function __construct()
	{
		// start session
		$this->session = Services::session();

		// load auth settings
		$this->config = config('Auth');
	}

    public function login()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $model = new UsuarioModel();
        $usuario = $model->where('email', $email)
            ->where('estado', 1)
            ->first();

        if ( is_null($usuario) || ! password_verify($password, $usuario['password_hash'])) {
			return $this->genericResponse(null, array(
                "mensaje" => "Usuario no identificado"
            ), 500);
        }
        
        return $this->genericResponse($usuario, null, 200);
    }


    private function genericResponse($data, $msj, $code)
    {
        if ($code == 200) {
            return $this->respond(array(
                "data" => $data,
                "code" => $code
            )); //, 404, "No hay nada"
        } else {
            return $this->respond(array(
                "msj" => $msj,
                "code" => $code
            ));
        }
    }
}