<?php

namespace App\Controllers;

use App\Models\CollectionModel;
use App\Models\OrderModel;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new CollectionModel();
        $json_file_path = WRITEPATH . 'data-toko.json';
        $json_data = $this->read_file($json_file_path);

        $data = [
            'content' => $model->findAll(),
            'toko' => json_decode($json_data, true),
        ];
        return view('welcome_message', $data);
    }

    public function login()
    {
        return view('pages/auth/SignIn');
    }

    public function register()
    {
        return view('pages/auth/SignUp');
    }

    public function dashboard()
    {
        $modelUser = new UserModel();
        $modelOrder = new OrderModel();
        $modelCollection = new CollectionModel();

        $newOrderCount = $modelOrder->where('status_track', 'new')->countAllResults();
        $hasNewData = ($newOrderCount > 0);

        $data = [
            'hasNewData' => $hasNewData,
            'title' => 'Dashboard',
            'total_user' => $modelUser->countAllResults(),
            'total_order' => $modelOrder->countAllResults(),
            'total_collection' => $modelCollection->countAllResults(),
            'total_order_selesai' => $modelOrder->where('status_track', 'selesai')->countAllResults(),
        ];
        return view('pages/dashboard/index',$data);
    }

    private function read_file($file_path) {
        $file_contents = file_get_contents($file_path);
        return $file_contents;
    }
    
    public function setting()
    {
        $json_file_path = WRITEPATH . 'data-toko.json';
    
        if ($this->request->getMethod(true) === 'POST') {
            $data = [
                'nomor_wa' => $this->request->getVar('nomor_wa'),
                'nama_pemilik' => $this->request->getVar('nama_pemilik'),
                'alamat' => $this->request->getVar('alamat'),
                'embed_link' => $this->request->getVar('embed_link'),
            ];
    
            $json_data = json_encode($data);
    
            if (!file_put_contents($json_file_path,$json_data)) {
                return redirect()->to('dashboard/setting')->with('error', 'Gagal menyimpan data toko');
            }
    
            return redirect()->to('dashboard/setting')->with('success', 'Profile toko berhasil diperbarui');
        }
    
        if (!is_file($json_file_path)) {
            return view('pages/dashboard/profile');
        }
    
        $json_data = $this->read_file($json_file_path);
    
        $data = [
            'content' => json_decode($json_data, true),
            'title' => 'Setting'
        ];
        if (!$data) {
            return view('pages/dashboard/profile');
        }
        $modelOrder = new OrderModel();
        $newOrderCount = $modelOrder->where('status_track', 'new')->countAllResults();
        $hasNewData = ($newOrderCount > 0);
        $data['hasNewData'] = $hasNewData;
        return view('pages/dashboard/profile', $data);
    }
}
