<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {

    }
    
    public function register()
    {
        $model = new UserModel();
        
        if ($this->request->getMethod(true) !== 'POST') {
            return view('pages/auth/SignUp');
        }

        $data = $this->request->getPost([
            'name',
            'email',
            'password',
        ]);
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        
        if ($model->where('email', $data['email'])->first()) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Email sudah terdaftar'
            ]);
        }
        $register = $model->insert($data);
        $response = [
            'status' => $register ? 'success' : 'error',
            'message' => $register ? 'Berhasil daftar' : 'Gagal daftar',
        ];
        
        return $this->response->setJSON($response);
    }
}
