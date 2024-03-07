<?php

namespace App\Controllers;

use App\Models\ClaseModel;
use App\Models\ClientAsistenciaModel;
use App\Models\ClientModel;
use App\Models\HorarioModel;
use App\Models\LoginModel;
use App\Models\MembresiaModel;
use App\Models\ReservacionModel;

class Home extends BaseController
{
    public function index(): string
    {
        $productModel = new ClientModel();
        $claseModel = new ClaseModel();
        $login = new LoginModel();
        $reservacion = new ReservacionModel();
        $membresia = new MembresiaModel();
        $horario = new HorarioModel();
        $Asistencia = new ClientAsistenciaModel();
        $claseModel = new ClaseModel();
		$data['client'] = $productModel->where('estado', 1)->get()->getNumRows();
		$data['clase'] = $claseModel->get()->getNumRows();
		$data['login'] = $login->get()->getNumRows();
		$data['reservacion'] = $reservacion->get()->getNumRows();
		$data['membresia'] = $membresia->get()->getNumRows();
		$data['horario'] = $horario->get()->getNumRows();
		$data['asistencia'] = $Asistencia->get()->getNumRows();
        return view('layer/shared/head')
        .view('welcome_message', $data)
        .view('layer/shared/footer');
    }
}
