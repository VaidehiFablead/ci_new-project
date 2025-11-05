<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpModel extends Model
{
    protected $table='emp';
    protected $primaryKey='id';
    protected $allowedFields=['name','email','password'];
}



