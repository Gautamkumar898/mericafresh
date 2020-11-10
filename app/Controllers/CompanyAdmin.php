<?php

namespace App\Controllers;

class CompanyAdmin extends BaseController
{

    public function index()
    {
        $data['title'] = "Company Dashboard";
        echo  view('Common/bootstrap', $data);
        $data['pageName'] = 'dashboard';
        echo  view('Admin/start', $data);
    }

    public function farmer_login()
    {
        $data['title'] = 'Company  Login';
        echo view('Common/bootstrap');
        echo view('Admin/login', $data);
    }
    public function email_verify()
    {
        $data['title'] = 'Forget  password';
        echo view('Common/bootstrap');
        echo view('Admin/email_verify', $data);
    }

    public function forget_password()
    {
        $data['title'] = 'Forget  password';
        echo view('Common/bootstrap');
        echo view('Admin/forget_password', $data);
    }

}
