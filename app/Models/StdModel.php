<?php

namespace App\Models;

use CodeIgniter\Model;

class StdModel extends Model
{
    protected $table            = 'std';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['name', 'email', 'phone', 'address', 'gender'];
    protected $useTimestamps = true;
}
