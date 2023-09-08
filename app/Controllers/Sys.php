<?php

namespace App\Controllers;

class Sys extends BaseController
{
    public function index()
    {
        echo view('sys/login');
       
    }
    public function dashboard()
    {
        echo view('sys/header');
        echo view('sys/menu');
        echo view('sys/content');
        echo view('sys/footer');
       
    }
    
}
