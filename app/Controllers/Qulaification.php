<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Models\DistrictModel;
use App\Models\DesignationModel;
use App\Models\QualificationModel;

class Qulaification extends BaseController {

    public function index() {
        
    }

    public function add($Id=null) {
        helper('form');
        $data = array();
        $district=new DistrictModel();
        $data['district_list']=$district->findAll();
        $data['Id']=$Id;
        $designation=new DesignationModel();
        $data['dlist']=$designation->findAll();
        //check form is submit as post
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'QName' => ['label' => 'Name', 'rules' => 'required'],
                
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $q=new QualificationModel();
                $q->save([
                    'QName'=>$this->request->getPost('QName'),
                    'EmployeeId'=>$this->request->getPost('EmployeeId'),
                                       
                ]);
                $data['msg'] = "Qualification Saved...!";
              
            }
        }

        echo view('sys/header');
        echo view('sys/menu');
        echo view('sys/qualification/add', $data);
        echo view('sys/footer');
    }

    public function view() {
        helper('form');
        $employee=new EmployeeModel();
        
        if ($this->request->getMethod() == 'post') {
            $data['list']=$employee->where('District',)->findAll();
        }else{
            $data['list']=$employee->findAll();
        }
          
        echo view('sys/header');
        echo view('sys/menu');
        echo view('sys/employee/view',$data);
        echo view('sys/footer');
    }

    public function edit() {
        echo view('sys/header');
        echo view('sys/menu');
        echo view('sys/employee/edit');
        echo view('sys/footer');
    }

}
