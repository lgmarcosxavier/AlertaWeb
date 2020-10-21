<?php 
namespace App\Controllers;

use App\Models\MensajePersonalizadoModel;
use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class MensajesPersonalizados extends Controller
{
	public function index()
	{
		$data['title'] = 'Sistema Alerta';
        $data['page'] = 'departamento';

        $model = new MensajePersonalizadoModel();
        $modelUsuario = new UsuarioModel();
        $mensajesResultado = array();

        $mensajes = $model->where('estado', 1)->findAll();

        foreach($mensajes as $mensaje){
            $item = $mensaje;

            $usuario = $modelUsuario->find($mensaje['id_usuario']);
            if ( $usuario ){
                $item['nombreUsuario'] = $usuario['nombre'] . ' ' . $usuario['apellido'];
            }else{
                $item['nombreUsuario'] = '';
            }

            $mensajesResultado[] = $item;
        }

        $data['mensajesPersonalizados'] = $mensajesResultado;

        return view('pages/mensajesPersonalizados/index', $data);

	}

	//--------------------------------------------------------------------

}
