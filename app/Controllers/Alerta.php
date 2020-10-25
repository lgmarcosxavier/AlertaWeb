<?php 
namespace App\Controllers;

use App\Models\AlertaModel;
use App\Models\TipoAlertaModel;
use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class Alerta extends Controller
{
	public function index()
	{
		$data['title'] = 'Sistema Alerta';
        $data['page'] = 'departamento';

        $alerta = new AlertaModel();
        $alertas = $alerta->findAll();

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
    
    public function visualizar($id = null)
    {
        if ( $id ){
            $model = new AlertaModel();
            $alerta = $model->find($id);

            if ( $alerta ){
                $modelTipoAlerta = new TipoAlertaModel();
                $tipoAlerta = $modelTipoAlerta->find($alerta['id_tipo_alerta']);
    
                $data['title'] = 'Visualizar alerta';
                $data['nombre_tipo_alerta'] = $tipoAlerta['descripcion'];
                $data['alerta'] = $alerta;

                return view('pages/alerta/visualizar', $data);
            }
        }

        //return json_encode($id);

        return redirect()->back();
    }

    public function verAtender($id = null)
    {
        if ( $id ){
            $model = new AlertaModel();
            $alerta = $model->find($id);

            if ( $alerta ){
                $modelTipoAlerta = new TipoAlertaModel();
                $tipoAlerta = $modelTipoAlerta->find($alerta['id_tipo_alerta']);
    
                $data['title'] = 'Atender alerta';
                $data['nombre_tipo_alerta'] = $tipoAlerta['descripcion'];
                $data['alerta'] = $alerta;

                //return json_encode($alerta);
                return view('pages/alerta/atender', $data);
            }
        }

        //return json_encode($id);

        return redirect()->back();
    }

    public function registarAtender($id = null)
    {
        if ( $id ){
            $model = new AlertaModel();
            $alerta = $model->find($id);

            if ( $alerta ){
                $model->update($id, [
                    'estado'    =>  3
                ]);

                return redirect()->to(route_to('alerta_index'));
            }
        }

        return redirect()->back();
    }

}