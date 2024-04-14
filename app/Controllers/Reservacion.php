<?php

namespace App\Controllers;

use App\Models\ClaseModel;
use App\Models\ClientModel;
use App\Models\ReservacionModel;
use App\Models\HorarioModel;
use Exception;

class Reservacion extends BaseController
{
	protected $helpers = ['form'];

	public function index()
	{
		$userModel = new ReservacionModel();

		$dataClient = $userModel
		->select('reservacion.id_reservacion as id, cli.nombres, cli.apellidos, reservacion.created_at, reservacion.estado, hr.hora_fin, hr.hora_inicio, cla.nombre')
		->join('cliente as cli', 'cli.id_cliente = reservacion.id_cliente')
		->join('horario as hr', 'hr.id_horario = reservacion.id_horario')
		->join('clase as cla', 'cla.id_clase = hr.id_clase')
		->orderBy('reservacion.id_reservacion', 'desc')
		->findAll();
		$data['data'] = $dataClient;
		return view('layer/shared/head') .
			view('layer/admin/reservacion/index', $data)
			. view('layer/shared/footer');
	}

	public function client()
	{
		$userModel = new ReservacionModel();

		$dataClient = $userModel
		->select('reservacion.id_reservacion as id, cli.nombres, cli.apellidos, reservacion.created_at, reservacion.estado, hr.hora_fin, hr.hora_inicio, cla.nombre')
		->join('cliente as cli', 'cli.id_cliente = reservacion.id_cliente')
		->join('horario as hr', 'hr.id_horario = reservacion.id_horario')
		->join('clase as cla', 'cla.id_clase = hr.id_clase')
		->where('cli.id_cliente', session()->get('id_client'))
		->orderBy('reservacion.id_reservacion', 'desc')
		->findAll();
		$data['data'] = $dataClient;
		return view('layer/shared/head') .
			view('layer/admin/reservacion/index', $data)
			. view('layer/shared/footer');
	}

	public function registrar()
	{
		helper(['form']);
		if ($this->request->getPost()) {
			$userModel = new ReservacionModel();
			$data = [
				'id_cliente'     => $this->request->getVar('id_cliente'),
				'id_horario'     => $this->request->getVar('id_horario'),
				'estado'     => 2,
			];
			$userModel->save($data);
			return redirect()->to('/reservacion');
		} else {
			$clientMOdel = new ClientModel();
			$dataClients = $clientMOdel->findAll();
			$userModel = new HorarioModel();
			$dataClient = $userModel->select('clase.nombre as nombre, horario.hora_fin, horario.hora_inicio, horario.id_horario, horario.descripcion')
			->join('clase', 'clase.id_clase = horario.id_clase')
			->findAll();
			$data['data'] = $dataClient;
			$data['dataClients'] = $dataClients;
			$data['validation'] = $this->validator;
			return view('layer/shared/head')
				. view('layer/admin/reservacion/registrar', $data)
				. view('layer/shared/footer');
		}
	}

	public function editar($idReservacion)
	{
		$reservacionModel = new ReservacionModel();
		helper(['form']);
		$dataReservacion = $reservacionModel->where('id_reservacion', $idReservacion)->first();
		if (!$this->request->getPost()) {
			$clientMOdel = new ClientModel();
			$dataClients = $clientMOdel->findAll();
			$horarioModel = new HorarioModel();
			$dataHorario = $horarioModel->select('clase.nombre as nombre, horario.hora_fin, horario.hora_inicio, horario.id_horario')
			->join('clase', 'clase.id_clase = horario.id_clase')
			->findAll();
			$data['dataClients'] = $dataClients;
			$data['data'] = $dataReservacion;
			$data['horarios'] = $dataHorario;
			return view('layer/shared/head') .
				view('layer/admin/reservacion/editar', $data)
				. view('layer/shared/footer');
		}
		$dataUpdate = [
			'id_cliente'     => $this->request->getVar('id_cliente'),
			'id_horario'     => $this->request->getVar('id_horario'),
		];
		$reservacionModel->where('id_reservacion', $idReservacion)
			->set($dataUpdate)
			->update();
		return redirect()->to('/reservacion');
	}

	public function borrar($id_cliente)
	{
		try{
			$userModel = new ReservacionModel();
		$userModel->where('id_reservacion', $id_cliente)
			->delete();
		return redirect()->to('/reservacion');
		}catch(Exception){
			return redirect()->to('/reservacion');
		}
	}

	public function activar($id_cliente)
	{
		$userModel = new ReservacionModel();
		
		$dataUpdate = [
			'estado'     => 1,
		];
		$userModel->where('id_reservacion', $id_cliente)
			->set($dataUpdate)
			->update();
		return redirect()->to('/reservacion');
	}
}
