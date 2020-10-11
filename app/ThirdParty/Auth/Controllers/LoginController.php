<?php
namespace Auth\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use Auth\Models\UserModel;

class LoginController extends Controller
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

	/**
	 * Displays login form or redirects if user is already logged in.
	 */
	public function login()
	{
		if ($this->session->isLoggedIn) {
			//return redirect()->to('account');
			return redirect()->to('dashboard');
		}

		return view($this->config->views['login'], ['config' => $this->config]);
	}

    //--------------------------------------------------------------------

	/**
	 * Attempts to verify user's credentials through POST request.
	 */
	public function attemptLogin()
	{
		// validate request
		$rules = [
			'email'		=> 'required|valid_email',
			'contrasenia' 	=> 'required|min_length[5]',
		];

		if (! $this->validate($rules)) {
			return redirect()->to('login')
				->withInput()
				->with('errors', $this->validator->getErrors());
		}

		// check credentials
		$users = new UsuarioModel();
		$user = $users->where('email', $this->request->getPost('email'))->first();
		if (
			is_null($user) ||
			! password_verify($this->request->getPost('contrasenia'), $user['password_hash'])
		) {
			return redirect()->to('login')->withInput()->with('error', lang('Auth.wrongCredentials'));
		}

		// check activation
		if (!$user['estado']) {
			return redirect()->to('login')->withInput()->with('error', lang('Auth.notActivated'));
		}

		// login OK, save user data to session
		$this->session->set('isLoggedIn', true);
		$this->session->set('userData', [
		    'id' 			=> $user['id'],
		    'nombre' 			=> $user['nombre'],
		    'email' 		=> $user['email'],
		]);

        //return redirect()->to('account');
        return redirect()->to('dashboard');
	}

    //--------------------------------------------------------------------

	/**
	 * Log the user out.
	 */
	public function logout()
	{
		$this->session->remove(['isLoggedIn', 'userData']);

		return redirect()->to('login');
	}

}
