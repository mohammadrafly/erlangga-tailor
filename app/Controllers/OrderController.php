<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\Order;
use App\Models\OrderModel;
use App\Models\UserModel;

class OrderController extends BaseController
{
    //for admin only
    public function index()
    {
        $model = new OrderModel();

        //if method not POST then displaying pages
        if ($this->request->getMethod(true) !== 'POST') {
            //array of data for content
            $data = [
                'content' => $model->relationOrderAndUser(),
                'title' => 'Data Orders'
            ];
            //returning view from Folder Views/pages/dashboard
            return view('pages/dashboard/orderDashboard', $data);
        }
        
        //taking raw input from ajax request
        $data = $this->request->getRawInput();
        //decoding json input/raw input
        $data = json_decode(file_get_contents('php://input'), true);

        //if failed inserting data
        if (!$model->insert($data)) {
            return $this->response->setJSON([
                'status' => false,
                'icon' => 'error',
                'title' => 'Error!',
                'text' => 'Gagal tambah order',
            ]);
        }

        //else insert data success
        return $this->response->setJSON([
            'status' => true,
            'icon' => 'success',
            'title' => 'Success!',
            'text' => 'Berhasil tambah order',
        ]);
    }

    public function update($id = null)
    {
        $model = new OrderModel();
        if ($this->request->getMethod(true) !== 'POST') {
            //returning json response for ajax updating
            return $this->response->setJSON($model->find($id));
        }

        $data = $this->request->getRawInput();
        $data = json_decode(file_get_contents('php://input'), true);

        if (!$model->update($id, $data)) {
            return $this->response->setJSON([
                'status' => false,
                'icon' => 'error',
                'title' => 'Error!',
                'text' => 'Gagal melakukan update',
            ]);
        }

        return $this->response->setJSON([
            'status' => true,
            'icon' => 'success',
            'title' => 'Success!',
            'text' => 'Berhasil melakukan update',
        ]);
    }

    public function delete($id = null)
    {
        $model = new OrderModel();
        $model->where('id', $id)->delete($id);
        return $this->response->setJSON([
            'status' => true,
            'icon' => 'success',
            'title' => 'Success!',
            'text' => 'Berhasil melakukan delete'
        ]);
    }

    public function tanpaDesainBayar($id)
    {
        $model = new OrderModel();
        if ($this->request->getMethod(true) !== 'POST') {
            $data = [
                'content' => $model->where('id', $id)->first()
            ];
            return view('pages/home/orderBayar', $data);
        }

        $bukti_pembayaran = $this->request->getFile('bukti_pembayaran');

            if ($bukti_pembayaran->isValid() && !$bukti_pembayaran->hasMoved()) {
                $bukti_pembayaranNew = $bukti_pembayaran->getRandomName();
                $bukti_pembayaran->move('./uploads/bukti_pembayaran', $bukti_pembayaranNew);
    
                $data = [
                    'bukti_pembayaran' => $bukti_pembayaranNew,
                    'status_track' => 'lunas'
                ];
    
                $model->update($id,$data);
                return redirect()->to('customer/tanpa-desain')->with('success', 'Berhasil melakukan pembayaran');
            }
    }

    public function tanpaDesain()
    {
        $model = new OrderModel();
        if ($this->request->getMethod(true) !== 'POST') {
            return view('pages/home/orderTanpaDesain');
        }

        $model = new OrderModel();
        $fotoPola = $this->request->getFile('pola_desain');
        $fotoKain = $this->request->getFile('foto_kain');

        if ($fotoKain->isValid() && !$fotoKain->hasMoved() && $fotoPola->isValid() && !$fotoPola->hasMoved()) {
            $fotoPolaNew = $fotoPola->getRandomName();
            $fotoKainNew = $fotoKain->getRandomName();
            $fotoPola->move('./uploads/foto/pola/', $fotoPolaNew);
            $fotoKain->move('./uploads/foto/kain/', $fotoKainNew);

            $data = [
                'pesanan' => 'tanpa_desain',
                'status_track' => 'pending',
                'id_user' => session()->get('id'),
                'kategori' => $this->request->getVar('kategori'),
                'ukuran' => $this->request->getVar('ukuran'),
                'catatan' => $this->request->getVar('catatan'),
                'jumlah' => $this->request->getVar('jumlah'),
                'foto_kain' => $fotoKainNew,
                'pola_desain' => $fotoPolaNew,
            ];

            $model->insert($data);
            return redirect()->to('customer/tanpa-desain')->with('success', 'Berhasil melakukan order');
        }
    }    

    public function myOrder() 
    {
        helper('number');
        $model = new OrderModel();
        $data = [
            'content' => $model->where('id_user', session()->get('id'))->findAll(),
        ];
        return view('pages/home/order', $data);
    }

    public function denganDesain()
    {
        $model = new OrderModel();
        if ($this->request->getMethod(true) !== 'POST') {
            return view('pages/home/orderDenganDesain');
        }

        $data = $this->request->getRawInput();
        $data = json_decode(file_get_contents('php://input'), true);
        $data['pesanan'] = 'dengan_desain';

        if ($model->insert($data)) {
            return $this->response->setJSON([
                'status' => false,
                'icon' => 'error',
                'title' => 'Error!',
                'text' => 'Gagal melakukan order tanpa desain',
            ]);
        }
        
        return $this->response->setJSON([
            'status' => true,
            'icon' => 'success',
            'title' => 'Success!',
            'text' => 'Berhasil melakukan order tanpa desain',
        ]);
    }

    public function perbaikan()
    {
        $model = new OrderModel();
        if ($this->request->getMethod(true) !== 'POST') {
            return view('pages/home/orderPerbaikan');
        }

        $data = $this->request->getRawInput();
        $data = json_decode(file_get_contents('php://input'), true);
        $data['pesanan'] = 'perbaikan';

        if ($model->insert($data)) {
            return $this->response->setJSON([
                'status' => false,
                'icon' => 'error',
                'title' => 'Error!',
                'text' => 'Gagal melakukan order perbaikan',
            ]);
        }
        
        return $this->response->setJSON([
            'status' => true,
            'icon' => 'success',
            'title' => 'Success!',
            'text' => 'Berhasil melakukan order perbaikan',
        ]);
    }
}
