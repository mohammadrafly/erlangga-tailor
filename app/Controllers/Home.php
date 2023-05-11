<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
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
        return view('pages/dashboard/index', ['title' => 'Dashboard']);
    }

    public function order()
    {
        return view('pages/dashboard/orderDashboard');
    }
}
