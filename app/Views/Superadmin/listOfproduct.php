<?php 
$session=session();
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
			<?php if ($session->getFlashdata('msgS')) { ?>
				<div class="alert alert-success alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
					<strong>
					 <?= $session->getFlashdata('msgS'); ?>
					</strong>
				</div>

			<?php } ?>
			<?php if ($session->getFlashdata('msgE')) { ?>
				<div class="alert alert-danger alert-dismissible ">
					<a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
					<strong> <?= $session->getFlashdata('msgE'); ?></strong>
				</div>
			<?php } ?>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Produce List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <div class="card">
              <div class="card-header">
                <h3 class="card-title">List Of Produce</h3>
             <a href="<?=base_url()?>/add-product"><button class="float-sm-right btn-info" title="Add Product">Add Produce</button></a>  
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Produce Name</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Action</th>
                    
                    
                  </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $i=0;
                       foreach($product as $value):
                        $i++;
                      ?>
                  <tr>
                      <td><?=$i;?></td>
                      <td><?=$value['product_name'];?></td>
                      <td>
                           <?=$value['category_name']?>
                        </td>
                       
                        <td>
                        <?php if($value['product_image']=='') {
                                ?>
                                 <img src="<?=base_url()?>/assets/dist/img/login1.jpg" style="height:50px" class="img-responsive img-thumbnail">
                                
                              <?php 
                                
                            }
                            else{
                                
                                ?>
                                  <img src="<?=base_url()?>/public/upload/<?=$value['product_image']?> " style="height:50px" class="img-responsive img-thumbnail">
                                
                               <?php 
                            }
                                         ?>  
                      <td>
                      <a href="#" data-toggle="modal" data-target="#myModal<?=$value['p_id']; ?>" 
                                       data-toggle="tooltip" title="view "
                                        data-placement="top"><i class="fas fa-eye text-success"></i></a>
                        <a href="<?=base_url()?>/edit-product/<?=$value['p_id']?>"><i class="fas fa-edit"></i></a>
                      <a href="<?=base_url()?>/delete-product/<?=$value['p_id']?>"><i class="fa fa-trash text-danger"></i></a></td>    
                  </tr>



                  
                      <!-- View Modal -->
                      <div class="modal fade" id="myModal<?=$value['p_id'];?>" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">View Produce Detail</h4>
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>Category Name</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    : &nbsp;&nbsp; <?=$value['category_name']?> 
                                                    </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>Produce Name</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <label>:  &nbsp;&nbsp;  <?=$value['product_name']?></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label> Image</label>
                
                                                </div>
                                                <div class="col-sm-8">
                                                    <label>:  &nbsp;&nbsp;    <img src="<?=base_url()?>/public/upload/<?=$value['product_image']?> " style="height:50px" class="img-responsive img-thumbnail"></label>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>Added On</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <label>:  &nbsp;&nbsp;  <?=$value['created_at']?></label>
                                                </div>
                                            </div>
                                          
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>Status</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <label>:  &nbsp;&nbsp;  <?php if($value['product_status']==0){
                                                      echo '<button type="button" class="btn btn-success btn-xs" disabled>Active</button>';   
                                                    }
                                                    else{
                                                    echo '<button type="button" class="btn btn-danger btn-xs" disabled>InActive</button>';
                                                    }
                                                    ?>
                                                    </label>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
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
</section>
<!--content -->

<!-- page script -->

