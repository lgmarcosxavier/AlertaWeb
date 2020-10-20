<?php 
namespace App\Controllers;

use App\Models\ContactoEmergenciaModel;
use CodeIgniter\Controller;

class ContactoEmergencia extends Controller
{
	public function index()
	{
		$data['title'] = 'Sistema Alerta';
        $data['page'] = 'Contactos_Emergencia';

        $model = new ContactoEmergenciaModel();
        $contactos_emergencias = $model->where('estado', 1)->findAll();

        $data['contactos_emergencias'] = $contactos_emergencias;
        
        return view('pages/Contactos_Emergencia/index', $data);
	}

	//--------------------------------------------------------------------

}