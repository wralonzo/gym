<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController
{
	protected $helpers = ['form'];

	public function index()
	{
		helper('url');
		if (!$this->request->is('post')) {
			return view('layer/login/index');
		}

		$session = session();
		$userModel = new LoginModel();
		$email = $this->request->getVar('usuario');
		$password = $this->request->getVar('clave');

		$data = $userModel->where('usuario', $email)->first();

		if ($data) {
			$pass = $data['clave'];
			$authenticatePassword = password_verify($password, $pass);
			if ($authenticatePassword) {
				$ses_data = [
					'id' => $data['id'],
					'nombres' => $data['nombres'],
					'apellidos' => $data['apellidos'],
					'correo' => $data['usuario'],
					'type_user' => 'vendor',
					'isLoggedIn' => TRUE
				];
				$session->set($ses_data);
				return redirect()->route('/');
			} else {
				$session->setFlashdata('msg', 'Password is incorrect.');
				return redirect()->route('login');
			}
		} else {
			$session->setFlashdata('msg', 'Email does not exist.');
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
			return redirect()->to('/');
		} else {
			$data['validation'] = $this->validator;
			return view('layer/shared/head')
			.view('layer/login/registrar')
			.view('layer/shared/footer');
		}
	}
}
