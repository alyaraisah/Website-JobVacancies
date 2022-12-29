<?php

namespace App\Controllers;

use App\Models\CrudLowonganModel;

class CompCrud extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function createLowongan()
    {
        return view('pages/createLowongan');
    }

    public function create()
    {
        $validation = $this->validate([
            'gaji' => [
                'rules' => 'required|is_natural',
                'errors' => [
                    'required' => 'gaji harus diisi',
                    'is_natural' => 'gaji harus diisi dengan angka'
                ]
            ],
            'posisi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'posisi wajib diisi',
                ]
            ],
            'jobDesk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'job desk wajib diisi',
                ]
            ],
            'tipeKontrak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tipe kontrak wajib diisi',
                ]
            ],
            'pendidikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'pendidikan terakhir wajib diisi',
                ]
            ],
            'pengalaman' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'pengalaman kerja wajib diisi',
                ]
            ]
        ]);

        if (!$validation) {
            return view('pages/createLowongan', ['validation' => $this->validator]);
        } else {
            $gaji = $this->request->getVar('gaji');
            $posisi = $this->request->getVar('posisi');
            $job_desk = $this->request->getVar('jobDesk');
            $tipe_kontrak = $this->request->getVar('tipeKontrak');
            $pendidikan_terakhir = $this->request->getVar('pendidikan');
            $pengalaman_kerja = $this->request->getVar('pengalaman');
            $values = [
                'gaji' => $gaji,
                'posisi' => $posisi,
                'job_desk' => $job_desk,
                'tipe_kontrak' => $tipe_kontrak,
                'pendidikan_terakhir' => $pendidikan_terakhir,
                'pengalaman_kerja' => $pengalaman_kerja,
                'id_perusahaan' => session()->get('loggedComp'),
            ];
            $compModel = new \App\Models\CrudLowonganModel();
            $query = $compModel->insert($values);
            if (!$query) {
                return redirect()->to('/compcrud/createlowongan')->with('fail', 'Something went wrong');
            } else {
                return redirect()->to('/page/crud_job');
            }
        }
    }

    public function updateLowongan($id)
    {
        $lowonganModel = new \App\Models\CrudLowonganModel();
        $data = [
            'lowonganInfo' => $lowonganModel->where('id_lowongan', $id)->first(),
        ];
        return view('pages/updateLowongan', $data);
    }

    public function update($id)
    {
        $validation = $this->validate([
            'gaji' => [
                'rules' => 'required|is_natural',
                'errors' => [
                    'required' => 'gaji harus diisi',
                    'is_natural' => 'gaji harus diisi dengan angka'
                ]
            ],
            'posisi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'posisi wajib diisi',
                ]
            ],
            'jobDesk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'job desk wajib diisi',
                ]
            ],
            'tipeKontrak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tipe kontrak wajib diisi',
                ]
            ],
            'pendidikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'pendidikan terakhir wajib diisi',
                ]
            ],
            'pengalaman' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'pengalaman kerja wajib diisi',
                ]
            ]
        ]);

        if (!$validation) {
            return view('pages/updateLowongan', ['validation' => $this->validator]);
        } else {
            $gaji = $this->request->getVar('gaji');
            $posisi = $this->request->getVar('posisi');
            $job_desk = $this->request->getVar('jobDesk');
            $tipe_kontrak = $this->request->getVar('tipeKontrak');
            $pendidikan_terakhir = $this->request->getVar('pendidikan');
            $pengalaman_kerja = $this->request->getVar('pengalaman');
            $values = [
                'gaji' => $gaji,
                'posisi' => $posisi,
                'job_desk' => $job_desk,
                'tipe_kontrak' => $tipe_kontrak,
                'pendidikan_terakhir' => $pendidikan_terakhir,
                'pengalaman_kerja' => $pengalaman_kerja,
                'id_perusahaan' => session()->get('loggedComp'),
            ];
            $compModel = new \App\Models\CrudLowonganModel();
            $query = $compModel->update($id, $values);
            if (!$query) {
                return redirect()->to('/compcrud/createlowongan')->with('fail', 'Something went wrong');
            } else {
                return redirect()->to('/page/crud_job');
            }
        }
    }

    public function deleteLowongan($id)
    {
        $lowonganModel = new \App\Models\CrudLowonganModel();
        $lowonganModel->delete($id);
        return redirect()->to('/page/crud_job');
    }
}
