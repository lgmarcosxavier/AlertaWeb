<?php 
namespace App\Controllers;

use App\Models\AlertaModel;
use App\Models\UsuarioModel;
use CodeIgniter\Controller;
use Config\Services;

class Dashboard extends Controller
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

	//--------------------------------------------------------------------

	public function __construct()
	{
		// start session
		$this->session = Services::session();

		// load auth settings
		$this->config = config('Auth');
	}

    //--------------------------------------------------------------------

	public function index()
	{
		if ($this->session->isLoggedIn) {
			$data['title'] = 'Sistema Alerta';
			$data['page'] = 'dashboard';

			$modelAlertas = new AlertaModel();
			$modelUsuarios = new UsuarioModel();
			$resultados = array();
			
			$alertas = $modelAlertas->findAll();

			foreach($alertas as $alerta){
				$item = $alerta;

				$usuario = $modelUsuarios->find($alerta['id_usuario']);
				if ( $usuario ){
					$item['nombre_usuario'] = $usuario['nombre'] . ' ' . $usuario['apellido'];
				}

				$resultados[] = $item;
			}

			$data['alertas'] = $resultados;
			
			return view('layout/dashboard', $data);
		}

		return redirect()->to('login');
	}

	//--------------------------------------------------------------------

}
