<?php namespace App\Controllers;
class Home extends BaseController
{
	public function index()
	{
		echo  view('welcome_message');
	}
	public function register_company()
	{
		$data['title']='Register Company ';
		echo  view('register_company');
	}



	//--------------------------------------------------------------------

}
