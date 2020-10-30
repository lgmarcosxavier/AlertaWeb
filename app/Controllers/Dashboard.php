<?php 
namespace App\Controllers;

#use App\Models\AlertaModel;
#use App\Models\UsuarioModel;

use App\Models\AlertaModel;
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

			/*$modelAlertas = new AlertaModel();
			$modelUsuarios = new UsuarioModel();
			$resultados = array();
			$conteo = 1;
			
			$alertas = $modelAlertas->findAll();

			foreach($alertas as $alerta){
				if ( $conteo <= 2 ){
					if ( $alerta['estado'] != 0 ){
						$item = $alerta;
		
						$usuario = $modelUsuarios->find($alerta['id_usuario']);
						if ( $usuario ){
							$item['nombre_usuario'] = $usuario['nombre'] . ' ' . $usuario['apellido'];
						}
		
						$conteo++;
						$resultados[] = $item;
						continue;
					}
				}else{
					break;
				}
			}

			$data['alertas'] = $resultados;*/

			$db = db_connect();
			$query = $db->query("SELECT a.id, a.id_usuario, a.estado, a.fecha_commit, u.nombre, u.apellido FROM alerta a INNER JOIN usuario u on u.id = a.id_usuario WHERE a.estado != 0 ORDER BY a.id DESC LIMIT 20;");
			while ($row = $query->getUnbufferedRow())
			{
				$item = $row;
				$resultados[] = $item;
			}

			// obtener los estados de las alertas
			$alertasPendientes = 0;
			$alertasSancionadas = 0;
			$alertasAtendidas = 0;

			$cantPendientes = $db->query("SELECT COUNT(*) as 'total' FROM alerta where estado = 1")->getResultArray();
			if ( $cantPendientes != null ){ $alertasPendientes = $cantPendientes[0]['total']; }
			$cantSancionadas = $db->query("SELECT COUNT(*) as 'total' FROM alerta where estado = 2")->getResultArray();
			if ( $cantSancionadas != null ){ $alertasSancionadas = $cantSancionadas[0]['total']; }
			$cantAtendidas = $db->query("SELECT COUNT(*) as 'total' FROM alerta where estado = 3")->getResultArray();
			if ( $cantAtendidas != null ){ $alertasAtendidas = $cantAtendidas[0]['total']; }

			// obtener loos estados de las alertas
			$db->close();

			
			$data['alertas'] = $resultados;
			$data['alertasPendientes'] = $alertasPendientes;
			$data['alertasSancionadas'] = $alertasSancionadas;
			$data['alertasAtendidas'] = $alertasAtendidas;
			
			//return json_encode($data['alertas']);
			return view('layout/dashboard', $data);
		}

		return redirect()->to('login');
	}

	//--------------------------------------------------------------------

}
