<?php

namespace App\Controllers;

use App\Models\ClientModel;

class Client extends BaseController
{
	protected $helpers = ['form'];

	public function index()
	{
		$userModel = new ClientModel();

		$dataClient = $userModel->where('estado', 1)->findAll();
		$data['data'] = $dataClient;
		return view('layer/shared/head') .
			view('layer/admin/cliente/index', $data)
			. view('layer/shared/footer');
	}

	public function registrar()
	{
		helper(['form']);
		$rules = [
			'nombres'          => 'required|min_length[2]|max_length[50]',
			'apellidos'          => 'required|min_length[2]|max_length[50]',
			'correo'          => 'required|min_length[2]|max_length[50]',
			'direccion'          => 'required|min_length[2]|max_length[150]',
			'telefono'          => 'required|min_length[2]|max_length[50]',
		];

		if ($this->validate($rules)) {
			$userModel = new ClientModel();
			$data = [
				'nombres'     => $this->request->getVar('nombres'),
				'apellidos'     => $this->request->getVar('apellidos'),
				'correo'     => $this->request->getVar('correo'),
				'direccion'     => $this->request->getVar('direccion'),
				'telefono' => $this->request->getVar('telefono')
			];
			$userModel->save($data);
			return redirect()->to('/client');
		} else {
			$data['validation'] = $this->validator;
			return view('layer/shared/head')
				. view('layer/admin/cliente/registrar')
				. view('layer/shared/footer');
		}
	}
}
