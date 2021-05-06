<?php

namespace App\Controllers;

use App\Models\Retur_model;

class Laporan extends BaseController
{

	public function index()
	{
		$logged = session()->get('logged_in');
		
		if ($logged == TRUE) {

			$data['menu'] = '';
			echo template('form_laporan', $data);
			
		} else {

			return redirect()->to('/auth');
		}
		
	}

	public function transaksi()
    {
      
		$model = new Retur_model();
        $awal = $this->request->getPost('tglawal');
        $akhir = $this->request->getPost('tglakhir');
        $data = $model->LaporanRetur($awal,$akhir)->getResult();
        echo json_encode($data);
    }

}
