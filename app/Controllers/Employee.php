<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Models\DistrictModel;
use App\Models\DesignationModel;
use App\Models\DsModel;
class Employee extends BaseController {

    public function index() {
        
    }

    public function add() {
        helper('form');
        $data = array();
        $district=new DistrictModel();
        $data['district_list']=$district->findAll();
        
        $designation=new DesignationModel();
        $data['dlist']=$designation->findAll();
        //check form is submit as post
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'FirstName' => ['label' => 'First Name', 'rules' => 'required'],
                'LastName' => ['label' => 'Last Name', 'rules' => 'required'],
                'Email' => ['label' => 'Email', 'rules' => 'required'],
                'TelNo' => ['label' => 'Tel. No.', 'rules' => 'required|min_length[10]']
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $employee=new EmployeeModel();
                $employee->save([
                    'FirstName'=>$this->request->getPost('FirstName'),
                    'LastName'=>$this->request->getPost('LastName'),
                    'Address'=>$this->request->getPost('Address'),
                    'Email'=>$this->request->getPost('Email'),
                    'TelNo'=>$this->request->getPost('TelNo'),
                    'DOB'=>$this->request->getPost('DOB'),
                    'District'=>$this->request->getPost('District'),
                    'Gender'=>$this->request->getPost('gender'), 
                ]);
                $data['msg'] = "Employee Saved...!";
              
            }
        }

        echo view('sys/header');
        echo view('sys/menu');
        echo view('sys/employee/add', $data);
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
    public function getdata() {
        echo 'Yes';
    }
    
    public function getdsdivision(){
        $ds=new DsModel();
        $DistrictId=$this->request->getPost('DistrictId');
       $data['list']=$ds->where('DistrictId',$DistrictId)->findAll();
       
       return view('sys/employee/dsdivision',$data);
    }

}
