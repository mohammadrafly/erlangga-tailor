<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CollectionModel;
use App\Models\OrderModel;

class CollectionController extends BaseController
{
    public function displayCollection()
    {
        $model = new CollectionModel();

        $data = [
            'content' => $model->findAll(),
        ];
        return view('pages/home/collection',$data);
    }

    public function displayPromo()
    {
        return view('pages/home/promo');
    }

    public function add()
    {
        $modelOrder = new OrderModel();
        $newOrderCount = $modelOrder->where('status_track', 'new')->countAllResults();
        $hasNewData = ($newOrderCount > 0);
        $data = [
            'title' => 'Tambah Collections',
            'content' => '',
            'hasNewData' => $hasNewData,
        ];
        return view('pages/dashboard/addCollection', $data);
    }

    public function index()
    {
        $model = new CollectionModel();
        if ($this->request->getMethod(true) !== 'POST') {
            $modelOrder = new OrderModel();
            $newOrderCount = $modelOrder->where('status_track', 'new')->countAllResults();
            $hasNewData = ($newOrderCount > 0);
            $data = [
                'content' => $model->findAll(),
                'title' => 'Data Collections',
                'hasNewData' => $hasNewData,
            ];
            return view('pages/dashboard/collectionDashboard',$data);
        }

        $img = $this->request->getFile('img');

        if ($img->isValid() && !$img->hasMoved()) {
            $imgNew = $img->getRandomName();
            $img->move('./uploads/foto/pola/', $imgNew);

            $data = [
                'kategori' => $this->request->getVar('kategori'),
                'product' => $this->request->getVar('product'),
                'harga' => $this->request->getVar('harga'),
                'estimasi' => $this->request->getVar('estimasi'),
                'img' => $imgNew,
            ];

            $model->insert($data);
            return redirect()->to('dashboard/collections')->with('success', 'Berhasil simpan collection');
        }
    }

    public function update($id)
    {
        $model = new CollectionModel();
        if ($this->request->getMethod(true) !== 'POST') {
            $modelOrder = new OrderModel();
            $newOrderCount = $modelOrder->where('status_track', 'new')->countAllResults();
            $hasNewData = ($newOrderCount > 0);
            $data = [
                'content' => $model->find($id),
                'title' => 'Update Collection',
                'hasNewData' => $hasNewData,
            ];
            return view('pages/dashboard/addCollection', $data);
        }

        $img = $this->request->getFile('img');

        if ($img->isValid() && !$img->hasMoved()) {
            $imgNew = $img->getRandomName();
            $img->move('./uploads/foto/pola/', $imgNew);

            $data = [
                'kategori' => $this->request->getVar('kategori'),
                'product' => $this->request->getVar('product'),
                'harga' => $this->request->getVar('harga'),
                'estimasi' => $this->request->getVar('estimasi'),
                'img' => $imgNew,
            ];

            $model->update($id,$data);
            return redirect()->to('dashboard/collections')->with('success', 'Berhasil simpan collection');
        } else {
            $data = [
                'kategori' => $this->request->getVar('kategori'),
                'product' => $this->request->getVar('product'),
                'harga' => $this->request->getVar('harga'),
                'estimasi' => $this->request->getVar('estimasi'),
            ];

            $model->update($id,$data);
            return redirect()->to('dashboard/collections')->with('success', 'Berhasil simpan collection');
        }
    }

    public function delete($id)
    {
        $model = new CollectionModel();
        $model->where('id', $id)->delete($id);
        return redirect()->to('dashboard/collections')->with('success', 'Berhasil hapus collection');
    }
}
