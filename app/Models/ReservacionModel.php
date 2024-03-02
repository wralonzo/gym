<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservacionModel extends Model
{
    protected $table = 'reservacion';

    protected $allowedFields = [
        'id_reservacion',
        'id_cliente',
        'fecha_reservacion',
        'created_at',
        'id_horario',
        'estado',
    ];
}
