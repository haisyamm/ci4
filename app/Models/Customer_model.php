<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Customer_model extends Model
{
     
    public function getCustomer()
    {
        $builder = $this->db->table('customers');
        $builder->select('*');
        return $builder->get();
    }
 
    public function getSatuan()
    {
        $builder = $this->db->table('satuans');
        $builder->select('*');
        return $builder->get();
    }

     public function saveCustomer($data){
        $query = $this->db->table('customers')->insert($data);
        return $query;
    }
 
    public function editCustomer($id)
    {   
        $builder = $this->db->table('customers'); // menentukan tabel
        $builder->select('*'); // menentukan colom
        $builder->where('id_Customer', $id);  //where ini sebagai conditional
        $query = $builder->get(); // untuk eksekusi
        return $query;
    }

    public function updateCustomer($data, $id)
    {
        $query = $this->db->table('customers')->update($data, array('id_Customer' => $id));
        return $query;
    }
 
    public function deleteCustomer($id)
    {
        $query = $this->db->table('customers')->delete(array('id_Customer' => $id));
        return $query;
    } 
   
}