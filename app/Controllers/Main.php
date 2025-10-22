<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Main extends BaseController
{
    public function index() {
        $page_head = array(
            'title' => 'Home'
        );


        $data = array(
            'page_head' => $page_head,
        );

        return $this->view('home', $data);
    }
}
