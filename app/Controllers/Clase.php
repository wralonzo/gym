<?php

namespace App\Controllers;

use App\Models\ClaseModel;

class Clase extends BaseController
{
	protected $helpers = ['form'];

	public function index()
	{
		$userModel = new ClaseModel();

		$dataClient = $userModel->findAll();
		$data['data'] = $dataClient;
		return view('layer/shared/head') .
			view('layer/admin/clase/index', $data)
			. view('layer/shared/footer');
	}

	public function registrar()
	{
		helper(['form']);
		if ($this->request->getPost()) {
			$userModel = new ClaseModel();
			$data = [
				'nombre'     => $this->request->getVar('nombre'),
				'descripcion'     => $this->request->getVar('descripcion'),
			];
			$userModel->save($data);
			return redirect()->to('/clase');
		} else {
			$data['validation'] = $this->validator;
			return view('layer/shared/head')
				. view('layer/admin/clase/registrar')
				. view('layer/shared/footer');
		}
	}

	public function editar($id_cliente)
	{
		$userModel = new ClaseModel();

		helper(['form']);
		$dataClient = $userModel->where('id_clase', $id_cliente)->first();
		if (!$this->request->getPost()) {
			$data['data'] = $dataClient;
			return view('layer/shared/head') .
				view('layer/admin/clase/editar', $data)
				. view('layer/shared/footer');
		}
		$dataUpdate = [
			'nombre'     => $this->request->getVar('nombre'),
			'descripcion'     => $this->request->getVar('descripcion'),
		];
		$userModel->where('id_clase', $id_cliente)
			->set($dataUpdate)
			->update();
		return redirect()->to('/clase');
	}

	public function borrar($id_cliente)
	{
		$userModel = new ClaseModel();
		$userModel->where('id_clase', $id_cliente)
			->delete();
		return redirect()->to('/clase');
	}
}
