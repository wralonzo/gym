<?php

namespace App\Controllers;

use App\Models\ClaseModel;
use App\Models\DiasHorario;
use App\Models\HorarioModel;

class Horario extends BaseController
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
		$dataClient = $this->db->table("horario as hr")
			->select('clas.nombre, hr.descripcion, hr.hora_inicio, hr.hora_fin, hr.id_horario',)
			->join('clase as clas', 'clas.id_clase = hr.id_clase')
			->get()->getResultArray();
		$data['data'] = $dataClient;
		return view('layer/shared/head') .
			view('layer/admin/horario/index', $data)
			. view('layer/shared/footer');
	}

	public function registrar()
	{
		helper(['form']);
		if ($this->request->getPost()) {
			$horario = new HorarioModel();
			$diasHorario = new DiasHorario();
			$data = [
				'id_user'     => $this->request->getVar('id_user'),
				'id_clase'     => $this->request->getVar('id_clase'),
				'hora_inicio'     => $this->request->getVar('hora_inicio'),
				'hora_fin'     => $this->request->getVar('hora_fin'),
				'descripcion'     => $this->request->getVar('descripcion'),
			];
			$horario->save($data);
			$idHorario = $horario->getInsertID();
			foreach ($this->request->getVar('dias') as $dia) {
				$dataHorario = [
					'id_horario'     => $idHorario,
					'id_dia'     => $dia,
				];
				$diasHorario->save($dataHorario);
			}
			return redirect()->to('/horario');
		} else {
			$dias = $this->db->table("dias")->get()->getResultArray();
			$usuarios = $this->db->table("usuario")->select('id, nombres as nombre, apellidos')->where('type_user', 'vendor')->get()->getResultArray();
			$clases = $this->db->table("clase")->select('id_clase as id, nombre')->get()->getResultArray();
			$data['validation'] = $this->validator;
			$data['dias'] = $dias;
			$data['usuarios'] = $usuarios;
			$data['clases'] = $clases;
			return view('layer/shared/head')
				. view('layer/admin/horario/registrar', $data)
				. view('layer/shared/footer');
		}
	}

	public function editar($id_cliente)
	{
		$userModel = new ClaseModel();

		helper(['form']);
		$dataClient = $userModel->where('id_horario', $id_cliente)->first();
		if (!$this->request->getPost()) {
			$data['data'] = $dataClient;
			return view('layer/shared/head') .
				view('layer/admin/horario/editar', $data)
				. view('layer/shared/footer');
		}
		$dataUpdate = [
			'nombre'     => $this->request->getVar('nombre'),
			'descripcion'     => $this->request->getVar('descripcion'),
		];
		$userModel->where('id_horario', $id_cliente)
			->set($dataUpdate)
			->update();
		return redirect()->to('/horario');
	}

	public function borrar($id_cliente)
	{
		$userModel = new ClaseModel();
		$userModel->where('id_horario', $id_cliente)
			->delete();
		return redirect()->to('/horario');
	}
}
