<?php 
namespace App\Controllers;

use App\Models\AlertaModel;
use App\Models\TipoAlertaModel;
use App\Models\UsuarioModel;
use CodeIgniter\Controller;
use phpDocumentor\Reflection\Types\Array_;

class Alerta extends Controller
{
	public function index()
	{
		$data['title'] = 'Sistema Alerta';
        $data['page'] = 'departamento';

        $alerta = new AlertaModel();
        $alertas = $alerta->where('estado', 1)->findAll();

        $model = new UsuarioModel();
        $usuarios = $model->where('estado', 1)->findAll();

        $modelTipo = new TipoAlertaModel();
        $tipos_alertas = $modelTipo->where('estado', 1)->findAll();
        
        $data['alertas'] = $alertas;
        $data['usuarios'] = $usuarios;
        $data['tipos_alertas']=$tipos_alertas;
        return view('pages/alerta/index', $data, $usuarios, $tipos_alertas);
	}

	//--------------------------------------------------------------------

}