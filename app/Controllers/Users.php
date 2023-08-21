<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\RedirectResponse;

class Users extends BaseController
{
    public function index() : string
    {
        $userModel = new User();

        $users = $userModel->findAll();

        return $this->renderView('Users/list', ['users' => $users, 'page_title' => 'User List', 'active_area' => 'users']);
    }

    public function view(int $id) : string {
        $userModel = new User();

        $user = $userModel->find($id);

        if(empty($user)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return $this->renderView('Users/view', ['user' => $user, 'page_title' => $user['username'] . '\'s Profile', 'active_area' => 'users']);
    }
}
