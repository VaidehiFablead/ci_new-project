<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StudentModel;
use CodeIgniter\HTTP\ResponseInterface;

class StudentController extends BaseController
{
    public function index()
    {
        return view('form');
    }

    public function store(){
       $model=new StudentModel();

       $data=[
        'name'=> $this->request->getPost('name'),
        'email'=>$this->request->getPost('email'),
        'password'=>password_hash($this->request->getPost('password'),PASSWORD_DEFAULT)
       ];

       $model->insert($data);
        return redirect()->to('/')->with('success', 'Student registered successfully!');
    }
}
