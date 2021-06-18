<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('index_home', [
            'title' => 'Halaman Home',
            'content' => 'Ini adalah halaman home yang merupakan halaman utama.'
        ]);
	}
}
