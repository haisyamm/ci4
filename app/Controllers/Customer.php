<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Customer_model;
 
class Customer extends BaseController
{
	public function index()
	{
        $logged = session()->get('logged_in');
        
        if ($logged == TRUE) {

            $model = new Customer_model();
            $data['satuan']  = $model->getSatuan()->getResult();

            echo template('view_Customer', $data);
            
        } else {

            return redirect()->to('/auth');
        }
    }

    public function getCustomer()
    {
        

        $model = new Customer_model();
        $data  = $model->getCustomer()->getResult();

        echo json_encode($data);
    }

	public function input()
	{

		$model = new Customer_model();
        $data['satuan']  = $model->getSatuan()->getResult();

		echo view('layout/header');
		echo view('form_Customer', $data);
		echo view('layout/footer');
	}

	public function save()
    {
        $model = new Customer_model();
        $data = array(
            'name_Customer'        => $this->request->getPost('namaCustomer'),
            'beli_Customer'       => $this->request->getPost('hargabeli'),
            'jual_Customer' => $this->request->getPost('hargajual'),
            'stok_Customer' => $this->request->getPost('stock'),
            'satuan_id' => $this->request->getPost('satuan'),
            'ket_Customer' => $this->request->getPost('keterangan')
        );
        $data = $model->saveCustomer($data);
        echo json_encode($data);
    }

    public function editCustomer()
    {
        $model = new Customer_model();
        $id = $this->request->getPost('idCustomer'); // dikirim dari :data{idCustomer:idCustomer} ajax
        $data = $model->editCustomer($id)->getResult();
        echo json_encode($data);
    }

    public function updateCustomer()
    {
        $model = new Customer_model();
        $data = array(
            'name_Customer'        => $this->request->getPost('namaCustomer'),
            'beli_Customer'       => $this->request->getPost('hargabeli'),
            'jual_Customer' => $this->request->getPost('hargajual'),
            'stok_Customer' => $this->request->getPost('stock'),
            'satuan_id' => $this->request->getPost('satuan'),
            'ket_Customer' => $this->request->getPost('keterangan')
        );
        $data = $model->saveCustomer($data);
        echo json_encode($data);
    }

    public function delete()
    {
        $model = new Customer_model();
        $id = $this->request->getPost('idCustomer'); // dikirim dari :data{idCustomer:idCustomer} ajax
        $data = $model->deleteCustomer($id);
        echo json_encode($data);
    }
 
}
