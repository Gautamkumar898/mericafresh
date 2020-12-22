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
              <li class="breadcrumb-item active">Produce Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    


            <div class="col-md-12">
              
           <div class="card">
              <div class="card-header">
                <h3 class="card-title text-info">Produce Details</h3>
               <a href="<?=base_url()?>/produce-details"><h3 class="card-title text-danger float-sm-right">Back</h3></a>
                
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
                    <th>Category</th>
                    <th>Price($)</th>
                    <th>Unit Metrics</th>
                    <th>Packaging</th>
                    <th>Image</th>
                    <!-- <th>Action</th> -->
                  
                    
                    
                  </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $i=0;
                       foreach($userproduce as $value):
                        $i++;
                      ?>
                  <tr>
                      <td><?=$i;?></td>
                      <td><?=$value['farmer_id'];?></td>
                      <td><?=$value['farmer_name'];?></td>
                        <td><?=$value['product_name'];?></td>
                        <td><?=$value['category_name'];?></td>
                        <td>
                        <?php  if($value['price']==''){
                            echo "0";
                            }
                            else{?>    
                          <?=$value['price'];?>
                            <?php }?>
                            
                    </td>
                        <td>
                        <?php  if($value['unit_metrics']==''){
                            echo "0";
                            }
                            else{?>    
                        <?=$value['unit_metrics'];?>
                        <?php }?>
                    </td>
                   
                        <td>
                        <?php  if($value['packaging']==''){
                            echo "0";
                            }
                            else{?>    
                          <?=$value['packaging'];?>
                            <?php }?>
                            
                    </td>
                    <td> 
                    <?php if($value['product_image1']=='') {
                          echo 'No Image';
                        }
                        else{
                          ?>
                               
                    <img src="<?=base_url()?>/public/upload/<?=$value['product_image1']?> " style="height:50px" class="img-responsive img-thumbnail">
                        <?php }?>       
                  </td>
                          <!-- <td>  <a href="<?=base_url()?>/updateuser-produce/<?=$value['f_id']?>" class="" title="Update Produce"><i class="fas fa-edit"></i></a>
                       </td> -->
                  </tr>

                  
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




