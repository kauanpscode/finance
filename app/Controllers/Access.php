<?php

namespace App\Controllers;

class Access extends BaseController
{
    public function index(): string
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }
        return view('access/access');
    }
}
