<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UsersController extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        if ($this->request->getMethod(true) !== 'POST' && !$this->request->isAJAX()) {
            $data = [
                'content' => $model->findAll(),
                'title' => 'Data User',
            ];
            return view('pages/dashboard/usersDashboard', $data);
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'name' => $this->request->getPost('name'),
            'role' => $this->request->getPost('role'),
        ];

        if ($model->where('username', $data['username'])->first()) {
            return $this->response->setJSON([
                'status' => false,
                'icon' => 'error',
                'title' => 'Error!',
                'text' => 'Username sudah terdaftar'
            ]);
        }

        if ($model->where('email', $data['email'])->first()) {
            return $this->response->setJSON([
                'status' => false,
                'icon' => 'error',
                'title' => 'Error!',
                'text' => 'Email sudah terdaftar'
            ]);
        }

        $model->save($data);
        return $this->response->setJSON([
            'status' => TRUE,
            'icon' => 'success',
            'title' => 'Success',
            'text' => 'User telah dibuat.',
        ]);
    }

    public function update($id = null) 
    {
        $model = new UserModel();
        if ($this->request->getMethod(true) !== 'POST') {
            return $this->response->setJSON([
                'data' => $model->where('id', $id)->first(),
                'status' => true
            ]);
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'role' => $this->request->getPost('role'),
        ];

        $model->update($id, $data);
        return $this->response->setJSON([
            'status' => TRUE,
            'icon' => 'success',
            'title' => 'Success',
            'text' => 'User telah diupdate.',
        ]);
    }

    public function delete($id = null)
    {
        $model = new UserModel();
        $model->where('id', $id)->delete($id);
        return $this->response->setJSON([
            'status' => TRUE,
            'icon' => 'success',
            'title' => 'Success',
            'text' => 'User telah dihapus'
        ]);
    }
}
