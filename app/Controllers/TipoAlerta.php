<?php 
namespace App\Controllers;

use App\Models\TipoAlertaModel;
use CodeIgniter\Controller;

class TipoAlerta extends Controller
{
	public function index()
	{
        $data['title'] = 'Sistema Alerta';
        $data['page'] = 'tipo-alerta';
        
        $model = new TipoAlertaModel();
        $tipoAlertas = $model->where('estado', 1)->findAll();
        
        $data['tipoAlertas'] = $tipoAlertas;
        
        return view('pages/tipoAlerta/index', $data);
	}

    //--------------------------------------------------------------------
    
    public function crear()
    {
        $data['title'] = 'Sistema Alerta';
        $data['page'] = 'tipo-alerta-create';

        return view('pages/tipoAlerta/create', $data);
    }

    //--------------------------------------------------------------------
    
    public function registrar()
    {
        session_start();
        
        $descripcion = $this->request->getVar('descripcion');

        if ( $descripcion ){
            $model = new TipoAlertaModel();

            $datos = array(
                'descripcion' => $descripcion,  
                'fecha_commit' => date('Y-m-d'),
                'hora_commit' => date('H:i:s'),
                'estado' => 1
            );


            $id = $model->insert($datos);

            if ( $id ){
                $_SESSION['mensaje'] = 'Tipo alerta registrado';
                return redirect()->to(route_to('tipoAlerta_index'));
            }
        }

        $_SESSION['mensaje'] = 'No se pudo registrar el tipo de alerta';
        return redirect()->back();
    }

    //--------------------------------------------------------------------

    public function editar($id = null)
    {
        if ( $id ){
            $model = new TipoAlertaModel();

            $tipoAlerta = $model->find($id);
            if ( $tipoAlerta ){
                $data['tipoAlerta'] = $tipoAlerta;
                return view('pages/tipoAlerta/edit', $data);
            }
        }

        $_SESSION['mensaje'] = 'No se encontro el tipo de alerta para editar';
        return redirect()->back();
    }

    //--------------------------------------------------------------------

    public function actualizar($id = null)
    {
        if ( $id ){
            $model = new TipoAlertaModel();
            $tipoAlerta = $model->find($id);

            if ( $tipoAlerta ){
                $model->update($id, [
                    'descripcion' => $this->request->getVar('descripcion')
                ]);

                $_SESSION['mensaje'] = 'Tipo alerta actualizada correctamente';
                return redirect()->to(route_to('tipoAlerta_index'));
            }
        }

        $_SESSION['mensaje'] = 'No se pudo actualizar el tipo de alerta';
        return redirect()->back();
    }

    //--------------------------------------------------------------------

    public function destroy($id = null)
    {
        if ( $id ){
            $model = new TipoAlertaModel();
            //$model->delete($id);
            $tipoAlerta = $model->find($id);

            if ( $tipoAlerta ){
                $model->update($id, [
                    'estado' => 0
                ]);

                $_SESSION['mensaje'] = 'Tipo alerta eliminado';
                return redirect()->to(route_to('tipoAlerta_index'));
            }
        }
        
        $_SESSION['mensaje'] = 'No se pudo eliminar el tipo de alerta';
        return redirect()->back();
    }
}
