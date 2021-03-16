<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data['menu'] = '';
		echo template('Dashboard', $data);
	}
}
