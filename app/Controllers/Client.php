<?php

namespace App\Controllers;

use App\Models\ClaseModel;
use App\Models\ClientAsistenciaModel;
use App\Models\ClientModel;
use App\Models\HorarioModel;

class Client extends BaseController
{
	protected $helpers = ['form'];

	public function index()
	{
		$userModel = new ClientModel();

		$dataClient = $userModel->where('estado', 1)->orderBy('id_cliente', 'desc')->findAll();
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

	public function asistencia()
	{
		helper(['form']);
		
		$clientModel = new ClientModel();
		$asistencia = new ClientAsistenciaModel();
		if (!$this->request->getPost()) {
			$userModel = new HorarioModel();
			$dataClient = $userModel->select('clase.nombre as nombre, horario.id_horario, horario.descripcion')->join('clase', 'clase.id_clase = horario.id_clase')->findAll();
			$data['data'] = $dataClient;
			return view('layer/shared/head') .
				view('layer/admin/cliente/portal', $data)
				. view('layer/shared/footer');
		}

		$client = $clientModel->where('estado', 1)->where('id_cliente', $this->request->getVar('id_cliente'))->first();
		if (!$client) {
			return redirect()->to('/client/asistencia');
		}
		$data = [
			'id_cliente'     => $this->request->getVar('id_cliente'),
			'id_horario'     => $this->request->getVar('id_horario'),
		];
		$asistencia->save($data);
		return redirect()->to('/client/asistencia');
	}

	public function editar($id_cliente)
	{
		$userModel = new ClientModel();

		helper(['form']);
		$dataClient = $userModel->where('estado', 1)->where('id_cliente', $id_cliente)->first();
		if (!$this->request->getPost()) {
			$data['data'] = $dataClient;
			return view('layer/shared/head') .
				view('layer/admin/cliente/editar', $data)
				. view('layer/shared/footer');
		}
		$dataUpdate = [
			'nombres'     => $this->request->getVar('nombres'),
			'apellidos'     => $this->request->getVar('apellidos'),
			'correo'     => $this->request->getVar('correo'),
			'direccion'     => $this->request->getVar('direccion'),
			'telefono' => $this->request->getVar('telefono'),
		];
		$userModel->where('id_cliente', $id_cliente)
			->set($dataUpdate)
			->update();
		return redirect()->to('/client');
	}
}
