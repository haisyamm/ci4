<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Retur_model extends Model
{
     
    public function LaporanRetur($awal,$akhir)
    {   
        $builder = $this->db->table('retur'); // menentukan tabel
        $builder->select('*'); // menentukan colom
        $builder->where('tgl_retur >=', $awal);
        $builder->where('tgl_retur <=', $akhir);
        $query = $builder->get(); // untuk eksekusi
        return $query;
    }

    public function saveRetur($data){
        $query = $this->db->table('retur')->insert($data);
        return $query;
    }
    public function saveDetailRetur($data){
        $query = $this->db->table('retur_details')->insert($data);
        return $query;
    }
}