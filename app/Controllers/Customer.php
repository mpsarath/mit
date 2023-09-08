<?php

namespace App\Controllers;

class Customer extends BaseController {

    public function index(): string {
        
    }

    public function find($id = null, $name = null) {
        $data['heading'] = "Customer List";
        $data['year'] = "2022";
        echo view('header');
        echo view('menu');
        echo view('customer/list', $data);
        echo view('footer');
    }

    public function add() {
        echo base_url();
//        echo view('header');
//        echo view('menu');
//        echo view('customer/add');
//        echo view('footer');
    }

}
