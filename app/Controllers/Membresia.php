<?php

namespace App\Controllers;
use App\Models\MembresiaModel;

class Membresia extends BaseController
{
	protected $helpers = ['form'];

	public function index()
	{
		$userModel = new MembresiaModel();

		$dataClient = $userModel->findAll();
		$data['data'] = $dataClient;
		return view('layer/shared/head') .
			view('layer/admin/membresia/index', $data)
			. view('layer/shared/footer');
	}

	public function registrar()
	{
		helper(['form']);
		if ($this->request->getPost()) {
			$userModel = new MembresiaModel();
			$data = [
				'precio'     => $this->request->getVar('precio'),
				'descripcion'     => $this->request->getVar('descripcion'),
			];
			$userModel->save($data);
			return redirect()->to('/membresia');
		} else {
			$data['validation'] = $this->validator;
			return view('layer/shared/head')
				. view('layer/admin/membresia/registrar')
				. view('layer/shared/footer');
		}
	}

	public function editar($id_cliente)
	{
		$userModel = new MembresiaModel();

		helper(['form']);
		$dataClient = $userModel->where('id_membresia', $id_cliente)->first();
		if (!$this->request->getPost()) {
			$data['data'] = $dataClient;
			return view('layer/shared/head') .
				view('layer/admin/membresia/editar', $data)
				. view('layer/shared/footer');
		}
		$dataUpdate = [
			'precio'     => $this->request->getVar('precio'),
			'descripcion'     => $this->request->getVar('descripcion'),
		];
		$userModel->where('id_membresia', $id_cliente)
			->set($dataUpdate)
			->update();
		return redirect()->to('/membresia');
	}

	public function borrar($id_cliente)
	{
		$userModel = new MembresiaModel();
		$userModel->where('id_membresia', $id_cliente)
			->delete();
		return redirect()->to('/membresia');
	}
}
