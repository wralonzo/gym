<?php

namespace App\Models;

use CodeIgniter\Model;

class HorarioModel extends Model
{
    protected $table = 'horario';

    protected $allowedFields = [
        'id_horario',
        'id_clase',
        'hora_inicio',
        'hora_fin',
        'created_at',
        'id_user',
        'descripcion',
    ];
}