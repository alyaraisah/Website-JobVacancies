<?php  
namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'job_seeker';
    protected $primaryKey = 'id_jobseeker';
    protected $allowedFields = ['nama','email','password','alamat','pendidikan','resume','no_telp','foto_jobseeker'];
}
