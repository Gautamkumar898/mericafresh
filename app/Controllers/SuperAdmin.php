<?php

namespace App\Controllers;

use App\Models\SuperModel;
use App\Models\CategoryModel;
use App\Models\FarmeraddressModel;
use App\Models\FarmerModel;
use App\Models\ProductModel;
use App\Models\FarmerProductModel;
use App\Models\SubcategoryModel;
use CodeIgniter\Controller;

class Superadmin extends BaseController
{
    public function __construct()
    {
        $session = session();
    }
    public function index()
    {
        $session = session();
        if (!$session->has('admin_id')) {
            return redirect()->to(base_url('super-admin-login'));
        }
        $category = new CategoryModel();
        $product = new ProductModel();
        $farmer = new FarmerModel();
        $data['farmer'] = $farmer->top_farmer();
        $total_farmer = $farmer->findAll();
        $data['t_farmer'] = count($total_farmer);
        $total_product = $product->findAll();
        $data['t_product'] = count($total_product);
        $data['farmerList'] = $farmer->farmer_list();
        $data['farmerProductList']=$farmer->getAllFarmer();
        $data['category'] = $category->where('category_status', '0')->findAll();
        $data['title'] = 'Super Admin';
        $data['pageName'] = 'dashboard';
        echo  view('Superadmin/start', $data);
    }

    //Admin Login 
    public function  authenticate()
    {
        $superModel = new SuperModel();
        $session = session();
        $result = $superModel->where('admin_email', trim($this->request->getVar('email')))->where('admin_password', trim(md5($this->request->getVar('password'))))->first();
        if ($result != null) {
            if ($result['admin_password'] == trim(md5($this->request->getVar('password')))) {
                $session->set('admin_name', $result['admin_name']);
                $session->set('admin_id', $result['admin_id']);
                return redirect()->to(base_url('admin-dashboard'));
            } else {
                $session->setFlashdata('msgE', 'Password Not Match ');
                return redirect()->to(base_url('super-admin-login'));
            }
        } else {
            $session->setFlashdata('msgE', 'Email-Id and password Wrong !!!');
            return redirect()->to(base_url('super-admin-login'));
        }
    }
    //Change Password
    public function admin_change_password()
    {
        $data['title'] = 'Update Password';
        $data['pageName'] = 'change_password';
        echo  view('Superadmin/start', $data);
    }
    //Updated password

    public function  update_password()
    {
        $session = session();
        if (!$session->has('admin_id')) {
            return redirect()->to(base_url('super-admin-login'));
        }
        $superModel = new SuperModel();
        echo  $old_pass = md5($this->request->getVar('old_pass'));
        $new_pass = md5($this->request->getVar('new_pass'));
        $confirm_pass = md5($this->request->getVar('confirm_pass'));
        $id = $session->get('admin_id');
        $pass = $superModel->where('admin_id', $id)->where('admin_password', $old_pass)->first();

        if ($pass['amdin_password'] = $old_pass) {
            $data = array(
                'admin_password' => $new_pass,
                'updated_at' => date('Y-m-d')
            );
            $res =  $superModel->update($id, $data);
            if ($res) {
                $session->setFlashdata('msgS', 'Password Updated Successfully  !!!');
                return redirect()->to(base_url('admin-change-password'));
            } else {
                $session->setFlashdata('msgE', 'Update Failed !!!');
                return redirect()->to(base_url('admin-change-password'));
            }
        } else {
            $session->setFlashdata('msgE', ' Old Password Not Match !!!');
            return redirect()->to(base_url('admin-change-password'));
        }
    }
    //Logout Session 
    public function admin_logout()
    {
        $session = session();
        $session->remove('admin_id');
        $session->remove('admin_name');
        return redirect()->to(base_url('super-admin-login'));
    }
    public function super_adminlogin()
    {
        $data['title'] = 'Admin Login';
        echo  view('Common/bootstrap');
        echo  view('Superadmin/login', $data);
    }

    public function category_page()
    {
        $session = session();
        if (!$session->has('admin_id')) {
            return redirect()->to(base_url('super-admin-login'));
        }
        $data['title'] = ' Category page';
        $data['pageName'] = 'add_category';
        echo  view('Superadmin/start', $data);
    }
    // Insert category
    public function insert_category()
    {
        $id = $this->request->getVar('category_id');

        $category = new CategoryModel();
        $session = session();
        if (!$session->has('admin_id')) {
            return redirect()->to(base_url('super-admin-login'));
        }
        if (isset($id) && !empty($id)) {
            $data = array(
                'category_name' => $this->request->getVar('category'),
                'added_by' => $session->get('admin_id'),
                'category_status' => '0',
                'updated_at' => date('Y-m-d'),
            );

            $res =  $category->update($id, $data);
            if ($res) {
                $session->setFlashdata('msgS', 'Category Updated Successfully  !!!');
                return redirect()->to('category-list');
            } else {
                $session->setFlashdata('msgE', 'Update Failed !!!');
                return redirect()->to(base_url('category-list'));
            }
        } else {
            $data = array(
                'category_name' => $this->request->getVar('category'),
                'added_by' => $session->get('admin_id'),
                'category_status' => '0',
                'created_at' => date('Y-m-d'),
            );
            $res =  $category->insert($data);
            if ($res) {
                $session->setFlashdata('msgS', 'New Category Add Successfully  !!!');
                return redirect()->to(base_url('category-list'));
            } else {
                $session->setFlashdata('msgE', 'Failed !!!');
                return redirect()->to(base_url('category-list'));
            }
        }
    }
    //Edit category 

    public function edit_category($id = null)
    {
        $session = session();
        $category = new CategoryModel();
        $data['category'] = $category->where('category_status', '0')->orderBy('category_id', 'DESC')->findAll();
        $data['category_update'] = $category->where('category_id', $id)->first();
        $data['title'] = "Edit Category";
        $data['pageName'] = 'listofCategory';
        echo view('Superadmin/start', $data);
    }

    //Deletet category
    public function delete_category($id = null)
    {
        echo $id;
        $session = session();
        $category = new CategoryModel();
        $res = $category->where('category_id', $id)->delete();
        if ($res) {
            $session->setFlashdata('msgS', 'Category Deleted !!!');
            return redirect()->to(base_url('category-list'));
        } else {
            $session->setFlashdata('msgE', 'Delete Failed !!!');
            return redirect()->to(base_url('category-list'));
        }
    }
    #list
    public function listOfCategory()
    {
        $category = new CategoryModel();
        $data['category'] = $category->where('category_status', '0')->orderBy('category_id', 'DESC')->findAll();
        $data['title'] = 'List of Category';
        $data['pageName'] = 'listofCategory';
        echo  view('Superadmin/start', $data);
    }

    # Farmer 
    public function addfarmer_page()
    {

        $category = new CategoryModel();
        $product = new ProductModel();
        $session = session();
        if (!$session->has('admin_id')) {
            return redirect()->to(base_url('super-admin-login'));
        }
        $data['allproductname'] = $product->select('p_id,product_name')->FindAll();
        $data['title'] = 'Add Farmer';
        $data['pageName'] = 'add_farmer';
        echo  view('Superadmin/start', $data);
    }

    public function getCountyStateByZipCode()
    {
        $zipCode = $this->request->getVar('zip_code');
        $url = base_url(); //url
        //$zipCode = 603;
        $usCities = file_get_contents($url . '/assets/USCities.json');
        $usCitiesArr = json_decode($usCities);

        foreach ($usCitiesArr as $item) {
            if ($item->zip_code == $zipCode) {
                echo json_encode($item);
            }
        }
    }

    //Insert Farmer 
    public function insert_farmer()
    {
        $farmer = new FarmerModel();
        $address = new FarmeraddressModel();
        $farmer_product = new  FarmerProductModel();
        $session = session();
        if (!$session->has('admin_id')) {
            return redirect()->to(base_url('super-admin-login'));
        }

        $id = $this->request->getVar('farmer_id');
        $address_id = $this->request->getVar('address_id');

        if (isset($id) && !empty($id)) {
            $data = array(
                'farmer_name' => $this->request->getVar('farmerName'),
                'farmer_email' => $this->request->getVar('farmerEmail'),
                'farmer_phone' => $this->request->getVar('farmerPhone'),
                'farmer_website' => $this->request->getVar('farmerWebsite'),
                'farmer_owner' => $this->request->getVar('farmerOwner'),
                'farmer_mobile' => $this->request->getVar('farmerMobile'),
                'fb_url' => $this->request->getVar('fb_url'),
                'instagram_url' => $this->request->getVar('instagram_url'),
                'farmer_bussiness_type' => $this->request->getVar('bussines_type'),
                'farmer_status' => '0',
                'updated_at' => date('Y-m-d'),
            );

            $res = $farmer->update($id, $data);
            $update_address = array(
                'farmer_country' => $this->request->getVar('farmerCountry'),
                'farmer_state' => $this->request->getVar('farmerState'),
                'farmer_city' => $this->request->getVar('farmerCity'),
                'farmer_address' => $this->request->getVar('farmerAddress'),
                'farmer_zip' => $this->request->getVar('farmerZip'),
                'updated_at' => date('Y-m-d'),
                'added_by' => $session->get('admin_id')
            );

            // print_r($update_address);

            $newres = $address->update($address_id, $update_address);

            //farmer product 
            
            $total_produce = $this->request->getVar('farmerProduce');
            $delete_product = $farmer_product->where('f_id', $id)->delete();
            if(isset($total_produce)){
            count($total_produce); //count 
            for ($i = 0; $i < count($total_produce); $i++) {
                $data = array(
                    'f_id' => $id,
                    'product_id' => $total_produce[$i],
                    'updated_at' => date('Y-m-d'),
                    'created_at' => date('Y-m-d'),
                    'added_by' => $session->get('admin_id')
                );

                $farmer = $farmer_product->insert($data);
            }
        }


            if ($res) {
                $session->setFlashdata('msgS', '  Updated Successfully  !!!');
                return redirect()->to(base_url('farmer-list'));
            } else {
                $session->setFlashdata('msgE', 'Failed !!!');
                return redirect()->to(base_url('farmer-list'));
            }
        } else {
            //$user_id = $product->getInsertID();
            $email = $this->request->getVar('farmerEmail');
            $result = $farmer->where('farmer_email', $email)->first();
            if ($result['farmer_email'] == $email) {
                $session->setFlashdata('msgE', 'Email Id Already Register  !!!');
                return redirect()->to(base_url('add-farmer'));
            } else {
                $farmer = new FarmerModel();
                $address = new FarmeraddressModel();
                $result =    $farmer->select('f_id')->orderBy('f_id', 'DESC')->Limit(1)->first();
                if (!empty($result)) {

                    $last_id = $result['f_id'];
                    //$last_data = 4;
                    $last_id += 1;
                    $value1 = "MERICA" . sprintf('%04s', $last_id);
                } else {
                    $last_id = 1;
                    $value1 = "MERICA" . sprintf('%04s', $last_id);
                }

                $data = array(
                    'farmer_id' => $value1,
                    'farmer_name' => $this->request->getVar('farmerName'),
                    'farmer_email' => $this->request->getVar('farmerEmail'),
                    'farmer_phone' => $this->request->getVar('farmerPhone'),
                    'farmer_website' => $this->request->getVar('farmerWebsite'),
                    'farmer_owner' => $this->request->getVar('farmerOwner'),
                    'farmer_mobile' => $this->request->getVar('farmerMobile'),
                    'fb_url' => $this->request->getVar('fb_url'),
                    'instagram_url' => $this->request->getVar('instagram_url'),
                    'farmer_bussiness_type' => $this->request->getVar('bussines_type'),
                    'farmer_status' => '0',
                    'created_at' => date('Y-m-d'),
                    'added_by' => $session->get('admin_id')
                );
                // print_r($data);
                // die;
                $res = $farmer->insert($data);
                $f_id = $farmer->insertID();

                //Address
                $address_data = array(
                    'f_id' => $f_id,
                    'farmer_country' => $this->request->getVar('farmerCountry'),
                    'farmer_state' => $this->request->getVar('farmerState'),
                    'farmer_city' => $this->request->getVar('farmerCity'),
                    'farmer_address' => $this->request->getVar('farmerAddress'),
                    'farmer_zip' => $this->request->getVar('farmerZip'),
                    'created_at' => date('Y-m-d'),
                    'added_by' => $session->get('admin_id')
                );
                $newres = $address->insert($address_data);
                //produce
                $total_produce = $this->request->getVar('farmerProduce');
                //print_r(($total_produce));
                count($total_produce);
                for ($i = 0; $i < count($total_produce); $i++) {
                    $data = array(
                        'f_id' => $f_id,
                        'product_id' => $total_produce[$i],
                        'created_at' => date('Y-m-d'),
                        'added_by' => $session->get('admin_id')
                    );
                    //print_r($product_data);
                    $insted_product = $farmer_product->insert($data);
                }

                if ($newres) {
                    $session->setFlashdata('msgS', 'Farmer Register Successfully !!!');
                    return redirect()->to(base_url('add-farmer'));
                } else {
                    $session->setFlashdata('msgE', 'Registration Failed  !!!');
                    return redirect()->to(base_url('add-farmer'));
                }
            }
        }
    }

    #edit
    public function edit_farmer($id = null)
    {
        $session = session();
        if (!$session->has('admin_id')) {
            return redirect()->to(base_url('super-admin-login'));
        }
        $farmer = new FarmerModel();
        $address = new FarmeraddressModel();
        $product = new ProductModel();
        $data['edit_farmer'] = $farmer->getEditdata($id);

        $data['allproductname'] = $product->select('p_id,product_name')->FindAll();

        $data['title'] = "Edit Farmer";
        $data['pageName'] = 'add_farmer';
        echo view('Superadmin/start', $data);
    }

    #Delete Farmer

    public function delete_farmer($id = null)
    {
        $session = session();
        if (!$session->has('admin_id')) {
            return redirect()->to(base_url('super-admin-login'));
        }
        $farmer = new FarmerModel();
        $address = new FarmeraddressModel();
        $data = array(
            'farmer_status' => '1'
        );
        $res = $farmer->update($id, $data);
        if ($res) {
            $session->setFlashdata('msgS', 'Farmer Account UnActive !!!');
            return redirect()->to(base_url('farmer-list'));
        } else {
            $session->setFlashdata('msgE', ' Failed Try Again !!!');
            return redirect()->to(base_url('farmer-list'));
        }
    }


    #list of Farmer
    public function listOffarmer()
    {
        $session = session();
        if (!$session->has('admin_id')) {
            return redirect()->to(base_url('super-admin-login'));
        }
        $farmer = new FarmerModel();
        $address = new FarmeraddressModel();
        $product=new ProductModel();
        $data['farmerList'] = $farmer->farmer_list();
        $data['farmerProductList']=$farmer->getAllFarmer();
        $data['title'] = 'Farmer List';
        $data['pageName'] = 'listOffarmer';
        echo  view('Superadmin/start', $data);
    }


    //Update farmer list
    public function update_farmer()
    {
        $farmer = new FarmerModel();
        $product = new ProductModel();
        $address = new FarmeraddressModel();
        $data['farmerList'] = $farmer->select('f_id,farmer_name')->where('farmer_status','0')->FindAll();
        $data['allproductname'] = $product->select('p_id,product_name')->FindAll();
        $data['title'] = "Update Farmer's  Data ";
        $data['pageName'] = 'update_farmer';
        echo  view('Superadmin/start', $data);
    }
    //get farmer data 

    public function get_farmer_details()
    {
        $session = session();
          $id = $this->request->getVar('farmer_id');
       

        $farmer = new FarmerModel();
        $product = new ProductModel();
        $address = new FarmeraddressModel();
        if ($id == '0') {

            $session->setFlashdata('msgE', '  Select Farmer  !!!');
            return redirect()->to(base_url(''));
        }
        $data['farmerList'] = $farmer->select('f_id,farmer_name')->where('farmer_status','0')->FindAll();
        $data['allproductname'] = $product->select('p_id,product_name')->FindAll();
        $data['edit_farmer'] = $farmer->getEditdata($id);
        // print_r($data['edit_farmer']);
        // die;


        $data['title'] = "Update Farmer's  Data ";
        $data['pageName'] = 'update_farmer';
        echo   view('Superadmin/start', $data);
    }

    //Update data 
    public function update_farmerdata()
    {
        $farmer = new FarmerModel();
        $address = new FarmeraddressModel();
        $farmer_product = new FarmerProductModel();
        $session = session();
        if (!$session->has('admin_id')) {
            return redirect()->to(base_url('super-admin-login'));
        }


        $id = $this->request->getVar('farmer_id');
        $address_id = $this->request->getVar('address_id');

        if (isset($id) && !empty($id)) {
            $data = array(
                'farmer_name' => $this->request->getVar('farmerName'),
                'farmer_email' => $this->request->getVar('farmerEmail'),
                'farmer_phone' => $this->request->getVar('farmerPhone'),
                'farmer_website' => $this->request->getVar('farmerWebsite'),
                'farmer_owner' => $this->request->getVar('farmerOwner'),
                'farmer_mobile' => $this->request->getVar('farmerMobile'),
                'fb_url' => $this->request->getVar('fb_url'),
                'instagram_url' => $this->request->getVar('instagram_url'),
                'farmer_bussiness_type' => $this->request->getVar('bussines_type'),
                'farmer_status' => '0',
                'updated_at' => date('Y-m-d'),
            );

            $res = $farmer->update($id, $data);
            $update_address = array(
                'farmer_country' => $this->request->getVar('farmerCountry'),
                'farmer_state' => $this->request->getVar('farmerState'),
                'farmer_city' => $this->request->getVar('farmerCity'),
                'farmer_address' => $this->request->getVar('farmerAddress'),
                'farmer_zip' => $this->request->getVar('farmerZip'),
                'updated_at' => date('Y-m-d'),
                'added_by' => $session->get('admin_id')
            );

            // print_r($update_address);

            $newres = $address->update($address_id, $update_address);

            //farmer product 
            $total_produce = $this->request->getVar('farmerProduce');
            count($total_produce); //count 
            $delete_product = $farmer_product->where('f_id', $id)->delete();

            for ($i = 0; $i < count($total_produce); $i++) {
                $data = array(
                    'f_id' => $id,
                    'product_id' => $total_produce[$i],
                    'updated_at' => date('Y-m-d'),
                    'created_at' => date('Y-m-d'),
                    'added_by' => $session->get('admin_id')
                );

                $farmer = $farmer_product->insert($data);
            }


            if ($res) {
                $session->setFlashdata('msgS', '  Updated Successfully  !!!');
                return redirect()->to(base_url('farmer-list'));
            } else {
                $session->setFlashdata('msgE', 'Failed !!!');
                return redirect()->to(base_url('farmer-list'));
            }
        }
    }

    //admin profile
    public function admin_profile()
    {

        $session = session();
        if (!$session->has('admin_id')) {
            return redirect()->to(base_url('super-admin-login'));
        }
        $admin = new SuperModel();
        $admin_id = $session->get('admin_id');
        $data['admin'] = $admin->where('admin_id', $admin_id)->first();

        $data['title'] = "Admin Profile ";
        $data['pageName'] = 'update_profile';
        echo  view('Superadmin/start', $data);
    }
    public function update_admin_profile()
    {
        $session = session();
        if (!$session->has('admin_id')) {
            return redirect()->to(base_url('super-admin-login'));
        }
        $admin = new SuperModel();
        $data = array(
            'admin_name' => $this->request->getVar('adminName'),
            'admin_email' => $this->request->getVar('adminEmail'),
            'updated_at' => date('Y-m-d')
        );
        $id = $session->get('admin_id');
        $newres = $admin->update($id, $data);

        if ($newres) {
            $session->setFlashdata('msgS', '  Updated Successfully  !!!');
            return redirect()->to(base_url('SuperAdmin/admin_profile'));
        } else {
            $session->setFlashdata('msgE', 'Failed !!!');
            return redirect()->to(base_url('SuperAdmin/admin_profile'));
        }
    }
}
