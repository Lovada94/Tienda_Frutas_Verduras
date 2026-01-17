<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'usuarios';
    protected $allowedFields = ['username', 'password'];

    public function checkUser($user, $pass)
    {
        return $this->where([
            'username' => $user,
            'password' => $pass
        ])->first();
    }

    public function getUserById($id)
    {
        $sql = $this->select('id, username');
        $sql = $this->where('id', $id)->first();
        return $sql;
    }

    public function getByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
}