<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class StaticFiles extends BaseController
{
    public function serve($file)
    {
        $filePath = WRITEPATH . 'public/js/' . $file;
        if (is_file($filePath)) {
            $this->response->setHeader('Content-Type', 'text/javascript');
            $this->response->setBody(file_get_contents($filePath));
            return $this->response;
        }
        throw new \CodeIgniter\Exceptions\PageNotFoundException($file);
    }
}