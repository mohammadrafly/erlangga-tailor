<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UsersController extends BaseController
{
    public function myProfile() 
    {
        $model = new UserModel();

        $dataUser = $model->where('username', session()->get('username'))->first();
        if ($this->request->getMethod(true) !== 'POST') {
            $data = [
                'content' => $dataUser
            ];
            return view('pages/home/profile', $data);
        }

        $data = [
            'name' => $this->request->getVar('name'),
            'nomor_hp' => $this->request->getVar('nomor_hp'),
            'alamat' => $this->request->getVar('alamat'),
        ];

        $id = $dataUser['id'];
        if (!$model->update($id, $data)) {
            return $this->response->setJSON([
                'status' => false,
                'icon' => 'error',
                'title' => 'Error!',
                'text' => 'Gagal update profile'
            ]);   
        }

        return $this->response->setJSON([
            'status' => true,
            'icon' => 'success',
            'title' => 'Success!',
            'text' => 'Berhasil update profile'
        ]); 
    }

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
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'name' => $this->request->getVar('name'),
            'role' => $this->request->getVar('role'),
            'alamat' => $this->request->getVar('alamat'),
            'nomor_hp' => $this->request->getVar('nomor_hp'),
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
            'name' => $this->request->getVar('name'),
            'role' => $this->request->getVar('role'),
            'alamat' => $this->request->getVar('alamat'),
            'nomor_hp' => $this->request->getVar('nomor_hp'),
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
