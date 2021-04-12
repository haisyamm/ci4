<?php

namespace App\Controllers;

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
}
