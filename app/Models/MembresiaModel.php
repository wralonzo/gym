<?php

namespace App\Models;

use CodeIgniter\Model;

class MembresiaModel extends Model
{
    protected $table = 'membresia';

    protected $allowedFields = [
        'id_membresia',
        'precio',
        'descripcion'
    ];
}
