<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\Hash;

class Auth extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function index()
    {
        return view('pages/loginPage');
    }

    public function register()
    {
        return view('pages/signUp');
    }

    public function save()
    {
        //validate request
        $validation = $this->validate([
            'fullname' => 'required',
            'email' => 'required|valid_email|is_unique[job_seeker.email]',
            'password' => 'required|min_length[8]',
            'cpassword' => 'required|min_length[8]|matches[password]'
        ]);

        if (!$validation) {
            return view('pages/signUp', ['validation' => $this->validator]);
        } else {
            $nama = $this->request->getPost('fullname');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $data = [
                'nama' => $nama,
                'email' => $email,
                'password' => Hash::make($password),
            ];

            $usersModel = new \App\Models\UsersModel();
            $query = $usersModel->insert($data);
            if (!$query) {
                return redirect()->back()->with('fail', 'Something went wrong');
            } else {
                return redirect()->to('register')->with('success', 'You are now registered');
            }
        }
    }

    public function check()
    {
        //validate
        $validation = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[job_seeker.email]',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Enter a valid email',
                    'is_not_unique' => 'This email is not registered in our website'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'password is required',
                    'min_length' => 'password must have at least minimun 8 characters'
                ]
            ]
        ]);

        if (!$validation) {
            return view('pages/loginPage', ['validation' => $this->validator]);
        } else {
            //set login session
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $usersModel = new \App\Models\UsersModel();
            $user_info = $usersModel->where('email', $email)->first();
            $check_password = Hash::check($password, $user_info['password']);

            if (!$check_password) {
                session()->setFlashdata('fail', 'Incorrect password');
                return redirect()->to('/auth')->withInput();
            } else {
                $user_id = $user_info['id_jobseeker'];
                session()->set('loggedUser', $user_id);
                return redirect()->to('/page/profile');
            }
        }
    }

    function logout()
    {
        if(session()->has('loggedUser')){
            session()->remove('loggedUser');
            return redirect()->to('/?access=out')->with('fail', 'You are logged out!');
        }
    }
}
