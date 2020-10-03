<?php
namespace Auth\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use Auth\Models\UserModel;
use DateTime;

class RegistrationController extends Controller
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
	 * Displays register form.
	 */
	public function register()
	{
		if ($this->session->isLoggedIn) {
			//return redirect()->to('account');
			return redirect()->to('dashboard');
		}

		return view($this->config->views['register'], ['config' => $this->config]);
	}

    //--------------------------------------------------------------------

	/**
	 * Attempt to register a new user.
	 */
	public function attemptRegister()
	{
		helper('text');
		
		// save new user, validation happens in the model
		$users = new UsuarioModel();
		$getRule = $users->getRule('registration');
		$users->setValidationRules($getRule);
		$user = [
			'id_rol'			=> 1,
            //'name'          	=> $this->request->getPost('name'),
            'email'         	=> $this->request->getPost('email'),
            'contrasenia'     		=> $this->request->getPost('contrasenia'),
            'contrasenia_confirm'	=> $this->request->getPost('contrasenia_confirm'),
			//'activate_hash' 	=> random_string('alnum', 32),
			'estado'			=> 1,
			'fecha_commit'		=> date('Y-m-d'),
			'hora_commit'		=> date('H:i:s')
		];

        if (! $users->save($user)) {
			return redirect()->back()->withInput()->with('errors', $users->errors());
        }

		// send activation email
		//helper('auth');
        //send_activation_email($user['email'], $user['activate_hash']);

		// success
        return redirect()->to('login')->with('success', lang('Auth.registrationSuccess'));
	}

    //--------------------------------------------------------------------

	/**
	 * Activate account.
	 */
	public function activateAccount()
	{
		$users = new UserModel();

		// check token
		$user = $users->where('activate_hash', $this->request->getGet('token'))
			->where('active', 0)
			->first();

		if (is_null($user)) {
			return redirect()->to('login')->with('error', lang('Auth.activationNoUser'));
		}

		// update user account to active
		$updatedUser['id'] = $user['id'];
		$updatedUser['active'] = 1;
		$users->save($updatedUser);

		return redirect()->to('login')->with('success', lang('Auth.activationSuccess'));
	}

}
