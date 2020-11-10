<?php

namespace App\Controllers;

use App\Models\SuperModel;
use App\Models\CategoryModel;
use App\Models\SubcategoryModel;
use CodeIgniter\Controller;

class Subcategory extends BaseController
{
    //Subcategory 
    public function insert_subcategory()
    {
        $subcategory = new SubcategoryModel();
        $session = session();
        if (!$session->has('admin_id')) {
            return redirect()->to('super-admin-login');
        }
        $data = array(
            'category_id' => $this->request->getVar('category_id'),
            'subcategory_name' => $this->request->getVar('subcategory'),
            'added_by' => $session->get('admin_id'),
            'subcategory_status' => '0',
        );
        $res =  $subcategory->insert($data);
        if ($res) {
            $session->setFlashdata('msgS', ' Subcategory added Successfully  !!!');
            return redirect()->to('subcategory-page');
        } else {
            $session->setFlashdata('msgE', 'Failed !!!');
            return redirect()->to('subcategory-page');
        }
    }


    public function subcategory_page()
    {
        $category = new CategoryModel();
        $session = session();
        if (!$session->has('admin_id')) {
            return redirect()->to('super-admin-login');
        }
        $data['category'] = $category->where('category_status', '0')->findAll();
        $data['title'] = 'Subcategory';
        $data['pageName'] = 'sub_category';
        echo  view('SuperAdmin/start', $data);
    }
    public function listOfSubcategory()
    {
        $subcategory = new SubcategoryModel();
        $data['subcategory'] = $subcategory->where('subcategory_status', '0')->findAll();
        $data['title'] = 'List of Category';
        $data['pageName'] = 'listofSubcategory';
        echo  view('SuperAdmin/start', $data);
    }
}