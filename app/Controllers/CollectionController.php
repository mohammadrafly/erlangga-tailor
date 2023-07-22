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
            return $this->response->setJSON([
                'status' => TRUE,
                'icon' => 'success',
                'title' => 'Success',
                'text' => 'data telah ditambahkan'
            ]);
        } else {
            $data = [
                'kategori' => $this->request->getVar('kategori'),
                'product' => $this->request->getVar('product'),
                'harga' => $this->request->getVar('harga'),
                'estimasi' => $this->request->getVar('estimasi'),
            ];

            $model->insert($data);
            return $this->response->setJSON([
                'status' => TRUE,
                'icon' => 'success',
                'title' => 'Success',
                'text' => 'data telah ditambahkan'
            ]);
        }
    }

    public function update($id)
    {
        $model = new CollectionModel();
        if ($this->request->getMethod(true) !== 'POST') {
            return $this->response->setJSON([
               'data' => $model->find($id)
            ]);
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
            return $this->response->setJSON([
                'status' => TRUE,
                'icon' => 'success',
                'title' => 'Success',
                'text' => 'berhasil simpan data'
            ]);
        } else {
            $data = [
                'kategori' => $this->request->getVar('kategori'),
                'product' => $this->request->getVar('product'),
                'harga' => $this->request->getVar('harga'),
                'estimasi' => $this->request->getVar('estimasi'),
            ];

            $model->update($id,$data);
            return $this->response->setJSON([
                'status' => TRUE,
                'icon' => 'success',
                'title' => 'Success',
                'text' => 'berhasil simpan data'
            ]);
        }
    }

    public function delete($id)
    {
        $model = new CollectionModel();
        $model->where('id', $id)->delete($id);
        return $this->response->setJSON([
            'status' => TRUE,
            'icon' => 'success',
            'title' => 'Success',
            'text' => 'data telah dihapus'
        ]);
    }
}
