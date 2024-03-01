<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController
{
    protected $helpers = ['form'];

    public function index(): string
    {
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
                    'correo' => $data['correo'],
                    'type_user' => $data['type_user'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/');
            } else {
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/');
            }
        } else {
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/');
        }
    }
}
