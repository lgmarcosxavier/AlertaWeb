<?php 
namespace App\Controllers;

use App\Models\UsuarioConfianzaModel;
use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class Usuario extends Controller
{
    public function administradores()
	{
        $data['title'] = 'Sistema Alerta';
        $data['page'] = 'usuario-administrador';
        
        $model = new UsuarioModel();
        $usuarios = $model->where('estado', 1)
            ->where('id_rol', 1)
            ->findAll();
        
        $data['usuarios'] = $usuarios;


        return view('pages/usuario/administrador/index', $data);
	}

    //--------------------------------------------------------------------

    public function usuarios()
    {
        
    }

    //--------------------------------------------------------------------

    public function crearAdministrador()
    {
        session();

        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('pages/usuario/administrador/create', $data);
    }

    //--------------------------------------------------------------------

    public function registrarAdministrador()
    {
        $input = $this->validate([
            'nombre' => [
                'rules'     =>  'required',
                'errros'    => [
                    'required'      => 'El campo nombre es obligatorio'
                ]
            ],
            'apellido'      => 'required',
            'email' => [
                'rules'     => 'required|valid_email|is_unique[usuario.email]',
                'errors'    => [
                    'required'      => 'El campo email es obligatorio',
                    'valid_email'   => 'El email no es válido',
                    'is_unique'     => 'El email ya está en uso.'
                ]
            ],
            'contrasenia'   =>  'required|min_length[5]',
            'contrasenia_confirm'	=> [
                'rules' =>  'matches[contrasenia]',
                'errors' => [
                    'matches'   => 'La contraseña no coincide'
                ]
            ]
        ]);
        
        $model = new UsuarioModel();

        if ( !$input ){
            return redirect()->to(route_to('usuarioAdministrador_crear'))->withInput();
        }else{
           $model->save([
                'id_rol'            => 1, // Administrador
                'nombre'            => $this->request->getVar('nombre'),
                'apellido'          => $this->request->getVar('apellido'),
                'email'             => $this->request->getVar('email'),
                'contrasenia'       => $this->request->getVar('contrasenia'),
                'password_hash'     => password_hash($this->request->getVar('contrasenia'), PASSWORD_DEFAULT),
                'direccion'         => $this->request->getVar('direccion'),
                'fotografia'        => null,
                'estado'            => 1,
                'activate_hash'     => null,
                'reset_hash'        => null,
                'reset_expires'     => null,
                'fecha_commit'      => date('Y-m-d'),
                'hora_commit'       => date('H:i:s')
            ]);
            
            return redirect()->to(route_to('usuarioAdmininistrador'));
        }
    }

    //--------------------------------------------------------------------

    public function eliminarAdministrador($id = null)
    {
        if ( $id ){
            $model = new UsuarioModel();
            $usuario = $model->find($id);

            if ( $usuario ){
                $model->update($id, [
                    'estado' => 0
                ]);

                $_SESSION['mensaje'] = 'Usuario administrador eliminado';
                return redirect()->to(route_to('usuarioAdmininistrador'));
            }
        }
        
        $_SESSION['mensaje'] = 'No se pudo eliminar al usuario';
        return redirect()->back();
    }

    //--------------------------------------------------------------------

    public function darBajaUsuario($id = null)
    {
        if ( $id ){
            $model = new UsuarioModel();
            $usuario = $model->find($id);

            if ( $usuario ){
                $model->update($id, [
                    'estado' => 0
                ]);

                $_SESSION['mensaje'] = 'El usuario se ha dado de baja';
                return redirect()->to(route_to('usuariosCliente'));
            }
        }
        
        $_SESSION['mensaje'] = 'No se pudo eliminar al usuario';
        return redirect()->back();
    }

    //--------------------------------------------------------------------

    public function verUsuariosConfianza($id = null)
    {
        
    }
    //--------------------------------------------------------------------
}