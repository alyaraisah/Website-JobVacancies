<?php namespace App\Controllers;

class Page extends BaseController{
    public function hire(){
        return view('pages/hire');
    }
    public function loginCom(){
        return view('pages/loginCompany');
    }
    public function loginJB(){
        return view('pages/loginPage');
    }
    public function enrollJB(){
        return view('pages/signUp');
    }

    public function detail(){
        $usersModel = new \App\Models\UsersModel();
        $lowonganModel = new \App\Models\CrudLowonganModel();
        $keyword = $this->request->getPost('keyword');
        $viewdata = $lowonganModel->where('id_lowongan', $keyword)->find();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $usersModel->where('id_jobseeker', $loggedUserID)->find();
        $data = [
            'userInfo'=>$userInfo,
            'viewdata' => $viewdata,
        ];
        return view('pages/detail', $data);
    }
    
    public function applied(){
        $compModel = new \App\Models\CompLoginModel();
        $db      = \Config\Database::connect();
        $builder = $db->table('apply');
        $builder->select('*');
        $builder->join('job_seeker', 'apply.id_jobseeker = job_seeker.id_jobseeker');
        $keyword = $this->request->getPost('keyword');
        $builder->where('apply.id_lowongan', $keyword);
        $viewdata = $builder->get();
        $loggedCompID = session()->get('loggedComp');
        $compInfo = $compModel->where('id_perusahaan', $loggedCompID)->find();
        $data = [
            'compInfo'=>$compInfo,
            'viewdata' => $viewdata,
        ];
        return view('pages/applied', $data);
    }

    public function apply(){
        $db      = \Config\Database::connect();
        $builder = $db->table('apply');
        $loggedUserID = session()->get('loggedUser');
        $data = [
            'id_lowongan' => $this->request->getPost('id_lowongan'),
            'id_jobseeker' => $loggedUserID,
        ];
        $builder->insert($data);
        return redirect()->to('/page/lowongan');
    }
    
    public function crud_job(){
        $compModel = new \App\Models\CompLoginModel();
        $loggedCompID = session()->get('loggedComp');
        $compInfo = $compModel->where('id_perusahaan', $loggedCompID)->find();
        $lowonganModel = new \App\Models\LowonganModel();
        $viewdata = $lowonganModel->view_id($loggedCompID)->getResult();
        $data = [
            'compInfo'=>$compInfo,
            'viewdata' => $viewdata
        ];
        return view('pages/crud_job', $data);
    }

    public function lowongan(){
        $usersModel = new \App\Models\UsersModel();
        $lowonganModel = new \App\Models\LowonganModel();
        $viewdata = $lowonganModel->paginate(3, 'lowongan');
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $usersModel->where('id_jobseeker', $loggedUserID)->find();
        $data = [
            'userInfo'=>$userInfo,
            'viewdata' => $viewdata,
            'pager' => $lowonganModel->pager
        ];
        return view('pages/lowongan', $data);
    }

    public function enroll(){
        $usersModel = new \App\Models\UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $usersModel->where('id_jobseeker', $loggedUserID)->find();
        $db      = \Config\Database::connect();
        $builder = $db->table('apply');
        $builder->select('*');
        $builder->join('lowongan', 'apply.id_lowongan = lowongan.id_lowongan');
        $builder->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id_perusahaan');
        $builder->where('apply.id_jobseeker', $loggedUserID);
        $viewdata = $builder->get();
        $data = [
            'userInfo' => $userInfo,
            'viewdata' => $viewdata
        ];
        return view('pages/enroll', $data);
    }

    public function profile(){
        $usersModel = new \App\Models\UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $usersModel->where('id_jobseeker', $loggedUserID)->find();
        $data = [
            'userInfo'=>$userInfo
        ];
        return view('pages/profile', $data);
    }
    
    public function compProfile(){
        $compModel = new \App\Models\CompLoginModel();
        $loggedCompID = session()->get('loggedComp');
        $compInfo = $compModel->where('id_perusahaan', $loggedCompID)->find();
        $data = [
            'compInfo'=>$compInfo
        ];
        return view('pages/compProfile', $data);
    }
    
    public function lowonganAll(){
        $compModel = new \App\Models\CompLoginModel();
        $lowonganModel = new \App\Models\LowonganModel();
        $loggedCompID = session()->get('loggedComp');
        $viewdata = $lowonganModel->where('id_perusahaan', $loggedCompID)->paginate(3, 'lowongan');
        $compInfo = $compModel->where('id_perusahaan', $loggedCompID)->find();
        $data = [
            'compInfo'=>$compInfo,
            'viewdata' => $viewdata,
            'pager' => $lowonganModel->pager
        ];
        return view('pages/lowonganAll', $data);
    }
    
    public function searchComp(){
        $compModel = new \App\Models\CompLoginModel();
        $lowonganModel = new \App\Models\LowonganModel();
        $keyword = $this->request->getPost('keyword');
        $loggedCompID = session()->get('loggedComp');
        $viewdata = $lowonganModel->comp_keyword($keyword, $loggedCompID)->getResult();
        $compInfo = $compModel->where('id_perusahaan', $loggedCompID)->find();
        $data = [
            'compInfo'=>$compInfo,
            'viewdata' => $viewdata
        ];
        return view('pages/crud_job', $data);
    }

    public function searchHome(){
        $compModel = new \App\Models\CompLoginModel();
        $lowonganModel = new \App\Models\LowonganModel();
        $keyword = $this->request->getPost('keyword');
        $loggedCompID = session()->get('loggedComp');
        $viewdata = $lowonganModel->get_keyword($keyword, $loggedCompID)->getResult();
        $compInfo = $compModel->where('id_perusahaan', $loggedCompID)->find();
        $data = [
            'compInfo'=>$compInfo,
            'viewdata' => $viewdata
        ];
        return view('pages/lowonganAll', $data);
    }

    public function search(){
        $lowonganModel = new \App\Models\LowonganModel();
        $usersModel = new \App\Models\UsersModel();
        $keyword = $this->request->getPost('keyword');
        $viewdata = $lowonganModel->get_keyword($keyword)->getResult();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $usersModel->where('id_jobseeker', $loggedUserID)->find();
        $data = [
            'userInfo' => $userInfo,
            'viewdata' => $viewdata
        ];
        return view('pages/lowongan', $data);
    }

    public function updateProfile()
    {
        $upadateData = [
            'nama'=>$this->request->getPost('nama'),
            'gender'=>$this->request->getPost('gender'),
            'email'=>$this->request->getPost('email'),
            'tempat_lahir'=>$this->request->getPost('tempat_lahir'),
            'tanggal_lahir'=>$this->request->getPost('tgl_lahir'),
            'alamat'=>$this->request->getPost('alamat'),
            'domisili_terakhir'=>$this->request->getPost('domisili'),
            'no_telp'=>$this->request->getPost('no_telp'),
            //'foto_jobseeker'=>$this->request->getPost(''),
            'pendidikan_SD'=>$this->request->getPost('sd'),
            'pendidikan_SMP'=>$this->request->getPost('smp'),
            'pendidikan_SMA'=>$this->request->getPost('sma'),
            'pendidikan_Universitas'=>$this->request->getPost('universitas'),
            'nama_Pengalaman'=>$this->request->getPost('pengalaman'),
            'jenis_Pengalaman'=>$this->request->getPost('jenis_pengalaman'),
            'posisi_Pengalaman'=>$this->request->getPost('posisi'),
            'lama_Pengalaman'=>$this->request->getPost('pengalaman1'),
            'durasi_Pengalaman'=>$this->request->getPost('pengalaman2')
        ];
        $db      = \Config\Database::connect();
        $builder = $db->table('job_seeker');
        $builder->where('id_jobseeker',session()->get('loggedUser'));
        if($builder->update($upadateData)){
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to('/page/profile');
        }else{
            session()->setFlashdata('pesan', 'Data gagal disimpan');
            return redirect()->to('/page/profile');
        }
    }

    public function register(){
        return view('pages/signUp');
    }
}