<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new User();

        $users = $userModel->findAll();

        return $this->renderView('Users/list', ['users' => $users]);
    }

    public function view($id) {
        $userModel = new User();

        $user = $userModel->find($id);

        if(empty($user)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return $this->renderView('Users/view', ['user' => $user]);
    }
}
