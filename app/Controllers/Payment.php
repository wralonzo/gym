<?php

namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\HorarioModel;
use App\Models\PaymentModel;

class Payment extends BaseController
{
	protected $helpers = ['form'];
	private $db;
	public function __construct()
	{
		// $this->db = db_connect(); // Loading database
		$this->db = \Config\Database::connect();
	}

	public function index()
	{
		$dataClient = $this->db->table("payment as py")
			->select('py.id_payment, py.detail, py.amount, py.created_at, clas.nombre, hr.descripcion, hr.hora_inicio, hr.hora_fin, hr.id_horario, cli.nombres, cli.apellidos',)
			->join('horario as hr', 'hr.id_horario = py.id_horario')
			->join('clase as clas', 'clas.id_clase = hr.id_clase')
			->join('cliente as cli', 'cli.id_cliente = py.id_client')
			->orderBy('py.id_payment', 'desc')
			->get()->getResultArray();

		$data['data'] = $dataClient;
		return view('layer/shared/head') .
			view('layer/admin/payment/index', $data)
			. view('layer/shared/footer');
	}

	public function registrar()
	{
		helper(['form']);
		if ($this->request->getPost()) {
			$userModel = new PaymentModel();
			$userModel->save($this->request->getVar());
			return redirect()->to('/payment');
		} else {
			$clientMOdel = new ClientModel();
			$dataClients = $clientMOdel->findAll();
			$userModel = new HorarioModel();
			$dataHorario = $userModel->select('clase.nombre as nombre, horario.hora_fin, horario.hora_inicio, horario.id_horario, horario.descripcion')
			->join('clase', 'clase.id_clase = horario.id_clase')
			->findAll();
			$data['data'] = $dataHorario;
			$data['dataClients'] = $dataClients;
			return view('layer/shared/head')
				. view('layer/admin/payment/registrar', $data)
				. view('layer/shared/footer');
		}
	}

	public function editar($id_cliente)
	{
		$userModel = new PaymentModel();

		helper(['form']);
		$dataClient = $userModel->where('id_payment', $id_cliente)->first();
		if (!$this->request->getPost()) {
			$data['data'] = $dataClient;
			$clientMOdel = new ClientModel();
			$dataClients = $clientMOdel->findAll();
			$userModel = new HorarioModel();
			$dataHorario = $userModel->select('clase.nombre as nombre, horario.hora_fin, horario.hora_inicio, horario.id_horario, horario.descripcion')
			->join('clase', 'clase.id_clase = horario.id_clase')
			->findAll();
			$data['horarios'] = $dataHorario;
			$data['dataClients'] = $dataClients;
			return view('layer/shared/head') .
				view('layer/admin/payment/editar', $data)
				. view('layer/shared/footer');
		}
		$userModel->where('id_payment', $id_cliente)
			->set($this->request->getVar())
			->update();
		return redirect()->to('/payment');
	}

	public function borrar($id_cliente)
	{
		$userModel = new PaymentModel();
		$userModel->where('id_payment', $id_cliente)
			->delete();
		return redirect()->to('/payment');
	}
}
