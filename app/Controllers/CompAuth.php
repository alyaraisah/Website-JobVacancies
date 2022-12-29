<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\Hash;
use App\Models\CompLoginModel;
use CodeIgniter\HTTP\Request;

class CompAuth extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index()
    {
        return view('pages/loginCompany');
    }

    public function register()
    {
        return view('pages/hire');
    }

    public function save()
    {
        $validation = $this->validate([
            'companyName' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama perusahaan harus diisi',
                ]
            ],
            'companyEmail' => [
                'rules' => 'required|valid_email|is_unique[perusahaan.email_perusahaan]',
                'errors' => [
                    'required' => 'email perusahaan wajib diisi',
                    'valid_email' => 'email harus merupakan email valid',
                    'is_unique' => 'email telah terdaftar di layanan kami',
                ]
            ],
            'companyPassword' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'email perusahaan wajib diisi',
                    'min_length' => 'password minimal 8 karakter',
                ]
            ],
            'cpass' => [
                'rules' => 'required|min_length[8]|matches[companyPassword]',
                'errors' => [
                    'required' => 'email perusahaan wajib diisi',
                    'min_length' => 'password minimal 8 karakter',
                    'matches' => 'confirm password tidak sesuai dengan password'
                ]
            ]
        ]);

        if (!$validation) {
            return view('pages/hire', ['validation' => $this->validator]);
        } else {
            $nama_perusahaan = $this->request->getPost('companyName');
            $email_perusahaan = $this->request->getPost('companyEmail');
            $password_perusahaan = $this->request->getPost('companyPassword');

            $values = [
                'nama_perusahaan' => $nama_perusahaan,
                'email_perusahaan' => $email_perusahaan,
                'password_perusahaan' => Hash::make($password_perusahaan)
            ];
            $CompLoginModel = new \App\Models\CompLoginModel();
            $query = $CompLoginModel->insert($values);
            if (!$query) {
                return redirect()->back()->with('fail', 'Something went wrong');
            } else {
                return redirect()->back()->with('success', 'You are now registered');
            }
        }
    }

    public function check()
    {
        //validate
        $validation = $this->validate([
            'companyEmail' => [
                'rules' => 'required|valid_email|is_not_unique[perusahaan.email_perusahaan]',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Enter a valid email',
                    'is_not_unique' => 'This email is not registered in our website'
                ]
            ],
            'companyPassword' => [
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
            $email_perusahaan = $this->request->getPost('companyEmail');
            $password_perusahaan = $this->request->getPost('companyPassword');
            $CompLoginModel = new \App\Models\CompLoginModel();
            $comp_info = $CompLoginModel->where('email_perusahaan', $email_perusahaan)->first();
            $check_password = Hash::check($password_perusahaan, $comp_info['password_perusahaan']);

            if (!$check_password) {
                session()->setFlashdata('fail', 'Incorrect password');
                return redirect()->to('/compauth')->withInput();
            } else {
                $comp_id = $comp_info['id_perusahaan'];
                session()->set('loggedComp', $comp_id);
                return redirect()->to('/page/compProfile');
            }
        }
    }

    public function logout()
    {
        if (session()->has('loggedComp')) {
            session()->remove('loggedComp');
            return redirect()->to('/?access=out')->with('fail', 'You are logged out!');
        }
    }

    public function updateCompProfile()
    {
        $upadateData = [
            'nama_perusahaan'=>$this->request->getPost('namaPerusahaan'),
            'sektor'=>$this->request->getPost('sektorPerusahaan'),
            'alamat_perusahaan'=>$this->request->getPost('alamatPerusahaan'),
            'kontak_telf'=>$this->request->getPost('telpPerusahaan'),
            'website_perusahaan'=>$this->request->getPost('websitePerusahaan'),
            // 'deskripsi_perusahaan'=>$this->request->getPost('descPerusahaan'),
        ];
        $db      = \Config\Database::connect();
        $builder = $db->table('perusahaan');
        $builder->where('id_perusahaan',session()->get('loggedComp'));
        if($builder->update($upadateData)){
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to('/page/compProfile');
        }else{
            session()->setFlashdata('pesan', 'Data gagal disimpan');
            return redirect()->to('/page/compProfile');
        }
    }

    public function updateCompDesc()
    {
        $upadateData = [
            'deskripsi_perusahaan'=>$this->request->getPost('descPerusahaan'),
        ];
        $db      = \Config\Database::connect();
        $builder = $db->table('perusahaan');
        $builder->where('id_perusahaan',session()->get('loggedComp'));
        if($builder->update($upadateData)){
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to('/page/compProfile');
        }else{
            session()->setFlashdata('pesan', 'Data gagal disimpan');
            return redirect()->to('/page/compProfile');
        }
    }
}
