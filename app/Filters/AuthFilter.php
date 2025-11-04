<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    protected $uri;
    protected $allowedRoutes = [
        'access',
        'access/login',
        'access/register',
        'access/index',
    ];
    public function before(RequestInterface $request, $arguments = null)
    {
        $uri = strtolower($request->getUri()->getPath());

        if (in_array($uri, $this->allowedRoutes)) {
            return;
        }

            if (!session()->get('isLoggedIn')) {
            return redirect()->to('/access')->with('error', 'Você precisa estar logado para acessar esta página.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Não faz nada após a execução do controlador neste filtro
    }
}
