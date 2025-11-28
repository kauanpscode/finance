<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

abstract class BaseController extends Controller
{
    protected $request;
    protected $helpers = [];

    // ✅ Adiciona a propriedade da sessão
    protected $session;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        // ✅ Inicializa a sessão
        $this->session = service('session');
    }

    public function view(string $view, array $data = [])
    {
        $header = view('layouts/header', $data);
        $content = view($view, $data);
        $footer = view('layouts/footer', $data);

        return $header . $content . $footer;
    }
}
