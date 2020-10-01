<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	public function saludo()
	{
		$data['nombre'] = 'Marcos';
		return view('saludo', $data);
	}

	//--------------------------------------------------------------------

}
