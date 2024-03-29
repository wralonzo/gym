<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController
{
	protected $helpers = ['form', 'url'];

	public function index()
	{
		if (!$this->request->is('post')) {
			return view('layer/login/index');
		}

		$session = session();
		$userModel = new LoginModel();
		$email = $this->request->getVar('usuario');
		$password = $this->request->getVar('clave');

		$data = $userModel->where('usuario', $email)->orderBy('id', 'desc')->first();

		if ($data) {
			$pass = $data['clave'];
			$authenticatePassword = password_verify($password, $pass);
			if ($authenticatePassword) {
				$ses_data = [
					'id' => $data['id'],
					'nombres' => $data['nombres'],
					'apellidos' => $data['apellidos'],
					'correo' => $data['usuario'],
					'type_user' => $data['type_user'],
					'isLoggedIn' => TRUE
				];
				$session->set($ses_data);
				return redirect()->route('/');
			} else {
				$session->setFlashdata('msg', 'El usuario no existe.');
				return redirect()->route('login');
			}
		} else {
			$session->setFlashdata('msg', 'El usuario no existe.');
			return redirect()->route('login');
		}
	}

	public function registrar()
	{
		helper(['form']);
		$rules = [
			'nombres'          => 'required|min_length[2]|max_length[50]',
			'apellidos'          => 'required|min_length[2]|max_length[50]',
			'usuario'          => 'required|min_length[2]|max_length[50]',
			'clave'          => 'required|min_length[2]|max_length[50]',
			'type_user'          => 'required|min_length[2]|max_length[50]',
		];

		if ($this->validate($rules)) {
			$userModel = new LoginModel();
			$data = [
				'nombres'     => $this->request->getVar('nombres'),
				'apellidos'     => $this->request->getVar('apellidos'),
				'usuario'     => $this->request->getVar('usuario'),
				'type_user'     => $this->request->getVar('type_user'),
				'clave' => password_hash($this->request->getVar('clave'), PASSWORD_DEFAULT)
			];
			$userModel->save($data);
			return redirect()->to('/user/list');
		} else {
			$data['validation'] = $this->validator;
			return view('layer/shared/head')
				. view('layer/login/registrar')
				. view('layer/shared/footer');
		}
	}
	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->route('/');
	}

	public function display()
	{
		$userModel = new LoginModel();
		$dataClient = $userModel->where('estado', 1)->orderBy('id', 'desc')->findAll();
		$data['data'] = $dataClient;
		return view('layer/shared/head') .
			view('layer/admin/user/index', $data)
			. view('layer/shared/footer');
	}

	public function editar($id)
	{
		helper(['form']);
		$userModel = new LoginModel();
		$dataClient = $userModel->where('estado', 1)->where('id', $id)->first();
		if (!$this->request->getPost()) {
			$data['data'] = $dataClient;
			return view('layer/shared/head') .
				view('layer/admin/user/editar', $data)
				. view('layer/shared/footer');
		}
		$dataUpdate = [
			'nombres'     => $this->request->getVar('nombres'),
			'apellidos'     => $this->request->getVar('apellidos'),
			'usuario'     => $this->request->getVar('usuario'),
			'type_user'     => $this->request->getVar('type_user'),
		];
		$userModel->where('id', $id)
			->set($dataUpdate)
			->update();
		return redirect()->to('/user/list');
	}

	public function borrar($id_cliente)
	{
		$userModel = new LoginModel();
		$userModel->where('id', $id_cliente)
			->delete();
		return redirect()->to('/user/list');
	}
}
