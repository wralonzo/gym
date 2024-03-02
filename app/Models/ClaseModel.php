<?php

namespace App\Models;

use CodeIgniter\Model;

class ClaseModel extends Model
{
    protected $table = 'clase';

    protected $allowedFields = [
        'id_clase',
        'nombre',
        'descripcion',
    ];
}
