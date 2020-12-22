<?php

namespace App\Controllers;

use App\Models\SuperModel;
use App\Models\CategoryModel;
use App\Models\FarmeraddressModel;
use App\Models\FarmerModel;
use CodeIgniter\Controller;
use App\Models\ProductModel;
use App\Models\ProduceImageModel;


class ProductController extends BaseController
{

    #form addproduct
    public function addproduct_page()
    {
        $category = new CategoryModel();
        $session = session();
        if (!$session->has('admin_id')) {
            return redirect()->to(base_url('super-admin-login'));
        }
        $data['category'] = $category->where('category_status', '0')->findAll();
        $data['title'] = 'Add Produce';
        $data['active'] = 'Add Produce';
        $data['pageName'] = 'add_product';
        echo  view('Superadmin/start', $data);
    }

    //Insert 
    public function insert_product()
    {
        $category = new CategoryModel();
        $product = new ProductModel();
        $session = session();
        $extraadd = $this->request->getVar('extraadd');
        if (!$session->has('admin_id')) {
            return redirect()->to(base_url('super-admin-login'));
        }
        $id = $this->request->getVar('product_id');
        if (isset($id) && !empty($id)) {
             $image1 = $this->request->getFile('productImage1');
             if($image1==''){
                $data = array(
                    'product_name' => $this->request->getVar('productName'),
                    'product_category' => $this->request->getVar('productCategory'),
                    'product_status' => '0',
                    'updated_at' => date('Y-m-d'),
                    'added_by' => $session->get('admin_id')
                );
             }
             else{
                //  echo "Hii";
                //  die;
                if ($image1->isValid()) {
                    $file1 = $image1->getClientName();
                    $image1->move('./public/upload');
                }
            $data = array(
                'product_name' => $this->request->getVar('productName'),
                'product_category' => $this->request->getVar('productCategory'),
                'product_image1' => $file1,
                'product_status' => '0',
                'updated_at' => date('Y-m-d'),
                'added_by' => $session->get('admin_id')
            );
        }
            $res = $product->update($id, $data);
            if ($res) {
                $session->setFlashdata('msgS', ' Produce Updated Successfully  !!!');
                return redirect()->to(base_url('product-list'));
            } else {
                $session->setFlashdata('msgE', 'Update Failed !!!');
                return redirect()->to(base_url('product-list'));
            }
        
        } else {

            $product_name = trim($this->request->getVar('productName'));
            $product_category = $this->request->getVar('productCategory');
            $result = $product->where('product_name', $product_name)->where('product_category', $product_category)->first();
            if ($result['product_name'] == $product_name) {
                $session->setFlashdata('msgE', 'Produce Already Available !!!');
                return redirect()->to(base_url('product-list'));
            } else {
                   $image1 = $this->request->getFile('productImage1');

                if ($image1->isValid()) {
                    $image1->move('./public/upload');
                }
                $file1 = $image1->getClientName();
                $data = array(
                    'product_name' => trim($this->request->getVar('productName')),
                    'product_category' => $this->request->getVar('productCategory'),
                    'product_image1' => $file1,
                    'product_status' => '0',
                    'created_at' => date('Y-m-d'),
                    'added_by' => $session->get('admin_id')

                );
                // print_r($data);
                // die;
                $res = $product->insert($data);
                if ($res) {
                    $session->setFlashdata('msgS', ' Produce added Successfully  !!!');
                    return redirect()->to(base_url('product-list'));
                } else {
                    $session->setFlashdata('msgE', 'Failed !!!');
                    return redirect()->to(base_url('product-list'));
                }
            }
        }
    }
    //Model Produce name 
    public function extraadd()
    {
        $category = new CategoryModel();
        $product = new ProductModel();
        $session = session();
        $extraadd = $this->request->getVar('extraadd');
        if (!$session->has('admin_id')) {
            return redirect()->to(base_url('super-admin-login'));
        }

        $user_id=trim($this->request->getVar('user_id'));
        if ($extraadd == '1') {
            $product_name = trim($this->request->getVar('productName'));
            $product_category = $this->request->getVar('productCategory');
            $result = $product->where('product_name', $product_name)->where('product_category', $product_category)->first();
            if ($result['product_name'] == $product_name) {
                $session->setFlashdata('msgE', 'Produce Already Available !!!');
                return redirect()->to(base_url('updateuser-produce'));
            } else {
                $image1 = $this->request->getFile('productImage1');

                if ($image1->isValid()) {
                    $image1->move('./public/upload');
                }
                $file1 = $image1->getClientName();
                $data = array(
                    'product_name' => trim($this->request->getVar('productName')),
                    'product_category' => $this->request->getVar('productCategory'),
                    'product_image1' => $file1,
                    'product_status' => '0',
                    'created_at' => date('Y-m-d'),
                    'added_by' => $session->get('admin_id')

                );
                $res = $product->insert($data);
                if ($res) {
                    $session->setFlashdata('msgS', ' Produce added Successfully  !!!');
                    return redirect()->to(base_url('updateuser-produce/'.$user_id));
                } else {
                    $session->setFlashdata('msgE', 'Failed !!!');
                    return redirect()->to(base_url('updateuser-produce/'.$user_id));
                }
            }
        }
    }

    #edit
    public function edit_product($id = null)
    {
        $session = session();
        if (!$session->has('admin_id')) {
            return redirect()->to(base_url('super-admin-login'));
        }
        $category = new CategoryModel();
        $product = new ProductModel();
        $data['product'] = $product->editProduct($id);

        $data['category'] = $category->where('category_status', '0')->findAll();
        $data['title'] = "Edit Produce";
        $data['pageName'] = 'add_product';
        echo view('Superadmin/start', $data);
    }

    //Delete Product
    public function delete_product($id = null)
    {

        $session = session();
        if (!$session->has('admin_id')) {
            return redirect()->to(base_url('super-admin-login'));
        }

        $product = new ProductModel();

        $res = $product->where('p_id', $id)->delete();
        if ($res) {
            $session->setFlashdata('msgS', 'Produce Deleted !!!');
            return redirect()->to(base_url('product-list'));
        } else {
            $session->setFlashdata('msgE', 'Delete Failed !!!');
            return redirect()->to(base_url('product-list'));
        }
    }

    public function listOfproduct()
    {
        $session = session();
        if (!$session->has('admin_id')) {
            return redirect()->to(base_url('super-admin-login'));
        }

        $category = new CategoryModel();
        $product = new ProductModel();
        $data['product'] = $product->getproduct_detalis();
        $data['active'] = 'Produce list';
        $data['title'] = 'Produce list';
        $data['pageName'] = 'listOfproduct';
        echo  view('Superadmin/start', $data);
    }

    //Farmer list 
    public function farmerProductList()
    {
        $session = session();
        if (!$session->has('admin_id')) {
            return redirect()->to(base_url('super-admin-login'));
        }
        $farmer = new FarmerModel();
        $data['farmerList'] = $farmer->farmer_list();
        $data['farmerProductList'] = $farmer->getAllFarmer();
        $data['allfarmername'] = $farmer->select('f_id,farmer_name')->where('farmer_status', '0')->FindAll();
        $data['active'] = 'User Produce';
        $data['title'] = 'User Produce';
        $data['pageName'] = 'farmer_product';
        echo  view('Superadmin/start', $data);
    }

    public function  farmerProduct()
    {
        $session = session();
        if (!$session->has('admin_id')) {
            return redirect()->to(base_url('super-admin-login'));
        }
        $id = $this->request->getVar('farmerProduce');
        if ($id == '0') {

            $session->setFlashdata('msgE', '  Select Company  !!!');
            return redirect()->to(base_url('farmer-data'));
        }
        $farmer = new FarmerModel();
        $data['farmerProduct'] = $farmer->getFarmerProduct($id);
        if ($data['farmerProduct'] == null) {

            $session->setFlashdata('msgS', '  No Produce Found    Insert Produce !!');
            return redirect()->to(base_url('farmer-data'));
        }
        $data['allfarmername'] = $farmer->select('f_id,farmer_name')->where('farmer_status', '0')->FindAll();
        // $data['farmerList'] = $farmer->farmer_list();
        $data['farmerProductList'] = $farmer->getAllFarmer();
        $data['title'] = 'Farmer  Product';
        $data['active'] = 'User Produce';
        $data['pageName'] = 'farmer_product';
        echo  view('Superadmin/start', $data);
    }
}
