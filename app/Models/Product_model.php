<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Product_model extends Model
{
     
    public function getProduct()
    {
        $builder = $this->db->table('products');
        $builder->select('*');
        return $builder->get();
    }
 
    public function getSatuan()
    {
        $builder = $this->db->table('satuans');
        $builder->select('*');
        return $builder->get();
    }

     public function saveProduct($data){
        $query = $this->db->table('products')->insert($data);
        return $query;
    }
 
    public function editProduct($id)
    {   
        $builder = $this->db->table('products'); // menentukan tabel
        $builder->select('*'); // menentukan colom
        $builder->where('id_product', $id);  //where ini sebagai conditional
        $query = $builder->get(); // untuk eksekusi
        return $query;
    }

    public function updateProduct($data, $id)
    {
        $query = $this->db->table('products')->update($data, array('id_product' => $id));
        return $query;
    }
 
    public function deleteProduct($id)
    {
        $query = $this->db->table('products')->delete(array('id_product' => $id));
        return $query;
    } 
   
}