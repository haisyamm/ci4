<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User_model;
 
class Auth extends BaseController
{
	public function index()
    {
        $data['menu'] = '';
        echo template_login('login', $data);
    }
public function login()
    {
        $session = session();
        $model = new User_model();
        $user = $this->request->getPost('user');
        $pass = md5($this->request->getPost('pass'));

        $cek = $model->getUser($user,$pass)->getResult();
        

        if(!empty($cek)){

            foreach($cek as $user) {
                $newdata = [
                'nama_lengkap'  => $user->name_user,
                'username'     => $user->email_user,
                'logged_in' => TRUE
                ];

                $session->set($newdata);
               
            }

            echo '200';

        } else {
            
            echo '300';

        }

    }
public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/auth');
    }
   
}
