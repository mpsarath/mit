<?php

namespace App\Models;

use CodeIgniter\Model;

class DesignationModel extends Model
{
    protected $table="designation";
    protected $primaryKey ="Id";
    protected $allowedFields =['Id','Designation'];
    
}