<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    private function setSession($data)
    {
        return session()->set([
            'isLoggedIn' => TRUE,
            'id' => $data[0]['id'],
            'name' => $data[0]['name'],
            'email' => $data[0]['email'],
            'username' => $data[0]['username'],
            'role' => $data[0]['role'],
        ]);
    }

    public function signIn()
    {
        $model = new UserModel();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        if ($this->request->getMethod(true) !== 'POST') {
            return view('pages/auth/SignIn');
        }

        $usernameOrEmail = $model->like('username', $username)
                                 ->orLike('email', $username)
                                 ->get()->getResultArray();
        if (!$usernameOrEmail) {
            return $this->response->setJSON([
                'status' => false,
                'icon' => 'error',
                'title' => 'Error!',
                'text' => 'Email tidak ada di database.'
            ]);
        }

        if (password_verify($password, $usernameOrEmail[0]['password'])) {
            $this->setSession($usernameOrEmail);
            return $this->response->setJSON([
                'status' => true,
                'icon' => 'success',
                'title' => 'Success!',
                'text' => 'Sign in berhasil.',
                'role' => $usernameOrEmail[0]['role']
            ]);
        } else {
            return $this->response->setJSON([
                'status' => false,
                'icon' => 'error',
                'title' => 'Failed!',
                'text' => 'Sign in gagal.'
            ]);
        }
    }
    
    public function signUp()
    {
        $model = new UserModel();
        
        if ($this->request->getMethod(true) !== 'POST') {
            return view('pages/auth/SignUp');
        }

        $data = $this->request->getPost([
            'username',
            'name',
            'email',
            'password',
            'nomor_hp',
            'alamat',
        ]);
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        
        if ($model->where('email', $data['email'])->first()) {
            return $this->response->setJSON([
                'status' => false,
                'icon' => 'error',
                'title' => 'Error!',
                'text' => 'Email sudah terdaftar'
            ]);
        }
        $register = $model->insert($data);
        $response = [
            'status' => $register ? true : false,
            'icon' => $register ? 'success' : 'error',
            'title' => $register ? 'Success!' : 'Error!', 
            'text' => $register ? 'Berhasil daftar' : 'Gagal daftar',
        ];
        
        return $this->response->setJSON($response);
    }

    public function signOut()
    {
        session()->destroy();
        return $this->response->setJSON([
            'status' => true,
            'icon' => 'success',
            'title' => 'Success!',
            'text' => 'Logout berhasil.'
        ]);
    }
    
}
