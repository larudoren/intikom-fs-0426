<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function login()
    {
        if (session()->get('logged_in')){
            return redirect()->to('/dashboard');
        }

        return view('auth/login');
    }

    public function loginProcess()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'user_id'       => $user['id'],
                'username'      => $user['username'],
                'user_name'     => $user['name'],
                'user_email'    => $user['email'],
                'logged_in'     => true
            ]);

            return redirect()->to('dashboard');
        }

        return redirect()->back()->with('error', 'Username atau Password salah.')->withInput();

    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
