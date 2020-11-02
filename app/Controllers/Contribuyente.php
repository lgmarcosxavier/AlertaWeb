<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class Contribuyente extends Controller
{
	public function index()
	{
        session();

        $data['title'] = 'Sistema Alerta';
        $data['page'] = 'Contactos_Emergencia';

        return view('pages/contribuyente/index', $data);
	}

}