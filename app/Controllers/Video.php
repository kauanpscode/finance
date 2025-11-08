<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\VideoModel;

class Video extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new VideoModel;
    }
    public function index()
    {

        $page_head = array(
            'title' => 'Filmes',
            'subtitle' => 'Lista',
            'btn_novo' => 'Video/novo',

        );

        $data = array(
            'page_head' => $page_head,
            'grid' => $this->model->grid()
        );

        return $this->view('video/videogrid', $data);
    }

    public function novo()
    {
        $page_head = array(
            'title' => 'Filmes',
            'subtitle' => 'Novo',
        );

        $form = $this->request->getPost();

        if (!empty($form)) {
            $this->model->novo($form);
        }


        $data = array(
            'page_head' => $page_head,
        );

        return $this->view('video/videoform', $data);
    }
}
