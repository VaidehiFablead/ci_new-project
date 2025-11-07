<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StdModel;
use CodeIgniter\HTTP\ResponseInterface;

class StdController extends BaseController
{
    public function index()
    {
        return view('std_view');
    }

    public function index_view()
    {
        return view('std_indexview');
    }

    // Fetch all records
    public function fetchAll()
    {
        $model = new StdModel();
        $data = $model->findAll();
        return json_encode($data);
    }

    // // Store new record
    public function store()
    {

        $validation = \config\Services::validation();

        $rules = [
            'name' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|valid_email|is_unique[std.email]',
            'phone' => 'required|numeric|min_length[10]|max_length[10]',

        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $validation->getErrors()
            ]);
        }

        $model = new StdModel();
        $data = [
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'phone'   => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'gender'  => $this->request->getPost('gender'),
        ];

        $model->insert($data);
        return json_encode(['status' => 'success']);
    }

    // // Delete record
    // public function delete($id)
    // {
    //     $model = new StdModel();
    //     $model->delete($id);
    //     return $this->response->setJSON(['status' => 'deleted']);
    // }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $model = new StdModel();
        $model->delete($id);
        return $this->response->setJSON(['status' => 'deleted']);
    }
}
