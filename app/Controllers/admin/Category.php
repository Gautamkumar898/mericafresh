<?php

namespace App\Controllers;

use App\Models\SuperModel;
use App\Models\CategoryModel;
use App\Models\SubcategoryModel;
use CodeIgniter\Controller;

class Category extends BaseController
{
    
    public function category_page()
    {
        
        $session = session();
        if (!$session->has('admin_id')) {
            return redirect()->to('super-admin-login');
        }
        $data['title'] = ' Category page';
        $data['pageName'] = 'add_category';
        echo  view('SuperAdmin/start', $data);
    }
    // Insert category
    public function insert_category()
    {
        $category = new CategoryModel();
        $session = session();
        if (!$session->has('admin_id')) {
            return redirect()->to('super-admin-login');
        }
        $data = array(
            'category_name' => $this->request->getVar('category'),
            'added_by' => $session->get('admin_id'),
            'category_status' => '0',
            'created_at' => date('Y-m-d'),
        );

        $res =  $category->insert($data);
        if ($res) {
            $session->setFlashdata('msgS', 'New Category Add Successfully  !!!');
            return redirect()->to('category-page');
        } else {
            $session->setFlashdata('msgE', 'Failed !!!');
            return redirect()->to('category-page');
        }
    }
    public function update_category(){

    }
    #list
    public function listOfCategory()
    {
        $category = new CategoryModel();
        $data['category'] = $category->where('category_status', '0')->findAll();
        $data['title'] = 'List of Category';
        $data['pageName'] = 'listofCategory';
        echo  view('SuperAdmin/start', $data);
    }
}