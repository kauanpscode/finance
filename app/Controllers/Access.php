<?php

namespace App\Controllers;

use App\Models\AccessModel;
use CodeIgniter\HTTP\ResponseInterface;

class Access extends BaseController
{
    protected $accessModel;
    public function __construct()
    {
        $this->accessModel = new AccessModel();
    }
    public function index(): string | ResponseInterface
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/Main');
        }

        return view('access/login');
    }

    public function register(): string | ResponseInterface
    {
        return view('access/register');
    }

    public function login(): ResponseInterface
    {
        $session = session();

        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ];

        $errors = [
            'email' => [
                'required' => 'O campo e-mail é obrigatório.',
                'valid_email' => 'E-mail inválido.'
            ],
            'password' => [
                'required' => 'O campo senha é obrigatório.',
                'min_length' => 'A senha deve ter pelo menos 6 caracteres.'
            ]
        ];

        if (!$this->validate($rules, $errors)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->accessModel->get($email);

        if ($user) {
            if ($user['password'] == $password) {

                $ses_data = [
                    'user_id' => $user['id'],
                    'username' => $user['name'],
                    'user_email' => $user['email'],
                    'isLoggedIn' => TRUE,
                ];

                $session->set($ses_data);

                return redirect()->to('/Main');
            } else {
                $session->setFlashdata('error', 'E-mail ou senha incorreta.');
                return redirect()->back()->withInput();
            }
        } else {
            $session->setFlashdata('error', 'E-mail ou senha incorretos.');
            return redirect()->back()->withInput();
        }
    }

    public function logout(): ResponseInterface
    {
        $session = session();
        $session->destroy();

        return redirect()->to('/access')->with('success', 'Você foi desconectado com sucesso.');
    }
}
