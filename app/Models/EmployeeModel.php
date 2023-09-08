<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table="employee";
    protected $primaryKey ="Id";
    protected $allowedFields =['Id','FirstName','LastName','Address','Email','TelNo','DOB','District','Gender'];
    
}