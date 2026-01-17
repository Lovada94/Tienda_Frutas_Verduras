<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
{

    public function loginForm($error = null)
    {
        if (session()->has('user_id')) {
            return redirect()->to(base_url('backend/admin'));
        }

        helper('form');

        $data = [
            'title' => 'Inicia sesión',
            'error' => $error,
        ];

        return view('frontend/templates/navbar', $data)
            . view('frontend/usuarios/login')
            . view('frontend/templates/footer');
    }


    public function checkUser()
    {
        helper('form');
        if (!$this->validate([
            'username' => 'required|max_length[255]|min_length[4]',
            'password' => 'required|max_length[255]|min_length[4]',
        ])) {
            return $this->loginForm();
        }

        $post = $this->validator->getValidated();

        $model = model(UsersModel::class);

        $user = $model->getByUsername($post['username']);

        if ($user && password_verify($post['password'], $user['password'])) {
            session()->set([
                'user_id'  => $user['id'],
                'username' => $user['username'],
            ]);
            return redirect()->to(base_url('backend/admin'));
        }

        return $this->loginForm('Credenciales incorrectas');
    }

    public function closeSession()
    {
        $session = session();

        $session->remove(['user_id', 'username']);

        $session->destroy();

        return redirect()->to(base_url('login'));
    }

    public function registroForm($error = null)
    {
        if (session()->has('user_id')) {
            return redirect()->to(base_url('backend/admin'));
        }

        helper('form');

        $data = [
            'title' => 'Regístrate',
            'error' => $error,
        ];

        return view('frontend/templates/navbar', $data)
            . view('frontend/usuarios/registro')
            . view('frontend/templates/footer');
    }


    public function registro()
    {
        helper('form');

        if (!$this->validate([
            'nombre'    => 'required|max_length[50]',
            'apellidos' => 'required|max_length[50]',
            'email'     => 'required|valid_email|max_length[100]|is_unique[usuarios.email]',
            'username'  => 'required|alpha_numeric|min_length[4]|max_length[30]|is_unique[usuarios.username]',
            'password'  => 'required|min_length[4]|max_length[255]',
        ])) {
            return redirect()->back()->withInput();
        }

        $usersModel = model(UsersModel::class);

        $passwordHash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        $usersModel->insert([
            'nombre'    => $this->request->getPost('nombre'),
            'apellidos' => $this->request->getPost('apellidos'),
            'email'     => $this->request->getPost('email'),
            'username'  => $this->request->getPost('username'),
            'password'  => $passwordHash,
        ]);

        if (!$usersModel->db->affectedRows()) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        return redirect()->to(base_url('/'))->with('message', 'Registro completado');
    }
}
