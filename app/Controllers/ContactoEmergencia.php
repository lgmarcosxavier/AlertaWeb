<?php 
namespace App\Controllers;

use App\Models\ContactoEmergenciaModel;
use App\Models\TelefonoModel;
use CodeIgniter\Controller;

class ContactoEmergencia extends Controller
{
	public function index()
	{
		$data['title'] = 'Sistema Alerta';
        $data['page'] = 'Contactos_Emergencia';

        $model = new ContactoEmergenciaModel();
        $modelTelefono = new TelefonoModel();

        $contactos_emergencias = $model->where('estado', 1)->findAll();
        $r_contactos = array();

        foreach($contactos_emergencias as $contacto){
            $item = $contacto;
            $telefonos = $modelTelefono->where('id_contacto_emergencia', $contacto['id'])->findAll();
            $num_telefono = '';
            
            foreach($telefonos as $telefono){
                $num_telefono .= $telefono['numero_telefono'];
            }

            $item['telefono'] = $num_telefono;

            $r_contactos[] = $item;
        }

        $data['contactos_emergencias'] = $r_contactos;// $contactos_emergencias;
        
        return view('pages/Contactos_Emergencia/index', $data);
	}

    //--------------------------------------------------------------------
    
    public function crear()
    {
        $data['title'] = 'Sistema Alerta';
        $data['page'] = 'tipo-alerta-create';

        return view('pages/Contactos_Emergencia/create', $data);
    }

    //--------------------------------------------------------------------
    
    public function registrar()
    {
        session_start();
        
        $nombre = $this->request->getVar('nombre');
        $numero_telefono = $this->request->getVar('numero_telefono');
        $id_usuario = $this->request->getVar('id_usuario');
        
        if ( $nombre != null && $numero_telefono != null){
            $model = new ContactoEmergenciaModel();
            $modelTelefono = new TelefonoModel();
            
            $datos = array(
                'nombre'        => $nombre,    
                'estado'        => 1,
                'fecha_commit'  => date('Y-m-d'),
                'hora_commit'   => date('H:i:s')
            );
            
            $id = $model->insert($datos);
            
            if ( $id ){
                $datosTelefono = array(
                    'id_contacto_emergencia' => $id,
                    'numero_telefono' => $numero_telefono,
                    'estado' => 1
                );
                
                $modelTelefono->insert($datosTelefono);
                
                $_SESSION['mensaje'] = 'Contacto emergencia registrado';
                return redirect()->to(route_to('ContactoEmergencia_index'));
            }
        }

        $_SESSION['mensaje'] = 'No se pudo registrar el contacto de emergencia.';
        return redirect()->route('ContactoEmergencia_index');
    }

    //--------------------------------------------------------------------

    public function editar($id = null)
    {
        if ( $id ){
            $data = array();
            $model = new ContactoEmergenciaModel();
            $modelTelefono = new TelefonoModel();

            $contactoEmergencia = $model->find($id);
            if ( $contactoEmergencia ){
                $telefono = $modelTelefono->where('id_contacto_emergencia', $contactoEmergencia['id'])->findAll();

                if ( $telefono ){
                    foreach($telefono as $t){
                        $data['telefono'] = $t['numero_telefono']; 
                        break; // solo obtenemos el primero
                    }
                }

                $data['contactoEmergencia'] = $contactoEmergencia;
                return view('pages/Contactos_Emergencia/edit', $data);
            }
        }

        $_SESSION['mensaje'] = 'No se encontro el tipo de alerta para editar';
        return redirect()->back();
    }

    //--------------------------------------------------------------------
    
    public function actualizar($id = null)
    {
        if ( $id ){
            $model = new ContactoEmergenciaModel();
            $modelTelefono = new TelefonoModel();

            $contactoEmergencia = $model->find($id);

            if ( $contactoEmergencia ){
                $model->update($id, [
                    'nombre' => $this->request->getVar('nombre')
                ]);

                $telefono = $modelTelefono->where('id_contacto_emergencia', $contactoEmergencia['id'])->findAll();
                if ( $telefono ){
                    foreach($telefono as $t){
                        $modelTelefono->update($t['id'], [
                            'numero_telefono' => $this->request->getVar('numero_telefono')
                        ]);
                        
                        break; // solo obtenemos el primero
                    }
                }

                $_SESSION['mensaje'] = 'Contacto emergencia actualizado correctamente';
                return redirect()->to(route_to('ContactoEmergencia_index'));
            }
        }

        $_SESSION['mensaje'] = 'No se pudo actualizar el contacto de emergencia';
        return redirect()->back();
    }
    
    //--------------------------------------------------------------------

    public function destroy($id = null)
    {
        if ( $id ){
            $model = new ContactoEmergenciaModel();
            //$model->delete($id);
            $contactoEmergencia = $model->find($id);

            if ( $contactoEmergencia ){
                $model->update($id, [
                    'estado' => 0
                ]);

                $_SESSION['mensaje'] = 'Contacto de emergencia eliminado';
                return redirect()->to(route_to('ContactoEmergencia_index'));
            }
        }
        
        $_SESSION['mensaje'] = 'No se pudo eliminar el contacto de emergencia';
        return redirect()->back();
    }

}