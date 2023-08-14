<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Account extends BaseController
{
    public function index()
    {
        //
    }

    public function login() : string {
        return view('Account/login');
    }

    public function doLogin() {
        
    }

    public function logout() {

    }

    public function signup() :string {
        if(request()->getGet('success')) {
            return view('Account/account_success');
        }
        return view('Account/signup');
    }

    public function doSignup() {
        $rules = [
            'username' => 'required|min_length[4]|max_length[16]',
            'password' => 'required|min_length[3]|max_length[32]',
            'passconf' => 'required|matches[password]',
            'email'    => 'required|valid_email',
        ];

        if (! $this->validate($rules)) {
            session()->setFlashdata(
                [
                    'errors' => $this->validator->getErrors()
                ]
            );
            return redirect()->to(site_url('signup'))->withInput();
        } 
        else {
            // create account

            $userModel = new User();
            $userModel->insert([
                'username' => request()->getPost('username'),
                'email' => request()->getPost('email'),
                'password' => password_hash(request()->getPost('password'), PASSWORD_DEFAULT),
                'ip' => request()->getIPAddress()
            ]);

            return redirect()->to(site_url('signup?success=true'));
        }
    }
}
