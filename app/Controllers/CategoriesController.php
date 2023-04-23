<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriesModel;

class CategoriesController extends BaseController
{
    public function index()
    {
        $model = new CategoriesModel();
        if ($this->request->getMethod(true) !== 'POST') {
            $data = [
                'content' => $model->findAll()
            ];
            return view('pages/dashboard/categoriesDashboard');
        }

        $data = [
            'category_name' => $this->request->getPost('name')
        ];
        $model->insert($data);
        return $this->response->setJSON([
            'status' => true,
            'icon' => 'success',
            'title' => 'Success!',
            'text' => 'Successfully create categories',
        ]);
    }

    public function update($id = null) 
    {
        $model = new CategoriesModel();
        if ($this->request->getMethod(true) !== 'POST') {
            return $this->response->setJSON([
                'data' => $model->where('id', $id)->first(),
            ]);
        }

        $data = [
            'category_name' => $this->request->getPost('name')
        ];

        $model->update($id, $data);
        return $this->response->setJSON([
            'status' => true,
            'icon' => 'success',
            'title' => 'Success!',
            'text' => 'Successfully update categories',
        ]);
    }

    public function delete($id = null)
    {
        $model = new CategoriesModel();
        $model->where('id', $id)->delete($id);
        return $this->response->setJSON([
            'status' => true,
            'icon' => 'success',
            'title' => 'Success!',
            'text' => 'Successfully delete categories',
        ]);
    }
}
