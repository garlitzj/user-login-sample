<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\RedirectResponse;

class Account extends BaseController
{
    public function index() : string|RedirectResponse
    {
        if(empty($this->loggedInUser)) {
            return redirect()->to(site_url('/login'));
        }

        $data = [
            'username' => old('username') ? old('username') : $this->loggedInUser['username'],
            'about_me' => old('about_me') ? old('about_me') : $this->loggedInUser['about_me'],
            'job' => old('job') ? old('job') : $this->loggedInUser['job'],
        ];

        return $this->renderView('Account/dashboard', $data);
    }

    public function updateProfile() : RedirectResponse {
        if(empty($this->loggedInUser)) {
            return redirect()->to(site_url('/login'));
        }

        $userModel = new User();

        $rules = [
            'username' => 'required|min_length[4]|max_length[16]|alpha_numeric_punct',
            'job' => 'max_length[32]'
        ];

        if (! $this->validate($rules)) {
            session()->setFlashdata(
                [
                    'errors' => $this->validator->getErrors()
                ]
            );
            return redirect()->to(site_url('dashboard'))->withInput();
        } 
        else {
            $about_me = request()->getPost('about');
            $username = request()->getPost('username');
            $job = request()->getPost('job');
    
            $values_to_update = [
                'about_me' => trim($about_me),
                'job' => trim($job)
            ];
    
            // username uniqueness check
    
            $user_by_name = $userModel->where('username', $username)->first();
    
            if(!empty($user_by_name) && $user_by_name['id'] != $this->loggedInUser['id']) {
                session()->setFlashdata(
                    [
                        'errors' =>  [
                            'username' => 'This username is already taken.'
                        ]
                    ]
                );
            } else {
                $values_to_update['username'] = $username;
                $userModel = new User();
                $userModel->update($this->loggedInUser['id'], $values_to_update);
        
                session()->setFlashdata(
                    [
                        'success' => true
                    ]
                );
            }

            return redirect()->to(site_url('dashboard'))->withInput();
        }
    }

    public function login() : string|RedirectResponse {
        if(!empty($this->loggedInUser)) {
            return redirect()->to(site_url('/'));
        }

        return $this->renderView('Account/login');
    }

    public function doLogin() : RedirectResponse {
        $userModel = new User();

        $rules = [
            'password' => 'required',
            'email'    => 'required',
        ];

        if (! $this->validate($rules)) {
            session()->setFlashdata(
                [
                    'errors' => $this->validator->getErrors()
                ]
            );
            return redirect()->to(site_url('login'))->withInput();
        } else {
            // check if user exists, and if so compare password to the one entered

            $user_by_email = $userModel->where('email', request()->getPost('email'))->first();
            $check_passed = true;

            if(!empty($user_by_email)) {
                $check_passed = password_verify(request()->getPost('password'), $user_by_email['password']);
            } else {
                $check_passed = false;
            }

            if(!$check_passed) {
                session()->setFlashdata(
                    [
                        'login_fail' => 'true'
                    ]
                );
                return redirect()->to(site_url('login'))->withInput();
            }

            // password check worked, login and redirect

            $userModel->update($user_by_email['id'], ['ip' => request()->getIPAddress()]);

            session()->set('user_id', $user_by_email['id']);

            return redirect()->to(site_url(''));
        }
    }

    public function logout() : RedirectResponse {
        session()->destroy();
        return redirect()->to(site_url(''));
    }

    public function signup() : RedirectResponse|string {
        if(!empty($this->loggedInUser)) {
            return redirect()->to(site_url('/'));
        }

        if(request()->getGet('success')) {
            return $this->renderView('Account/account_success');
        }
        return $this->renderView('Account/signup');
    }

    public function doSignup() : RedirectResponse {
        $rules = [
            'username' => 'required|min_length[4]|max_length[16]|alpha_numeric_punct',
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
            $userModel = new User();

            // check if user exists, either by email or by username

            $failed_unique_check = false;
            $errors = [];
            $user_by_email = $userModel->where('email', request()->getPost('email'))->first();
            $user_by_name = $userModel->where('username', request()->getPost('username'))->first();

            if(!empty($user_by_email)) {
                $errors['email'] = 'The email address is already taken.';
                $failed_unique_check = true;
            }

            if(!empty($user_by_name)) {
                $errors['username'] = 'The username is already taken.';
                $failed_unique_check = true;
            }

            // redirect if email or name are taken
            if($failed_unique_check) {
                session()->setFlashdata(
                    [
                        'errors' => $errors
                    ]
                );
                return redirect()->to(site_url('signup'))->withInput();
            }

            // create account
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
