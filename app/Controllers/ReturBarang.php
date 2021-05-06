<?php

namespace App\Controllers;

use App\Models\Retur_model;

class ReturBarang extends BaseController
{

	public function index()
	{
		$logged = session()->get('logged_in');
		
		if ($logged == TRUE) {

			$data['menu'] = '';
			echo template('form_transaksi', $data);
			
		} else {

			return redirect()->to('/auth');
		}
		
	}

	public function save()
    {
      
        

		$model = new Retur_model();
		//$pmodel = new Product_model();

		$baris = $this->request->getPost('baris');
		$no = '23';
		$dataHeader = array(
			'id_retur'        => $no,
			'tgl_retur'       => $this->request->getPost('tglretur'),
			'jenis_retur'        => $this->request->getPost('namacustomer'),
			'alasan_retur' => $this->request->getPost('catatan'),
			'total_retur' => $this->request->getPost('Total')
			
		);
		$data = $model->saveRetur($dataHeader);

		for ($i=1; $i <= $baris ; $i++) { 
		$dataDetail = array(
			'retur_id'        => $no,
			'product_id'       => $this->request->getPost('idproduct'.$i),
			'product_name'        => $this->request->getPost('nameproduct'.$i),
			'product_price' => $this->request->getPost('harga'.$i),
			'product_qty' => $this->request->getPost('jumlah_beli'.$i)
		);
		$data = $model->saveDetailRetur($dataDetail);

		//$data = $model->kurangiStock($dataDetail);
		}
		
		if($data){

			echo '200';

        } else {
            
            echo '300';

        }

    }
}
