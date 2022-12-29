<?php  
namespace App\Models;

use CodeIgniter\Model;

class LowonganModel extends Model
{    
    protected $table = 'lowongan';

    public function viewdata(){
        $builder = $this->db->table('lowongan');
        $builder->select('*');
        $builder->join('perusahaan', 'perusahaan.id_perusahaan = lowongan.id_perusahaan');
        return $builder->get();
    }

    public function view_id($id){
        $builder = $this->db->table('lowongan');
        $builder->select('*');
        $builder->join('perusahaan', 'perusahaan.id_perusahaan = lowongan.id_perusahaan');
        $builder->where('lowongan.id_perusahaan', $id);
        return $builder->get();
    }

    public function get_keyword($keyword){
        $builder = $this->db->table('lowongan');
        $builder->select('*');
        $builder->join('perusahaan', 'perusahaan.id_perusahaan = lowongan.id_perusahaan');
        $builder->like('gaji', $keyword);
        $builder->orLike('posisi', $keyword);
        $builder->orLike('job_desk', $keyword);
        $builder->orLike('tipe_kontrak', $keyword);
        $builder->orLike('pendidikan_terakhir', $keyword);
        $builder->orLike('pengalaman_kerja', $keyword);
        $builder->orLike('nama_perusahaan', $keyword);
        $builder->orLike('sektor', $keyword);
        $builder->orLike('alamat_perusahaan', $keyword);
        return $builder->get();
    }

    public function comp_keyword($keyword, $id){
        $builder = $this->db->table('lowongan');
        $builder->select('*');
        $builder->where('id_perusahaan', $id);
        $builder->like('gaji', $keyword);
        $builder->orLike('posisi', $keyword);
        $builder->orLike('job_desk', $keyword);
        $builder->orLike('tipe_kontrak', $keyword);
        $builder->orLike('pendidikan_terakhir', $keyword);
        $builder->orLike('pengalaman_kerja', $keyword);
        return $builder->get();
    }

}
