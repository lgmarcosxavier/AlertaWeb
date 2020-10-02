<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
	public function index()
	{
		$data['title'] = 'Sistema Alerta';
		$data['page'] = 'dashboard';

		return view('layout/dashboard', $data);
	}

	//--------------------------------------------------------------------

}
