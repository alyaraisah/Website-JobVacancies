<?php

namespace App\Models;

use CodeIgniter\Model;

class ApplyModel extends Model
{
    protected $table = 'apply';
    protected $primaryKey = 'id_perusahaan';
    protected $allowedFields = ['nama_perusahaan', 'sektor', 'alamat_perusahaan', 'website_perushaabn', 'deskripsi_perusahaan', 'kontak_telf', 'email_perusahaan', 'password_perusahaan'];
}
