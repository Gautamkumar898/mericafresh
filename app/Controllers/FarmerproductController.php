<?php

namespace App\Controllers;

use App\Models\SuperModel;
use App\Models\CategoryModel;
use App\Models\FarmeraddressModel;
use App\Models\FarmerModel;
use App\Models\ProductModel;
use App\Models\SubcategoryModel;
use App\Models\ProduceImageModel;
use App\Models\UserProduceModel;
use CodeIgniter\Controller;

class FarmerproductController extends BaseController
{
  public function __construct()
  {
    $session = session();
  }
  public function adduser_produce($user_id = '')
  {

    $user = new FarmerModel();

    $category = new CategoryModel();
    $produce = new ProductModel();
    $session = session();
    if (!$session->has('admin_id')) {
      return redirect()->to(base_url('super-admin-login'));
    }
    if (isset($user_id)) {
      $data['user'] = $user->where('farmer_status', '0')->where('f_id', $user_id)->FindAll();

      $data['produce'] = $produce->where('product_status', '0')->findAll();
      $data['category'] = $category->where('category_status', '0')->findAll();
      $data['title'] = 'Produce Add/Update ';
      $data['js'] = '';

      $data['pageName'] = 'adduser_product';
      $data['active'] = 'Produce Details';
      echo  view('Superadmin/start', $data);
    }
  }


  //category of produce 
  public function  category_by_produce()
  {
    $produce = new ProductModel();
    $category_id = $this->request->getVar('category_id');
    $response['Response'] = $produce->where('product_status', '0')->where('product_category', $category_id)->findAll();
    echo json_encode($response);
  }


  public function addmore_producelist()
  {
    $category = new CategoryModel();
    $produce = new ProductModel();
    $produce_list = $produce->where('product_status', '0')->findAll();
    $categories = $category->where('category_status', '0')->findAll();
    //   <td><select class="form-control select2 user_produce select2-info" id="name" name="produce_id[]" data-dropdown-css-class="select2-info" style="width: 100%;" required>
    //   <option value="0" readonly> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; Produce </option>

    // </select>
    $base = base_url();
    echo ' <tr id="'.$_POST['row_id'].'" >


    <td><select class="form-control select3 select2-info" onchange=" box('.$_POST['row_id'].');" id="produceCategory'.$_POST['row_id'].'" name="produceCategory[]" data-dropdown-css-class="select2-info" style="width: 100%;" required>
                      <option value="0" readonly>  Category </option>
                       ' ?>
                       <?php foreach ($categories as $categorylist) {
                          echo '<option value="' . $categorylist['category_id'] . '">' . $categorylist['category_name'] . '</option>';
                        }
                        echo ' 
                      </select>
                     </td>

    <td><select class="form-control select user_produce select2-info"  id="product_id'.$_POST['row_id'].'" name="produce_id[]" data-dropdown-css-class="select2-info" style="width: 100%;" required>
            <option value="0" readonly>  Produce </option>' ?>

<?php foreach ($produce_list as $producelist) {
      echo '<option value="' . $producelist['p_id'] . '">' . $producelist['product_name'] . '</option>';
    }
    echo ' 
                      </select>
    
                   </td>
                  
                  <td></td> <td><input type="text" name="price[]" id="price" required class="form-control" placeholder="Ex: 45 $ "></td><td><input type="text" name="unitmetrics[]"  id="unitmetrics" class="form-control" required placeholder="Ex:kg/g"></td><td> <input type="text" name="packaging[]" id="packaging" class="form-control" placeholder="Ex:20p"></td>
                   <td><a class="text-danger delete-record" onclick="remove_tr(this)" ><i class="fa fa-trash"></i></a></td</tr>';
  }

  //View 
  public function produce_details()
  {
    $session = session();
    if (!$session->has('admin_id')) {
      return redirect()->to(base_url('super-admin-login'));
    }
    $user = new FarmerModel();
    $data['title'] = 'Produce Details ';
    //$data['farmer'] = $user->where('farmer_status', '0')->FindAll();
    $userproduce = new UserProduceModel();
    $data['farmer'] = $user->farmer_list();
    $data['pageName'] = 'produce_details';
    $data['active'] = 'Produce Details';
    echo  view('Superadmin/start', $data);
  }

  //user wise produce

  public function produceofusers($id = '')
  {
    $session = session();
    if (!$session->has('admin_id')) {
      return redirect()->to(base_url('super-admin-login'));
    }
    $userproduce = new UserProduceModel();

    $data['userproduce'] = $userproduce->userwise_produce($id);
    $data['pageName'] = 'userwise_produce';
    $data['active'] = 'Produce Details';
    echo  view('Superadmin/start', $data);
  }
  //Other Produce 

  public function other_produce()
  {
    $session = session();
    if (!$session->has('admin_id')) {
      return redirect()->to(base_url('super-admin-login'));
    }
    $user = new FarmerModel();
    $data['title'] = 'Other Produce Details ';
    $data['farmer'] = $user->farmer_list();
   
    $data['js'] = '';
    $data['pageName'] = 'other_products';
    $data['active'] = 'Other Product';
    echo  view('Superadmin/start', $data);
  }


//Insert 
  public function insert_user_produce()
  {
    helper(['form', 'url']);
    $userproduce = new  UserProduceModel();
    $produceimage = new ProduceImageModel();
    $session = session();
    if (!$session->has('admin_id')) {
      return redirect()->to(base_url('super-admin-login'));
    }
    $category_id = $this->request->getVar('productCategory');
      $p = $this->request->getVar('produce_id');

    
    $price = $this->request->getVar('price');
    $unit_metrice = $this->request->getVar('unitmetrics');
    $package = $this->request->getVar('packaging');
    // print_r($package);
    // die;
   

        // count( $price);
        // count( $unit_metrice);
        // count( $package);
        $u_id=$this->request->getVar('user_id');
         if($p==null ){
          $session->setFlashdata('msgE', 'Select Category or Produce !!!');
          return redirect()->to(base_url('updateuser-produce/'.$u_id));
         }
         else{
       for($i=0;$i<count($p);$i++){ 
        for($i=0;$i<count($price);$i++){
          for($i=0;$i<count($unit_metrice);$i++){
            for($i=0;$i<count($package);$i++){

        $data=array(
          'user_id'=>$this->request->getVar('user_id'),
          'produce_id'=>$p[$i],
          'price'=>$price[$i],
          'unit_metrics'=>$unit_metrice[$i],
          'packaging'=>$package[$i],
          'status'=>'0',
          'type'=>'0',
          'added_by'=>$session->get('admin_id'),
          'created_at'=>date('Y-m-d')
          );
          echo "<pre>";
          print_r($data);
          
          $res= $userproduce->insert($data);
       }
      }
      }
    }

    if ($res) {
      $session->setFlashdata('msgS', ' Produce added Successfully  !!!');
      return redirect()->to(base_url('produce-details'));
    } else {
      $session->setFlashdata('msgE', 'Failed !!!');
      return redirect()->to(base_url('produce-details'));
    }
         }

  

  //   $product_id = $this->request->getVar('produce_id');
  //   echo  count(   $product_id );
  //  print_r($_FILES['productImage']['name']);
  //  $product_image=$_FILES['productImage']['name'];   
  //    // echo $image = $this->request->getFileMultiple('productImage');
  //   for ($i = 0; $i<count($product_id); $i++) {
  //     $imagedata = array(
  //       'user_id' => $this->request->getVar('user_id'),
  //       'produce_id' =>$product_id[$i],
  //       'image_name'=>'',
  //       'status' => '0',
  //       'added_by' => $session->get('admin_id'),
  //       'created_at' => date('Y-m-d')
  //     );
  //   }
  //   echo '<pre>';
  //   print_r($imagedata);
 
  
    //  $result=$produceimage->insert($imagedata);
    // if (!empty($image))  {
    //     $image->move('./public/upload');
    // }


  }
}
