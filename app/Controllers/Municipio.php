<?php 
namespace App\Controllers;

use App\Models\DepartamentoModel;
use App\Models\MunicipioModel;
use CodeIgniter\Controller;

class Municipio extends Controller
{
	public function index()
	{
		$data['title'] = 'Sistema Alerta';
        $data['page'] = 'municipio';

		$municipio = new MunicipioModel();
		$municipios = $municipio->where('estado', 1)->findAll();
		$resultadoMunicipio = array();

		foreach($municipios as $municipio ){
			$departamentoModel = new DepartamentoModel();
			$departamento = $departamentoModel->find($municipio['id_departamento']);
			$aux['nombre_departamento'] = '';

			if ( $departamento ){
				$aux['nombre_departamento'] = $departamento['descripcion'];
			}


			$aux['id'] = $municipio['id'];
			$aux['id_departamento'] = $municipio['id_departamento'];
			$aux['descripcion'] = $municipio['descripcion'];
			$aux['fecha_commit'] = $municipio['fecha_commit'];
			$aux['hora_commit'] = $municipio['hora_commit'];
			$aux['estado'] = $municipio['estado'];

			$resultadoMunicipio[] = $aux;
		}

		$data['municipios'] = $resultadoMunicipio;
		
		return view('pages/municipio/index', $data);
	}

	//--------------------------------------------------------------------

}
