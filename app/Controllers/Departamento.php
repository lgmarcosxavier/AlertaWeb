<?php 
namespace App\Controllers;

use App\Models\DepartamentoModel;
use CodeIgniter\Controller;

class Departamento extends Controller
{
	public function index()
	{
		$data['title'] = 'Sistema Alerta';
        $data['page'] = 'departamento';

        $departamento = new DepartamentoModel();
        $departamentos = $departamento->where('estado', 1)->findAll();

        $data['departamentos'] = $departamentos;
        
        return view('pages/departamento/index', $data);
	}

	//--------------------------------------------------------------------

}
