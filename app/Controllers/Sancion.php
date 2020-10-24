<?php 
namespace App\Controllers;


use App\Models\AlertaModel;
use App\Models\SancionModel;
use App\Models\TipoAlertaModel;
use CodeIgniter\Controller;
use phpDocumentor\Reflection\Types\Array_;

class Sancion extends Controller
{

    public function sancion($id = null)
    {
    
        //die($id);
        $data['title'] = 'Sistema Alerta';
        $data['page'] = 'departamento';
        $data['nombre_tipo_alerta'] = '';

        $model = new AlertaModel();
        $alerta = $model->find($id);

        if ( $alerta ){
            $modelTipoAlerta = new TipoAlertaModel();
            $tipoAlerta = $modelTipoAlerta->find($alerta['id_tipo_alerta']);

            $data['nombre_tipo_alerta'] = $tipoAlerta['descripcion'];
        }

        $data['alerta'] = $alerta;

       // die($alerta['id_tipo_alerta']);
        return view('pages/alerta/sancion', $data);
    }

    public function registrar()
    {
        session_start();
        
        $observacion = $this->request->getVar('observacion');
       
        if ( $observacion ){
            $model = new SancionModel();
            $modelalerta = new AlertaModel();

            $modelalerta->update($this->request->getVar('id_alerta'),[
                'estado' => 2
            ]);

            $datos = array(
                'id_alerta'   => $this->request->getVar('id_alerta'),
                'id_usuario'  => null,
                'fecha'      => $this->request->getVar('fecha'),
                'observacion' => $observacion,  
                'fecha_commit' => date('Y-m-d'),
                'hora_commit' => date('H:i:s'),
                'estado' => 1
            );


            $model->insert($datos);

            $id = $model->getInsertID();

            //die("paso el insert");

            if ( $id ){
                //die("intro al if");
                $_SESSION['mensaje'] = 'Tipo alerta registrada';
                return redirect()->to(route_to('alerta_index'));
                
            }
           // die("paso sobre el if");
        }

        $_SESSION['mensaje'] = 'No se pudo registrar la alerta';
        return redirect()->back();
    }


}