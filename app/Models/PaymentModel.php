<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table = 'payment';

    protected $allowedFields = [
        "id_payment",
        "id_client",
        "amount",
        "detail",
        "created_at",
        "id_horario",
    ];
}
