<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ResetPasswordToken as ModelsResetPasswordToken;
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
                'text' => 'Password Salah.'
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

    private function generateRandomToken($length = 16)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()';
        $token = '';
        $charactersLength = strlen($characters);
        
        for ($i = 0; $i < $length; $i++) {
            $token .= $characters[rand(0, $charactersLength - 1)];
        }
        
        return $token;
    }

    public function forgotPassword()
    {
        $model = new UserModel();
        $modelToken = new ModelsResetPasswordToken();
        if ($this->request->getMethod(true) === 'POST') {
            $email = $this->request->getVar('email');
            
            $checkPoint = $model->where('email', $email)->first();
            
            $tokenCheckpoint = $modelToken->where('email', $email)->first();

            if (!$checkPoint) {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Error!',
                    'text' => 'Email invalid!'
                ]);
            }

            if ($tokenCheckpoint) {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Error!',
                    'text' => 'Anda sudah melakukan permintaan! silahkan periksa email anda.'
                ]);
            }

            $token = $this->generateRandomToken(16);
            $exp = date('Y-m-d H:i:s', strtotime('+24 hours'));

            $data = [
                'email' => $email,
                'token' => $token,
                'exp'   => $exp
            ];

            if ($modelToken->insert($data)) {
                $data['get'] = [
                    'email' => $email,
                    'nama'  => $checkPoint['name'],
                    'username'=> $checkPoint['username'],
                    'exp' => $exp,
                    'token' => $token
                ];
                $to = $email;
                $subject = 'Reset Password';
                $message = view('email/authResetPassword.php', $data);
                    
                $email = \Config\Services::email();
            
                $email->setMailType('html');
                $email->setTo($to);
                $email->setFrom('erlanggatailor@gmail.com', 'ERLANGGA TAILOR');
                $email->setSubject($subject);
                $email->setMessage($message);
                $email->setNewLine("\r\n");
            
                if ($email->send("X-Priority: 1 (Highest)\n")) {
                    return $this->response->setJSON([
                        'status' => true,
                        'icon' => 'success',
                        'title' => 'Permintaan Berhasil!',
                        'text' => 'Silahkan cek email anda.',
                    ]); 
                } else {
                    $data = $email->printDebugger(['headers']);
                    return $this->response->setJSON([
                        'status' => false,
                        'icon' => 'error',
                        'title' => 'Permintaan Gagal!',
                        'text' => $data,
                    ]); 
                }
            }
        }

        return view('pages/auth/ForgotPassword');
    }

    public function resetPassword($email, $token)
    {
        $model = new ModelsResetPasswordToken();
        $modelUser = new UserModel();

        $isEmailExist = $model->where('email', $email)->first();
        
        if ($this->request->getMethod(true) !== 'POST') {
            if (!$isEmailExist) {
                return redirect()->to('auth/sign-in')->with('error', 'Email doesnt match with any record in database.');
            }
    
            if ($isEmailExist['token'] !== $token) {
                return redirect()->to('auth/sign-in')->with('error', 'Token doesnt match with any record in database.');
            }
            
            
            if ($isEmailExist['exp'] < date('Y-m-d H:i:s')) {
                return redirect()->to('auth/sign-in')->with('error', 'Token is already expired! make another request.');
            }

            return view('pages/auth/ResetPassword');
        }
        
        $dataUser = $modelUser->where('email', $email)->first();
        $id = $dataUser['id'];

        $data = [
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($modelUser->update($id, $data)) {

            $idToken = $isEmailExist['id'];
            
            $model->where('id', $idToken)->delete($idToken);

            return $this->response->setJSON([
                'status' => true,
                'icon' => 'success',
                'title' => 'Success!',
                'text' => 'Berhasil memperbarui password',
            ]);
        }
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
