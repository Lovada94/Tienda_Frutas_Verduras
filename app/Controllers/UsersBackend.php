<?php

namespace App\Controllers;

use App\Models\UsersModel;

class UsersBackend extends BaseController
{
    public function index()
    {
        if (!session()->has('user_id')) {
            return redirect()->to(base_url('login'));
        }

        $model = model(UsersModel::class);
        $user  = $model->getUserById((int) session()->get('user_id'));

        $data = [
            'title' => 'Admin',
            'user'  => $user,
        ];

        return view('frontend/templates/navbar', $data)
            . view('backend/index')
            . view('frontend/templates/footer');
    }

    
}
