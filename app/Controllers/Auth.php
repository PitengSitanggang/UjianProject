<?php

namespace App\Controllers;

use App\Models\MenuModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('admin_logged_in')) {
            return redirect()->to('/admin');
        }
        return view('auth/login', ['title' => 'Login Admin - Warung Sitanggang']);
    }

    public function loginProcess()
    {
        $rules = [
            'username' => 'required|min_length[3]',
            'password' => 'required|min_length[6]',
        ];

        $messages = [
            'username' => [
                'required'   => 'Username wajib diisi.',
                'min_length' => 'Username minimal 3 karakter.',
            ],
            'password' => [
                'required'   => 'Password wajib diisi.',
                'min_length' => 'Password minimal 6 karakter.',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $admin = db_connect()->table('admin')->where('username', $username)->get()->getRowArray();

        if ($admin && password_verify($password, $admin['password'])) {
            session()->set([
                'admin_logged_in' => true,
                'admin_id'        => $admin['id'],
                'admin_nama'      => $admin['nama'],
                'admin_username'  => $admin['username'],
            ]);
            return redirect()->to('/admin')->with('success', 'Selamat datang, ' . $admin['nama'] . '!');
        }

        return redirect()->back()->withInput()->with('error', 'Username atau password salah.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Berhasil logout.');
    }
}
