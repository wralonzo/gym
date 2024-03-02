<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientAsistenciaModel extends Model
{
    protected $table = 'asistencia';

    protected $allowedFields = [
        'id_asistencia',
        'id_cliente',
        'id_horario',
        'created_at',
    ];
}
