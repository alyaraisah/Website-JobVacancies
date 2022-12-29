<?php  
namespace App\Models;

use CodeIgniter\Model;

class CrudLowonganModel extends Model
{
    protected $table = 'lowongan';
    protected $primaryKey = 'id_lowongan';
    protected $allowedFields = ['gaji','posisi','password','job_desk','tipe_kontrak','pendidikan_terakhir','pengalaman_kerja','id_perusahaan'];
}
