<?php

namespace App\Controllers;

class Home extends BaseController
{

	public function index()
	{
		$logged = session()->get('logged_in');
		
		if ($logged == TRUE) {

			$data['menu'] = '';
			echo template('Dashboard', $data);
			
		} else {

			return redirect()->to('/auth');
		}
		
	}
}
