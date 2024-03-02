<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $table = 'cliente';

    protected $allowedFields = [
        'nombres',
        'apellidos',
        'correo',
        'direccion',        
        'telefono',
        'estado',
        'created_at'
    ];
}
