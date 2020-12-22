<?php 
$session=session();
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
			
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>/admin-dashboard">Home</a></li>
              <li class="breadcrumb-item active">Other Product Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    


            <div class="col-md-12">
              
           <div class="card">
              <div class="card-header">
                <h3 class="card-title text-primary">Other Product Details</h3>
                
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>User Id</th>
                    <th>Company</th>
                    <th>Produce</th>
                    <th>Price</th>
                    <th>Unit Metrics</th>
                    <th>Packaging</th>
                    <th>Image</th>
                    <th>Action</th>
                    
                    
                  </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $i=0;
                       foreach($farmer as $value):
                        $i++;
                      ?>
                  <tr>
                      <td><?=$i;?></td>
                      <td><?=$value['farmer_id'];?></td>
                      <td><?=$value['farmer_name'];?></td>
                      
                      <?php 
                        
                        $db = \Config\Database::connect();
                              $id= $value['f_id'];
                            // $res=$this->FarmerModel-> getproduct($value['f_id']);
                            $query = $db->query("select produce_id,product_name,category_name,price,unit_metrics,packaging,product_image1,user_id from user_product inner join product on user_product.produce_id=product.p_id  inner join category on category.category_id=product.product_category  where user_product.user_id=$id and type='0'");
                            $results = $query->getResult();
                            //print_r($results);
                           //echo  $t_product=count($results);
                           if(isset($results)){
                            foreach($results as $produce){
                                 $product_name=$produce->product_name;
                               $category=  $produce->category_name;
                               $price=$produce->price;
                               $unit_metrics=$produce->unit_metrics;
                                $package=$produce->packaging;
                                $image=$produce->product_image1;
                            }
                        }  
                            ?>
                        <td>
                         <?php 
                         if($product_name==''){
                             echo "<span  class='text-danger'>Empty</span>";
                         }
                         else{
                         ?>    
                        <?=$product_name; }?></td>
                        
                        <td> 
                        <?php 
                         if($price==''){
                             echo "<span  class='text-danger'>Empty</span>";
                         }
                         else{
                         ?>
                        <?=$price;}?></td>
                        <td>
                        <?php 
                         if($unit_metrics==''){
                             echo "<span  class='text-danger'>Empty</span>";
                         }
                         else{
                         ?>
                            <?=$unit_metrics;}?></td>
                        <td>
                        <?php 
                         if($unit_metrics==''){
                             echo "<span  class='text-danger'>Empty</span>";
                         }
                         else{
                         ?>
                        <?=$package;}?></td>
                        <td>   
                        <?php if($image=='') {
                         ?>
                         <img src="<?=base_url()?>/assets/dist/img/noimage1.png" style="height:50px" class="img-responsive img-thumbnail">
                          
                         <?php
                        }
                        else{
                          ?>
                              
                        
                        <img src="<?=base_url()?>/public/upload/<?=$image?> " style="height:50px" class="img-responsive img-thumbnail">
                            
                        <?php }?>
                        </td>
                              
                      <td>
                      <a href="#" data-toggle="modal" data-target="#myModal<?=$value['f_id']; ?>" 
                                       data-toggle="tooltip" title="view "class=""
                                        data-placement="top"><i class="fas fa-eye text-info" style="font-size: 18px;"></i></a>
                        <a href="<?=base_url()?>/updateuser-produce/<?=$value['f_id']?>" class="" title="Update Produce"><i class="fas fa-plus-circle" style="font-size: 18px;"></i></a>
                        <a href="<?=base_url()?>/user-producelist/<?=$value['f_id']?>" class="" title="List of produce"><i class="fas fa-copy" style="font-size: 18px;"></i></a>
                      
                        
                  </tr>

                  
                    <!-- View Modal -->
                    <div class="modal fade" id="myModal<?= $value['f_id']; ?>" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">View User Detail</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>User Id</label>
                                        </div>
                                        <div class="col-sm-8">
                                            : &nbsp; <?= $value['farmer_id'] ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Company Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['farmer_name'] ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label> Telephone</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['farmer_phone'] ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Mobile</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['farmer_mobile'] ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label> Eamil</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp;<?= $value['farmer_email'] ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label> Address</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['farmer_address'] ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label> County</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['farmer_country'] ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>State</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['farmer_state'] ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label> Zip code</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['farmer_zip'] ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label> Website</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['farmer_website'] ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Facebook ID</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['fb_url'] ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Instagram ID</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['instagram_url'] ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label> Owner Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['farmer_owner'] ?></label>
                                        </div>
                                    </div>
                                 


                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Cultivable Land</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['cultivable_land']; ?></label>
                                        </div>
                                    </div>
                                   
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Added On</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['created_at'] ?></label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Status</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?php if ($value['farmer_status'] == 0) {
                                                                echo '<button type="button" class="btn btn-success btn-xs" disabled>Active</button>';
                                                            } else {
                                                                echo '<button type="button" class="btn btn-danger btn-xs" disabled>InActive</button>';
                                                            }
                                                            ?>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- View modal End -->
                  
                       <?php  endforeach;?>
            </tbody>

          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->

            </div>
        </div>
    </div>
</section>

    </div>
  </div>
</section>
<!--content -->

<!-- page script -->




