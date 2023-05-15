<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CollectionModel;
use App\Models\OrderModel;

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
    }

    public function update($id = null)
    {
        $model = new OrderModel();
        if ($this->request->getMethod(true) !== 'POST') {
            //returning json response for ajax updating
            return $this->response->setJSON($model->find($id));
        }

        $data = [
            'tanggal_selesai' => $this->request->getVar('tanggal_selesai'),
            'harga' => $this->request->getVar('harga'),
            'status_track' => $this->request->getVar('status_track'),
        ];

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

    private function read_file($file_path) {
        $file_contents = file_get_contents($file_path);
        return $file_contents;
    }

    public function myOrder() 
    {
        helper('number');
        $model = new OrderModel();
        $json_file_path = WRITEPATH . 'data-toko.json';
        $json_data = $this->read_file($json_file_path);
        if ($this->request->getMethod(true) !== 'POST') {
            $data = [
                'content' => $model->where('id_user', session()->get('id'))->findAll(),
                'toko' => json_decode($json_data, true),
            ];
            return view('pages/home/order', $data);
        }

        $id = $this->request->getVar('id[]');

        if (!$id) {
            return redirect()->to('customer/order')->with('error', 'pilih salah satu item untuk di checkout');
        }

        $data = array();
        $kode = $this->generate_code();
        for ($i = 0; $i < count($id); $i++) {
            $data[] = array(
                'id' => $id[$i],
                'kode_pembayaran' => $kode,
                'updated_at' => date('Y-m-d H:i:s')
            );
        }
        $model->updateBatch($data, 'id');
        $dts = [
            'kode_pembayaran' => $kode,
            'toko' => json_decode($json_data, true),
        ];
        return view('pages/partials/successCheckout', $dts);
    }

    function generate_code() {
        $length = 10;
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random_string = '';
        for ($i = 0; $i < $length; $i++) {
            $random_string .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $random_string;
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
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
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

    public function denganDesain()
    {
        $model = new OrderModel();
        $modelCollection = new CollectionModel();
        if ($this->request->getMethod(true) !== 'POST') {
            $data = [
                'items' => $modelCollection->where('kategori', 'clothing')->findAll(),
            ];
            return view('pages/home/orderDenganDesain',$data);
        }

        $fotoKain = $this->request->getFile('foto_kain');

        if ($fotoKain->isValid() && !$fotoKain->hasMoved()) {
            $fotoKainNew = $fotoKain->getRandomName();
            $fotoKain->move('./uploads/foto/kain/', $fotoKainNew);

            $data = [
                'pesanan' => 'dengan_desain',
                'status_track' => 'pending',
                'id_user' => session()->get('id'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                'kategori' => $this->request->getVar('kategori'),
                'ukuran' => $this->request->getVar('ukuran'),
                'catatan' => $this->request->getVar('catatan'),
                'jumlah' => $this->request->getVar('jumlah'),
                'foto_kain' => $fotoKainNew,
                'pola_desain' => $this->request->getVar('pola_desain'),
            ];

            $model->insert($data);
            return redirect()->to('customer/tanpa-desain')->with('success', 'Berhasil melakukan order');
        }
    }

    public function perbaikan()
    {
        $model = new OrderModel();
        if ($this->request->getMethod(true) !== 'POST') {
            return view('pages/home/orderPerbaikan');
        }

        $fotoKain = $this->request->getFile('foto_kain');

        if ($fotoKain->isValid() && !$fotoKain->hasMoved()) {
            $fotoKainNew = $fotoKain->getRandomName();
            $fotoKain->move('./uploads/foto/kain/', $fotoKainNew);

            $data = [
                'pesanan' => 'perbaikan',
                'status_track' => 'pending',
                'id_user' => session()->get('id'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                'kategori' => $this->request->getVar('kategori'),
                'ukuran' => NULL,
                'catatan' => $this->request->getVar('catatan'),
                'jumlah' => $this->request->getVar('jumlah'),
                'foto_kain' => $fotoKainNew,
                'pola_desain' => NULL,
            ];

            $model->insert($data);
            return redirect()->to('customer/tanpa-desain')->with('success', 'Berhasil melakukan order');
        }
    }
}
