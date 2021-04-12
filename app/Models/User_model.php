<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class User_model extends Model
{
     
    public function getUser($user,$pass)
    {   
    	
        $builder = $this->db->table('users'); // menentukan tabel
        $builder->select('*'); // menentukan colom
        $builder->where(array('email_user' => $user, 'pass_user' => $pass));  //where ini sebagai conditional
        $query = $builder->get(); // untuk eksekusi
        return $query;
    }   
}