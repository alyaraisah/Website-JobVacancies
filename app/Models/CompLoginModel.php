<?php

namespace App\Models;

use CodeIgniter\Model;

class CompLoginModel extends Model
{
    protected $table = 'perusahaan';
    protected $primaryKey = 'id_perusahaan';
    protected $allowedFields = ['nama_perusahaan', 'sektor', 'alamat_perusahaan', 'website_perushaabn', 'deskripsi_perusahaan', 'kontak_telf', 'email_perusahaan', 'password_perusahaan'];
}
