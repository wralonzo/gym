<?php

namespace App\Controllers;

use App\Models\ClientAsistenciaModel;
use App\Models\ClientModel;
use App\Models\HorarioModel;
use App\Models\MembresiaModel;

class Client extends BaseController
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
		$dataClient = $this->db->table("cliente as cli")
		->join('membresia mem', 'mem.id_membresia = cli.id_membresia', 'left')
		->get()->getResultArray();

		$data['data'] = $dataClient;

		$membresia = new MembresiaModel();
		$data['membresia'] = $membresia;
		return view('layer/shared/head') .
			view('layer/admin/cliente/index', $data)
			. view('layer/shared/footer');
	}

	public function registrar()
	{
		helper(['form']);
		

		if ($this->request->getPost()) {
			$userModel = new ClientModel();
			$data = [
				'nombres'     => $this->request->getVar('nombres'),
				'apellidos'     => $this->request->getVar('apellidos'),
				'correo'     => $this->request->getVar('correo'),
				'direccion'     => $this->request->getVar('direccion'),
				'telefono' => $this->request->getVar('telefono'),
				'id_membresia' => $this->request->getVar('id_membresia'),
			];
			$userModel->save($data);
			return redirect()->to('/client');
		} else {
			$membresia = new MembresiaModel();

			$dataSend = $membresia->findAll();
			$data['data'] = $dataSend;
			return view('layer/shared/head')
				. view('layer/admin/cliente/registrar', $data)
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
		$membresia = new MembresiaModel();

		helper(['form']);
		$dataClient = $userModel->where('estado', 1)->where('id_cliente', $id_cliente)->first();
		if (!$this->request->getPost()) {
			$data['data'] = $dataClient;
			$dataSend = $membresia->findAll();
			$data['dataSend'] = $dataSend;
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
			'id_membresia' => $this->request->getVar('id_membresia'),
		];
		$userModel->where('id_cliente', $id_cliente)
			->set($dataUpdate)
			->update();
		return redirect()->to('/client');
	}

	public function clases($idCliente)
	{
		try {
			$dataClient = $this->db->table("reservacion as r")
				->select('r.created_at, hr.id_horario, hr.hora_inicio, hr.hora_fin, clas.nombre, cli.nombres, cli.apellidos')
				->join('horario as hr', 'hr.id_horario = r.id_horario')
				->join('clase as clas', 'clas.id_clase = hr.id_clase')
				->join('cliente as cli', 'r.id_cliente = cli.id_cliente')
				->where('r.id_cliente', $idCliente)
				->where('r.estado', 1)
				->get()->getResultArray();
			$data['data'] = $dataClient;
			$data['idClient'] = $idCliente;
			return view('layer/shared/head') .
				view('layer/admin/cliente/clases', $data)
				. view('layer/shared/footer');
		} catch (Exception $e) {
			redirect()->to('/client');
		}
	}

	public function asistenciaclase($idHorario, $idCliente)
	{
		try {
			$dataClient = $this->db->table("asistencia as as")
				->select('as.created_at, hr.id_horario, hr.hora_inicio, hr.hora_fin, clas.nombre, cli.nombres, cli.apellidos')
				->join('horario as hr', 'as.id_horario = hr.id_horario')
				->join('clase as clas', 'clas.id_clase = hr.id_clase')
				->join('cliente as cli', 'as.id_cliente = cli.id_cliente')
				->where('as.id_horario', $idHorario)
				->where('as.id_cliente', $idCliente)
				->get()->getResultArray();
			$data['data'] = $dataClient;
			$data['idHorario'] = $idHorario;
			$data['idCliente'] = $idCliente;
			return view('layer/shared/head') .
				view('layer/admin/cliente/asistencias', $data)
				. view('layer/shared/footer');
		} catch (Exception $e) {
			redirect()->to('/client');
		}
	}

	public function pdf($idHorario, $idCliente)
	{
		try {
			$dataClient = $this->db->table("asistencia as as")
				->select('as.created_at, hr.id_horario, hr.hora_inicio, hr.hora_fin, clas.nombre, cli.nombres, cli.apellidos')
				->join('horario as hr', 'as.id_horario = hr.id_horario')
				->join('clase as clas', 'clas.id_clase = hr.id_clase')
				->join('cliente as cli', 'as.id_cliente = cli.id_cliente')
				->where('as.id_horario', $idHorario)
				->where('as.id_cliente', $idCliente)
				->get()->getResultArray();
			$data['data'] = $dataClient;
			return 
				view('layer/admin/cliente/pdf', $data);
		} catch (Exception $e) {
			redirect()->to('/client');
		}
	}
}
