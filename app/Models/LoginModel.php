<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'usuario';

    protected $allowedFields = [
        'nombres',
        'apellidos',
        'usuario',
        'clave',
        'estado',
        'type_user',
        'created_at'
    ];
}
