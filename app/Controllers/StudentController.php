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

    public function store()
    {
        $model = new StudentModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];

        $model->insert($data);
        return redirect()->to('register')->with('success', 'Student registered successfully!');
    }



    public function loginIndex()
    {
        return view('login');
    }

    public function login()
    {
        $model = new StudentModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $student = $model->where('email', $email)->first();

        if ($student && password_verify($password, $student['password'])) {

            // set session 
            // this also work 
            // session()->set('student_id', $student['id']);
            // session()->set('student_name', $student['name']);

            // in array
            session()->set([
                'student_id'   => $student['id'],
                'student_name' => $student['name'],
                'isLoggedIn'   => true, // 👈 required for Auth filter
            ]);

            return redirect()->to('/')->with('success', 'welcome to dashboard');
        } else {
            return redirect()->to('/')->with('error', 'invalid email or password');
        }
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout()
    {
        // session()->destroy();
        // return redirect()->to('/')->with('success', 'You have been logged out successfully.');
        session()->destroy();
        return redirect()->to(base_url('/'))->with('success', 'You have been logged out successfully.');
    }
}
