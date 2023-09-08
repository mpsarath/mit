<?php

namespace App\Models;

use CodeIgniter\Model;

class QualificationModel extends Model
{
    protected $table="qualification";
    protected $primaryKey ="Id";
    protected $allowedFields =['Id','QName','EmployeeId'];
    
}