<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Product_model;
 
class Product extends BaseController
{
	public function index()
	{
        $logged = session()->get('logged_in');
        
        if ($logged == TRUE) {

            $model = new Product_model();
            $data['satuan']  = $model->getSatuan()->getResult();

            echo template('view_product', $data);
            
        } else {

            return redirect()->to('/auth');
        }
    }

    public function getProduct()
    {
        

        $model = new Product_model();
        $data  = $model->getProduct()->getResult();

        echo json_encode($data);
    }

	public function input()
	{

		$model = new Product_model();
        $data['satuan']  = $model->getSatuan()->getResult();

		echo view('layout/header');
		echo view('form_product', $data);
		echo view('layout/footer');
	}

	public function save()
    {
        $model = new Product_model();
        $data = array(
            'name_product'        => $this->request->getPost('namaproduct'),
            'beli_product'       => $this->request->getPost('hargabeli'),
            'jual_product' => $this->request->getPost('hargajual'),
            'stok_product' => $this->request->getPost('stock'),
            'satuan_id' => $this->request->getPost('satuan'),
            'ket_product' => $this->request->getPost('keterangan')
        );
        $data = $model->saveProduct($data);
        echo json_encode($data);
    }

    public function editProduct()
    {
        $model = new Product_model();
        $id = $this->request->getPost('idproduct'); // dikirim dari :data{idproduct:idproduct} ajax
        $data = $model->editProduct($id)->getResult();
        echo json_encode($data);
    }

    public function updateProduct()
    {
        $model = new Product_model();
        $data = array(
            'name_product'        => $this->request->getPost('namaproduct'),
            'beli_product'       => $this->request->getPost('hargabeli'),
            'jual_product' => $this->request->getPost('hargajual'),
            'stok_product' => $this->request->getPost('stock'),
            'satuan_id' => $this->request->getPost('satuan'),
            'ket_product' => $this->request->getPost('keterangan')
        );
        $data = $model->saveProduct($data);
        echo json_encode($data);
    }

    public function delete()
    {
        $model = new Product_model();
        $id = $this->request->getPost('idproduct'); // dikirim dari :data{idproduct:idproduct} ajax
        $data = $model->deleteProduct($id);
        echo json_encode($data);
    }
 
}
