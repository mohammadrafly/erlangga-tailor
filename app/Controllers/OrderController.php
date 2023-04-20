<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class OrderController extends BaseController
{
    public function tanpaDesain()
    {
        if ($this->request->getMethod(true) !== 'POST') {
            return view('pages/home/orderTanpaDesain');
        }
    }

    public function denganDesain()
    {
        if ($this->request->getMethod(true) !== 'POST') {
            return view('pages/home/orderDenganDesain');
        }
    }

    public function perbaikan()
    {
        if ($this->request->getMethod(true) !== 'POST') {
            return view('pages/home/orderPerbaikan');
        }
    }
}
