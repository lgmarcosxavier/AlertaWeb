<?php
 
namespace App\Controllers;

use App\Database\Migrations\NotificacionAlerta;
use App\Models\AlertaModel;
use App\Models\ContactoEmergenciaModel;
use App\Models\DepartamentoModel;
use App\Models\MensajePersonalizadoModel;
use App\Models\MunicipioModel;
use App\Models\NotificacionAlertaModel;
use App\Models\SancionModel;
use App\Models\TelefonoModel;
use App\Models\TipoAlertaModel;
use App\Models\UsuarioConfianzaModel;
use App\Models\UsuarioModel;
use CodeIgniter\HTTP\Response;
use Config\Services;
use CodeIgniter\RESTful\ResourceController;
 
class RestController extends ResourceController
{
    /**
	 * Access to current session.
	 *
	 * @var \CodeIgniter\Session\Session
	 */
	protected $session;

	/**
	 * Authentication settings.
	 */
	protected $config;
    protected $format = 'json';

    public function __construct()
	{
		// start session
		$this->session = Services::session();

		// load auth settings
		$this->config = config('Auth');
	}

    public function login()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $model = new UsuarioModel();
        $usuario = $model->where('email', $email)
            ->where('estado', 1)
            ->first();

        if ( is_null($usuario) || ! password_verify($password, $usuario['password_hash'])) {
			/*return $this->genericResponse(null, array(
                "mensaje" => "Usuario no identificado"
            ), 500);*/

            return $this->respond(array(
                "codigo"    => '0',
                "mensaje"   => 'Usuario no identificado.',
                "errors"    =>  array(),
                'data'      => array() // json_encode(['id' => 0])
            ));
        }
        
        //return $this->genericResponse($usuario, null, 200);
        if ( $usuario['id_rol'] == 2 ){
            return $this->respond(array(
                "codigo"    => '1',
                "mensaje"   => 'Usuario identificado.',
                "errors"    =>  array(),
                'data'      =>  $usuario //json_encode([$usuario])
            ));
        }else{
            return $this->respond(array(
                "codigo"    => '0',
                "mensaje"   => 'No tienes acceso a la aplicación.',
                "errors"    =>  array(),
                'data'      => array() // json_encode([array()])
            ));
        }
    }

    /**
     * Registrar nuevo usuario desde la app.
     */
    public function registrarUsuario()
    {
        $input = $this->validate([
            'nombre' => [
                'rules'     =>  'required|min_length[3]|max_length[50]',
                'errors'    => [
                    'required'      =>  'El nombre es obligatorio.',
                    'min_length'    =>  'La longitud minima del nombre es 3.',
                    'man_length'    =>  'La longitud máxima del nombre es 50.'
                ]
            ],
            'apellido' => [
                'rules'     =>  'required|min_length[5]|max_length[50]',
                'errors'    => [
                    'required'      =>  'El apellido es obligatorio.',
                    'min_length'    =>  'La longitud minima del apellido es 5.',
                    'man_length'    =>  'La longitud máxima del apellido es 50.'
                ]
            ],
            'numero_telefono' => [
                'rules'     =>  'required|min_length[8]|max_length[50]',
                'errors'    => [
                    'required'      =>  'El numero de telefono es obligatorio.',
                    'min_length'    =>  'La longitud minima del numero de telefono es 5.',
                    'man_length'    =>  'La longitud máxima del numero de telefono es 50.'
                ]
            ],
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
            ],
            'direccion' => [
                'rules'     =>  'required|min_length[5]|max_length[100]',
                'errors'    => [
                    'required'      =>  'La direccion es obligatorio.',
                    'min_length'    =>  'La longitud minima de la direccion es 5.',
                    'man_length'    =>  'La longitud máxima de la direccion es 100.'
                ]
            ],
        ]);
        
        $model = new UsuarioModel();

        if ( !$input ){
            /*return $this->genericResponse(null, array(
                "mensaje" => 'Verfique corroe y contraeña'
            ), 500);*/

            $validation = \Config\Services::validation();

            return $this->respond(array(
                "codigo"    => '0',
                "mensaje"   => 'No se ha podido registrar el usuario',
                'errors'    =>  $validation->getErrors(),
                'data'      =>  array()
            ));
        }else{
            $exito = $model->save([
                'id_rol'            => 2, // Usuario
                'nombre'            => $this->request->getVar('nombre'),
                'apellido'          => $this->request->getVar('apellido'),
                'numero_telefono'   => $this->request->getVar('numero_telefono'),
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

             /*return $this->genericResponse(null, array(
                'mensaje' => 'Usuario registrado correctamente.'
            ), 200);*/ 

            if ( $exito ){
                // buscar usuario
                return $this->respond(array(
                    "codigo"    => '1',
                    "mensaje"   => 'Usuario registrado correctamente',
                    "errors"    =>  array(),
                    'data'      =>  array() //json_encode([]);
                ));
            }else{
                return $this->respond(array(
                    "codigo"    => '0',
                    "mensaje"   => 'No se ha podido registrar el usuario',
                    "errors"    =>  array(),
                    'data'      =>  array() // json_encode([])
                ));
            }
        }
    }

    /**
     * Registrar nuevo usuario desde la app.
     */
    public function actualizarUsuario()
    {
        $id_usuario = $this->request->getVar('id_usuario');
        if ( $id_usuario ){
            $input = $this->validate([
                'nombre' => [
                    'rules'     =>  'required|min_length[3]|max_length[50]',
                    'errors'    => [
                        'required'      =>  'El nombre es obligatorio.',
                        'min_length'    =>  'La longitud minima del nombre es 3.',
                        'man_length'    =>  'La longitud máxima del nombre es 50.'
                    ]
                ],
                'apellido' => [
                    'rules'     =>  'required|min_length[3]|max_length[50]',
                    'errors'    => [
                        'required'      =>  'El apellido es obligatorio.',
                        'min_length'    =>  'La longitud minima del apellido es 3.',
                        'man_length'    =>  'La longitud máxima del apellido es 50.'
                    ]
                ],
                'numero_telefono' => [
                    'rules'     =>  'required|min_length[8]|max_length[50]',
                    'errors'    => [
                        'required'      =>  'El numero de telefono es obligatorio.',
                        'min_length'    =>  'La longitud minima del numero de telefono es 5.',
                        'man_length'    =>  'La longitud máxima del numero de telefono es 50.'
                    ]
                ],
                'email' => [
                    //'rules'     => 'required|valid_email|is_unique[usuario.email,id,'.$id_usuario.']', // las dos funcionan
                    'rules'     => 'required|valid_email|is_unique[usuario.email,id,{id_usuario}]',
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
                ],
                'direccion' => [
                    'rules'     =>  'required|min_length[5]|max_length[100]',
                    'errors'    => [
                        'required'      =>  'La direccion es obligatorio.',
                        'min_length'    =>  'La longitud minima de la direccion es 5.',
                        'man_length'    =>  'La longitud máxima de la direccion es 100.'
                    ]
                ],
            ]);
            
            $model = new UsuarioModel();
    
            if ( !$input ){
                $validation = \Config\Services::validation();
    
                return $this->respond(array(
                    "codigo"    => '0',
                    "mensaje"   => 'No se ha podido actualizar la información del usuario.',
                    'errors'    =>  $validation->getErrors(),
                    'data'      =>  array()
                ));
            }else{

                $usuario = $model->find($id_usuario);

                if ( $usuario ){
                    $exito = $model->update($id_usuario, [
                        'nombre'            => $this->request->getVar('nombre'),
                        'apellido'          => $this->request->getVar('apellido'),
                        'numero_telefono'   => $this->request->getVar('numero_telefono'),
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
        
                    if ( $exito ){
                        return $this->respond(array(
                            "codigo"    => '1',
                            "mensaje"   => 'Usuario actualizado correctamente.',
                            "errors"    =>  array(),
                            'data'      =>  array() //json_encode([]);
                        ));
                    }else{
                        return $this->respond(array(
                            "codigo"    => '0',
                            "mensaje"   => 'No se ha podido actualizaro al usuario.',
                            "errors"    =>  array(),
                            'data'      =>  array() // json_encode([])
                        ));
                    }
                }else{
                    return $this->respond(array(
                        "codigo"    => '0',
                        "mensaje"   => 'No se ha encontrado al usuario a actualizar.',
                        "errors"    =>  array(),
                        'data'      =>  array() // json_encode([])
                    ));
                }
            }
        }else{
            return $this->respond(array(
                "codigo"    => '0',
                "mensaje"   => 'No se ha reconocido al usuario a actualizar.',
                "errors"    =>  array(),
                'data'      =>  array() // json_encode([])
            ));
        }
    }

    /**
     * Recuperatar todos los tipos de alerta
     */
    public function obtenerTiposAlerta()
    {
        $modelTipoAlerta = new TipoAlertaModel();

        $tiposAlerta = $modelTipoAlerta->where('estado', 1)->findAll();

        return $this->respond(array(
            "codigo"    => '1',
            "mensaje"   => 'Se han recuperado tipos de alerta.',
            "errors"    =>  array(),
            'data'      =>  $tiposAlerta // json_encode([])
        ));
    }

    /**
     * Obtener todos los departamentos.
     */
    public function obtenerDepartamentos()
    {
        $modelDepartamentos = new DepartamentoModel();

        $departamentos = $modelDepartamentos->where('estado', 1)->findAll();

        return $this->respond(array(
            "codigo"    => '1',
            "mensaje"   => 'Se han recuperado departamentos.',
            "errors"    =>  array(),
            'data'      =>  $departamentos // json_encode([])
        ));
    }

    /**
     * Obtiene todos los municipios de un departamento.
     */
    public function obtenerMunicipios_Departamento()
    {
        $id_departamento = $this->request->getVar('id_departamento');;

        if ( $id_departamento ){
            $municipiosModel = new MunicipioModel();
    
            $municipios = $municipiosModel->where('estado', 1)
                ->where('id_departamento', $id_departamento)
                ->findAll();
    
            return $this->respond(array(
                "codigo"    => '1',
                "mensaje"   => 'Se han recuperado municipios.',
                "errors"    =>  array(),
                'data'      =>  $municipios // json_encode([])
            ));
        }

        return $this->respond(array(
            "codigo"    => '0',
            "mensaje"   => 'No se ha identificar el departamento.',
            "errors"    =>  array(),
            'data'      =>  array() // json_encode([])
        ));
    }

    /**
     * Obtener todos los usuarios, rol usuario.
     */
    public function obtenerUsuarios()
    {
        $usuarioModel = new UsuarioModel();

        $usuarios = $usuarioModel->where('estado', 1)
            ->where('id_rol', 2)
            ->findAll();

        return $this->respond(array(
            "codigo"    => '1',
            "mensaje"   => 'Se han recuperado usuarios.',
            "errors"    =>  array(),
            'data'      =>  $usuarios // json_encode([])
        ));
    }

    /**
     * Obtener todos los usuarios, rol usuario por nombre
     */
    public function obtenerUsuariosPorNombre()
    {
        $filtro = $this->request->getVar('filtro');
        $usuarioModel = new UsuarioModel();

        $tmp = $usuarioModel->where('estado', 1)
            ->where('id_rol', 2)
            ->findAll();

        if ( $filtro ){
            foreach($tmp as $u){
                if (strpos(strtoupper($u['nombre']), strtoupper($filtro)) !== false || 
                    strpos(strtoupper($u['apellido']), strtoupper($filtro)) !== false) {
                    $usuarios[] = $u;
                }
            }
        }else{
            $usuarios = $tmp;
        }

        return $this->respond(array(
            "codigo"    => '1',
            "mensaje"   => 'Se han recuperado usuarios.',
            "errors"    =>  array(),
            'data'      =>  $usuarios // json_encode([])
        ));
    }

    /**
     * Registrar mensaje peronalizado.
     */
    public function registrarMensajePersonalizado()
    {
        $input = $this->validate([
            'id_usuario' => [
                'rules'     => 'required|numeric',
                'errors'    => [
                    'required'      => 'Debe indicarse el usuario.',
                    'numeric'       => 'El usuario debe ser númerico.'
                ]
            ],
            'asunto'   =>  [
                'rules'     =>  'required|max_length[100]',
                'errors'    =>  [
                    'required'      => 'El asunto es obligatorio.',
                    'max_length'    => 'El asunto no debe ser mayor de 100.'
                ]
            ],
            'mensaje'   =>  [
                'rules'     =>  'max_length[100]',
                'errors'    =>  [
                    'required'      => 'El mensaje es obligatorio.',
                    'max_length'    => 'El mensaje no debe tener más de 100 carácteres.'
                ]
            ],
        ]);

        $model = new MensajePersonalizadoModel();

        if ( !$input ){
            $validation = \Config\Services::validation();

            return $this->respond(array(
                "codigo"    => '0',
                "mensaje"   => 'No se ha podido registrar el mensaje personalizado.',
                'errors'    =>  $validation->getErrors(),
                'data'      =>  array()
            ));
        }else{
            $exito = $model->save([
                'id_usuario'     => $this->request->getVar('id_usuario'),
                'asunto'         => $this->request->getVar('asunto'),
                'mensaje'        => $this->request->getVar('mensaje'),
                'estado'         => 1,
                'fecha_commit'   => date('Y-m-d'),
                'hora_commit'    => date('H:i:s')
            ]);

            if ( $exito ){
                return $this->respond(array(
                    "codigo"    => '1',
                    "mensaje"   => 'Mensaje personalizado registrado correctamente.',
                    "errors"    =>  array(),
                    "data"      =>  array() //json_encode([]);
                ));
            }else{
                return $this->respond(array(
                    "codigo"    => '0',
                    "mensaje"   => 'No se ha podido registrar el mensaje personalizado.',
                    "errors"    =>  array(),
                    "data"      =>  array() // json_encode([])
                ));
            }
        }
    }

    /**
     * Obtener todos los mensajes personalizados del usuario
     */
    public function consultarMensajesPersonalizado()
    {
        $id_usuario = $this->request->getVar('id_usuario');

        if ( $id_usuario ){
            $model = new MensajePersonalizadoModel();
    
            $mensajesPersonalizado = $model->where('estado', 1)
                ->where('id_usuario', $id_usuario)
                ->findAll();
    
            return $this->respond(array(
                "codigo"    => '1',
                "mensaje"   => 'Se han recuperado mensajes personalizados.',
                "errors"    =>  array(),
                'data'      =>  $mensajesPersonalizado // json_encode([])
            ));
        }

        return $this->respond(array(
            "codigo"    => '0',
            "mensaje"   => 'No se ha identificar al usuario.',
            "errors"    =>  array(),
            'data'      =>  array() // json_encode([])
        ));
    }

    /**
     * Registrar usuario confianza
     */
    public function registrarUsuarioConfianza()
    {
        $input = $this->validate([
            'id_usuario' => [
                'rules'     => 'required|numeric',
                'errors'    => [
                    'required'      => 'No se ha reconocido a su usuario.',
                    'numeric'       => 'El código del usuario debe ser númerico..'
                ]
            ],
            'id_usuario_confianza' => [
                'rules'     => 'required|numeric',
                'errors'    => [
                    'required'      => 'No se ha reconocido al usuario que quiere agregar a confianza.',
                    'numeric'       => 'El código del usuario a agregar debe ser númerico..'
                ]
            ],
        ]);

        $model = new UsuarioConfianzaModel();

        if ( !$input ){
            $validation = \Config\Services::validation();

            return $this->respond(array(
                "codigo"    => '0',
                "mensaje"   => 'No se ha podido registrar el usuario de confianza.',
                'errors'    =>  $validation->getErrors(),
                'data'      =>  array()
            ));
        }else{
            $exito = $model->save([
                'id_usuario'            => $this->request->getVar('id_usuario'),
                'id_usuario_confianza'  => $this->request->getVar('id_usuario_confianza'),
                'estado'                => 1,
                'fecha_commit'          => date('Y-m-d'),
                'hora_commit'           => date('H:i:s')
            ]);

            if ( $exito ){
                return $this->respond(array(
                    "codigo"    => '1',
                    "mensaje"   => 'Usuario confianza registrado correctamente.',
                    "errors"    =>  array(),
                    "data"      =>  array() //json_encode([]);
                ));
            }else{
                return $this->respond(array(
                    "codigo"    => '0',
                    "mensaje"   => 'No se ha podido registrar el usuario como de confianza.',
                    "errors"    =>  array(),
                    "data"      =>  array() // json_encode([])
                ));
            }
        }
    }

    /**
     * Consultar usuarios de confianza
     */
    public function consultarUsuariosConfianza()
    {
        $input = $this->validate([
            'id_usuario' => [
                'rules'     => 'required|numeric',
                'errors'    => [
                    'required'      => 'No se ha reconocido a su usuario.',
                    'numeric'       => 'El código del usuario ha sido númerico.'
                ]
            ],
        ]);

        $model = new UsuarioConfianzaModel();

        if ( !$input ){
            $validation = \Config\Services::validation();

            return $this->respond(array(
                "codigo"    => '0',
                "mensaje"   => 'No se ha podido recuperar los usuarios de confianza.',
                'errors'    =>  $validation->getErrors(),
                'data'      =>  array()
            ));
        }else{
            $usuarios = array();
            $usuariosConfianza = $model->where('estado', 1)
                ->where('id_usuario', $this->request->getVar('id_usuario'))
                ->findAll();

            if ( $usuariosConfianza ){
                $usuarioModel = new UsuarioModel();
                
                foreach($usuariosConfianza as $c){
                    $usuario = $usuarioModel->find($c['id_usuario_confianza']);
                    if ( $usuario ){
                        $usuarios[] = $usuario;
                    }
                }
            }
    
            return $this->respond(array(
                "codigo"    => '1',
                "mensaje"   => 'Se han recuperado lo usuarios con confianza.',
                "errors"    =>  array(),
                'data'      =>  $usuarios // json_encode([])
            ));
        }
    }

    /**
     * Obtener todos los usuarios de confianza, pero solo obtener los que coincidan en su nombre
     */
    public function consultarUsuariosConfianzaPorNombre()
    {
        $input = $this->validate([
            'id_usuario' => [
                'rules'     => 'required|numeric',
                'errors'    => [
                    'required'      => 'No se ha reconocido a su usuario.',
                    'numeric'       => 'El código del usuario ha sido númerico.'
                ]
            ],
            'filtro' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'      => 'No se ha reconocido el nombre a buscar.'
                ]
            ]
        ]);

        $model = new UsuarioConfianzaModel();

        if ( !$input ){
            $validation = \Config\Services::validation();

            return $this->respond(array(
                "codigo"    => '0',
                "mensaje"   => 'No se ha podido recuperar los usuarios de confianza.',
                'errors'    =>  $validation->getErrors(),
                'data'      =>  array()
            ));
        }else{
            $usuarios = array();
            $usuariosConfianza = $model->where('estado', 1)
                ->where('id_usuario', $this->request->getVar('id_usuario'))
                ->findAll();

            if ( $usuariosConfianza ){
                $usuarioModel = new UsuarioModel();
                $filtro = $this->request->getVar('filtro');
                
                foreach($usuariosConfianza as $c){
                    $usuario = $usuarioModel->find($c['id_usuario_confianza']);
                    if ( $usuario ){
                        if (strpos(strtoupper($usuario['nombre']), strtoupper($filtro)) !== false || 
                            strpos(strtoupper($usuario['apellido']), strtoupper($filtro)) !== false) {
                            $usuarios[] = $usuario;
                        }
                    }
                }
            }
    
            return $this->respond(array(
                "codigo"    => '1',
                "mensaje"   => 'Se han recuperado lo usuarios con confianza.',
                "errors"    =>  array(),
                'data'      =>  $usuarios // json_encode([])
            ));
        }
    }

    /**
     * Obtener todos los contactos de emergencia
     */
    public function obtenerContactosEmergencia()
    {
        $resultado = array();
        $modelContactos = new ContactoEmergenciaModel();
        $modelTelefono = new TelefonoModel();

        $contactos = $modelContactos->where('estado', 1)->findAll();

        foreach($contactos as $contacto){
            $item = $contacto;
            $item['numeros_telefono'] = '';

            $tmp = $modelTelefono->where('id_contacto_emergencia', $contacto['id'])->findAll();
            $telefonos = array();

            foreach($tmp as $telefono){
                $telefonos[] = $telefono;
                if ( $item['numeros_telefono'] == '' ){
                    $item['numeros_telefono'] .= $telefono['numero_telefono'];
                }else{
                    $item['numeros_telefono'] .= (', ' . $telefono['numero_telefono']);
                }
            }

            $item['telefonos']  = $telefonos;

            $resultado[] = $item;
        }

        return $this->respond(array(
            "codigo"    => '1',
            "mensaje"   => 'Se han recuperado los contactos.',
            "errors"    =>  array(),
            'data'      =>  $resultado // json_encode([])
        ));
    }

    /**
     * Obtener todas las sanciones al usuario especificado
     */
    public function sancionesUsuario()
    {
        $id_usuario = $this->request->getVar('id_usuario');

        if ( $id_usuario ){
            $modelSanciones = new SancionModel();

            // FORMA 1
            /*$result = $modelSanciones->findAll();//->where('id_usuario', $id_usuario);
            $sanciones = array();
            $conteo = 0;

            foreach($result as $r){
                if ( $r['id_usuario'] == $id_usuario ){
                    $sanciones[] = $r;
                    $conteo++;
                }
            }

            //if ( $sanciones ){
            if ( $conteo >= 0){
                return $this->respond(array(
                    "codigo"    => '1',
                    "mensaje"   => 'Sanciones del usuario obtenidas.',
                    'data'      =>  $sanciones // json_encode([$sanciones])
                ));
            }
            */

            // FORMA 2: (mas optimizado)
            $sanciones = $modelSanciones->where('id_usuario', $id_usuario)->findAll();

            return $this->respond(array(
                "codigo"    => '1',
                "mensaje"   => 'Sanciones del usuario obtenidas.',
                "errors"    =>  array(),
                'data'      =>  $sanciones // json_encode([$sanciones])
            ));
        }

        return $this->respond(array(
            "codigo"    => '0',
            "mensaje"   => 'No se puedo encontrar información de sanciones.',
            "errors"    =>  array(),
            'data'      =>  array() // json_encode([])
        ));
    }

    public function consultarAlertasUsuario()
    {
        $input = $this->validate([
            'id_usuario' => [
                'rules'     => 'required|numeric',
                'errors'    => [
                    'required'      => 'No se ha reconocido tu usuario.',
                    'numeric'       => 'El código del usuario debe ser númerico.'
                ]
            ],
        ]);

        $model = new AlertaModel();

        if ( !$input ){
            $validation = \Config\Services::validation();

            return $this->respond(array(
                "codigo"    => '0',
                "mensaje"   => 'No se ha obtener tu alertas.',
                'errors'    =>  $validation->getErrors(),
                'data'      =>  array()
            ));
        }else{
            $alertas = $model->where('estado', 1)->where('id_usuario', $this->request->getVar('id_usuario'))->findAll();

            return $this->respond(array(
                "codigo"    => '0',
                "mensaje"   => 'Se han recuperado alertas del usuario.',
                "errors"    =>  array(),
                "data"      =>  $alertas // json_encode([])
            ));
        }
    }

    public function obtenerAlerta()
    {
        $input = $this->validate([
            'id_alerta' => [
                'rules'     => 'required|numeric',
                'errors'    => [
                    'required'      => 'Debe enviar el código de la alerta para obtener todo los datos.',
                    'numeric'       => 'El código del alerta debe ser númerico.'
                ]
            ]
        ]);

        $model = new AlertaModel();

        if ( !$input ){
            $validation = \Config\Services::validation();

            return $this->respond(array(
                "codigo"    => '0',
                "mensaje"   => 'No se ha podido recuperar la alerta.',
                'errors'    =>  $validation->getErrors(),
                'data'      =>  array()
            ));
        }else{
            $alerta = $model->find($this->request->getVar('id_alerta'));

            if ( $alerta ){
                return $this->respond(array(
                    "codigo"    => '1',
                    "mensaje"   => 'Se han recuperado la alerta solicitada.',
                    "errors"    =>  array(),
                    'data'      =>  $alerta // json_encode([])
                ));
            }else{
                return $this->respond(array(
                    "codigo"    => '0',
                    "mensaje"   => 'No se ha encontrado la alerta solicitada.',
                    "errors"    =>  array(),
                    'data'      =>  array() // json_encode([])
                ));

            }
        }
    }

    /**
     * Marcar la notificacion de alerta como vista, de un usuario confianza
     */
    public function marcarAlertaVista()
    {
        $input = $this->validate([
            'id_alerta' => [
                'rules'     => 'required|numeric',
                'errors'    => [
                    'required'      => 'Debe enviar el código de la alerta para obtener todo los datos.',
                    'numeric'       => 'El código del alerta debe ser númerico.'
                ]
            ],
            'id_usuario' => [
                'rules'     => 'required|numeric',
                'errors'    => [
                    'required'      => 'No se ha reconocido su usuario.',
                    'numeric'       => 'Tú código de usuario debe ser númerico.'
                ]
            ]
        ]);

        $model = new NotificacionAlertaModel();

        if ( !$input ){
            $validation = \Config\Services::validation();

            return $this->respond(array(
                "codigo"    => '0',
                "mensaje"   => 'No se ha podido marcar la alerta como vista.',
                'errors'    =>  $validation->getErrors(),
                'data'      =>  array()
            ));
        }else{
            $alerta = $model->where('id_alerta', $this->request->getVar('id_alerta'))
                ->where('id_usuario_receptor', $this->request->getVar('id_usuario'))->first();

            if ( $alerta ){
                $exito = $model->update($alerta['id'], [
                    'fecha_recibido'    =>  date('Y-m-d'),
                    'hora_recibido'     =>  date('H:i:s'),
                    'estado' => 2, // marcar como vista
                ]);

                if ( $exito ){
                    return $this->respond(array(
                        "codigo"    => '1',
                        "mensaje"   => 'Se ha marcado la alerta como vista.',
                        "errors"    =>  array(),
                        'data'      =>  array() // json_encode([])
                    ));
                }else{
                    return $this->respond(array(
                        "codigo"    => '0',
                        "mensaje"   => 'No se ha podido marcar como vista la alerta.',
                        "errors"    =>  array(),
                        'data'      =>  array() // json_encode([])
                    ));
                }
            }else{
                return $this->respond(array(
                    "codigo"    => '0',
                    "mensaje"   => 'No se ha encontrado la alerta de la notificación.',
                    "errors"    =>  array(),
                    'data'      =>  array() // json_encode([])
                ));

            }
        }
    }

    /**
     * Obtener todas las alertas de las notificaciones a los usuarios de confianza
     * que no han marcado la alerta como vista.
     */
    public function obtenerAlertasNoVistas()
    {
        $input = $this->validate([
            'id_usuario' => [
                'rules'     => 'required|numeric',
                'errors'    => [
                    'required'      => 'No se ha reconocido su usuario.',
                    'numeric'       => 'Tú código de usuario debe ser númerico.'
                ]
            ]
        ]);

        $modelNotificacionAlerta = new NotificacionAlertaModel();
        $modelAlerta = new AlertaModel();

        if ( !$input ){
            $validation = \Config\Services::validation();

            return $this->respond(array(
                "codigo"    => '0',
                "mensaje"   => 'No se ha podido obtener las alertas no vistas.',
                'errors'    =>  $validation->getErrors(),
                'data'      =>  array()
            ));
        }else{
            $alertas = array();
            $notificaciones = $modelNotificacionAlerta
                ->where('id_usuario_receptor', $this->request->getVar('id_usuario'))
                ->where('estado', 1)
                ->findAll();

            if ( $notificaciones ){
                foreach($notificaciones as $notificacion){
                    $alerta = $modelAlerta->find($notificacion['id_alerta']);

                    if ( $alerta ){
                        $alertas[] = $alerta;
                    }
                }
                
                return $this->respond(array(
                    "codigo"    => '1',
                    "mensaje"   => 'Se han recuperado las alertas no vistas.',
                    "errors"    =>  array(),
                    'data'      =>  $alertas // json_encode([])
                ));
            }else{
                return $this->respond(array(
                    "codigo"    => '0',
                    "mensaje"   => 'No se ha encontrado alertas no vistas.',
                    "errors"    =>  array(),
                    'data'      =>  array() // json_encode([])
                ));

            }
        }
    }

    /**
     * Registrar una alerta
     */
    public function registrarAlerta()
    {
        $input = $this->validate([
            'id_tipo_alerta' => [
                'rules'     => 'required|numeric',
                'errors'    => [
                    'required'      => 'Debe indicarse el tipo de alerta.',
                    'numeric'       => 'El tipo de alerta debe ser númerico.'
                ]
            ],
            /*'id_municipio' => [
                'rules'     => 'required|numeric',
                'errors'    => [
                    'required'      => 'Debe indicarse el municipio.',
                    'numeric'       => 'El municipio debe ser númerico.'
                ]
            ],*/
            'descripcion'   =>  [
                'rules'     =>  'max_length[200]',
                'errors'    =>  [
                    'required'      => 'La descripción es obligatorio.',
                    'max_length'    => 'La descripción no debe ser mayor de 200.'
                ]
            ],
            'longitud'   =>  [
                'rules'     =>  'required|max_length[255]',
                'errors'    =>  [
                    'required'      => 'La longitud de la ubicación es obligatorio.',
                    'max_length'    => 'La longitud no debe tener más de 255 carácteres.'
                ]
            ],
            'latitud'   =>  [
                'rules'     =>  'required|max_length[255]',
                'errors'    =>  [
                    'required'      => 'La latitud de la ubicación es obligatorio.',
                    'max_length'    => 'La latitud no debe tener más de 255 carácteres.'
                ]
            ],
            'id_usuario' => [
                'rules'     => 'required|numeric',
                'errors'    => [
                    'required'      => 'No se ha reconocido el usuario que envía la alerta',
                    'numeric'       => 'El identificador del usuario debe ser númerico'
                ]
            ],
        ]);

        $model = new AlertaModel();
        $modelSanciones = new SancionModel();
        $modelUsuarioConfianza = new UsuarioConfianzaModel();
        $modelNotificacionAlerta = new NotificacionAlertaModel();

        if ( !$input ){
            $validation = \Config\Services::validation();

            return $this->respond(array(
                "codigo"    => '0',
                "mensaje"   => 'No se ha podido registrar la alerta',
                'errors'    =>  $validation->getErrors(),
                'data'      =>  array()
            ));
        }else{
            $id_usuario = $this->request->getVar('id_usuario');
            $permitirRegistrar = true;
            
            // ----------------- 1. Validar que el usaurio tenga permitido realizar alerta. -----------------
            $sanciones = $modelSanciones->where('id_usuario', $id_usuario)->where('estado', 1)->findAll();

            if ( $sanciones ){ // si hay sanciones, validar si se debe permitir registrar la alerta
                if ( count($sanciones) > 3 ){// si tiene mas de tres sanciones, validar que no pueda registrar la alerta
                    $permitirRegistrar = false;
                    $ultimaSancion = $sanciones[count($sanciones)-1]; // obtener la ultima sancion
                    if ( $ultimaSancion ){
                        // NOTA: Acá se validará la ultima fecha de la sanción realizada.
                        return $this->respond(array(
                            "codigo"    => '0',
                            "mensaje"   => 'No se puede realizar la alerta, porque tienes sanciones.',
                            "errors"    =>  array(),
                            "data"      =>  array() // json_encode([])
                        ));
                    }
                }else{
                    // si tiene, pero es menor a 3, permitir registrar la alerta
                    $permitirRegistrar = true;
                }
            }

            if ( $permitirRegistrar ){
                // ----------------- 2. Registrar la alerta -----------------
                $exito = $model->save([
                    'fecha_emitida'  => date('Y-m-d'),
                    'id_tipo_alerta' => $this->request->getVar('id_tipo_alerta'),
                    'id_municipio'   => $this->request->getVar('id_municipio'),
                    'descripcion'    => $this->request->getVar('descripcion'),
                    'longitud'       => $this->request->getVar('longitud'),
                    'latitud'        => $this->request->getVar('latitud'),
                    'foto'           => null,
                    'id_usuario'     => $this->request->getVar('id_usuario'),
                    'estado'         => 1,
                    'fecha_commit'   => date('Y-m-d'),
                    'hora_commit'    => date('H:i:s')
                ]);

                // ----------------- 3. Se reconoce los usuarios de confianza -----------------
                // estarán los usuarios que el usuario que lanzó la alerta, él marco usuarios de confianza
                $uA = $modelUsuarioConfianza->where('estado', 1)->where('id_usuario', $id_usuario)->findAll();
                // estarán ls usuarios quienes marcaron como usuario confianza al uuario que lanzó la alerta
                $uB = $modelUsuarioConfianza->where('estado', 1)->where('id_usuario_confianza', $id_usuario)->findAll();
                // limpiar los registros, para que no hayan duplicados de registros en notificacion alerta
                $usuariosLimpios = array();

                foreach($uA as $a){
                    $permitirRegistrar = true;

                    // verificamos que ese id_usuario no esta agregada aun.
                    foreach($usuariosLimpios as $limpio){
                        if ( $limpio['id_usuario'] == $a['id_usuario_confianza'] ){
                            $permitirRegistrar = false;
                            break;
                        }
                    }

                    if ( $permitirRegistrar ){
                        $item['id_usuario'] = $a['id_usuario_confianza'];
                        $usuariosLimpios[] = $item;
                    }
                }

                foreach($uB as $b){
                    $permitirRegistrar = true;

                    // verificamos que ese id_usuario no esta agregada aun.
                    foreach($usuariosLimpios as $limpio){
                        if ( $limpio['id_usuario'] == $b['id_usuario'] ){
                            $permitirRegistrar = false;
                            break;
                        }
                    }

                    if ( $permitirRegistrar ){
                        $item['id_usuario'] = $b['id_usuario'];
                        $usuariosLimpios[] = $item;
                    }
                }

                // ----------------- 4. Por cada usuario confianza se va a registrar una notificacion alerta. -----------------
                foreach($usuariosLimpios as $usuario){
                    $datos = array(
                        'id_alerta'             => $model->getInsertID(),
                        'id_usuario_emisor'     => $this->request->getVar('id_usuario'),
                        'id_usuario_receptor'   => $usuario['id_usuario'],
                        'estado'                => 1,
                        'fecha_commit'          => date('Y-m-d'),
                        'hora_commit'           => date('H:i:s')
                    );

                    $modelNotificacionAlerta->insert($datos);
                }
    
                if ( $exito ){
                    return $this->respond(array(
                        "codigo"    => '1',
                        "mensaje"   => 'Alerta registrado correctamente.',
                        "errors"    =>  array(),
                        "data"      =>  array() //json_encode([]);
                    ));
                }else{
                    return $this->respond(array(
                        "codigo"    => '0',
                        "mensaje"   => 'No se ha podido registrar la alerta.',
                        "errors"    =>  array(),
                        "data"      =>  array() // json_encode([])
                    ));
                }
            }else{
                return $this->respond(array(
                    "codigo"    => '0',
                    "mensaje"   => 'No se ha podido registrar la alerta.',
                    "errors"    =>  array(),
                    "data"      =>  array() // json_encode([])
                ));
            }
        }
    }

    private function genericResponse($data, $msj, $code)
    {
        if ($code == 200) {
            return $this->respond(array(
                "data" => $data,
                "code" => $code
            )); //, 404, "No hay nada"
        } else {
            return $this->respond(array(
                "msj" => $msj,
                "code" => $code
            ));
        }
    }
}