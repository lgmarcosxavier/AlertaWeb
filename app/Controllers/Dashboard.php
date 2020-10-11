<?php 
namespace App\Controllers;

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
			
			return view('layout/dashboard', $data);
		}

		return redirect()->to('login');
	}

	//--------------------------------------------------------------------

}
