<?php

namespace App\Controllers;

use App\Models\AccessModel;
use CodeIgniter\HTTP\ResponseInterface;

class Access extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new AccessModel();
    }
    public function index($isRegister = false): string | ResponseInterface
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/Main');
        }

        $data = array(
            'isRegister' => $isRegister,
        );

        return view('access/login', $data);
    }

    public function register()
    {
        $session = session();

        $rules = [
            'username' => 'required',
            'email' => 'required|valid_email',
            'password' => 'required',
        ];

        $errors = [
            'username' => [
                'required' => 'O campo Nome de Usuário é obrigatório.',
                'min_length' => 'A senha deve ter pelo menos 6 caracteres.'
            ],
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
            $session->setFlashdata('error', 'Por favor, corrija os erros abaixo.');
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $form = $this->request->getPost();

        if (!empty($form)) {
            $result = $this->model->register($form);

            if ($result['status'] === 'success') {
                $session->setFlashdata('success', 'Usuário registrado com sucesso!');
                return redirect()->to('/Main');
            } else {
                $session->setFlashdata('error', $result['message']);
                return redirect()->back()->withInput();
            }
        }
    }

    public function login()
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

        $form = $this->request->getPost();

        $user = $this->model->getByEmail($form['email']);

        if ($user) {
            if (password_verify($form['password'], $user->password)) {

                $sessionData = [
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'user_email' => $user->email,
                    'isLoggedIn' => TRUE,
                ];

                $session->set($sessionData);

                return redirect()->to('/Main');
            } else {
                $session->setFlashdata('error', 'E-mail ou senha incorreta.');
                return redirect()->back()->withInput();
            }
        } else {
            $session->setFlashdata('error', 'E-mail ou senha incorreta.');
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
