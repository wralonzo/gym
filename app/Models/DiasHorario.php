<?php

namespace App\Models;

use CodeIgniter\Model;

class DiasHorario extends Model
{
    protected $table = 'dias_horario';

    protected $allowedFields = [
        'id_dia_horario',
        'id_horario',
        'id_dia',
    ];
}