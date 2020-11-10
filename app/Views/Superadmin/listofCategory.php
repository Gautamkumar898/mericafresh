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
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-4">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title ">Create New Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    
                   
                    <form action="<?= base_url()?>/insert-category" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputname"> Category Name</label>
                                <input type="text" name="category" required=""  value="<?php if (isset($category_update['category_name'])){echo $category_update['category_name'];}?>" class="form-control" id="categoryname" placeholder="Enter Category Name">
                            </div>

                        </div>
                        <input type="hidden" name="category_id" value="<?php if (isset($category_update['category_id'])){echo $category_update['category_id'];}?>">
                      
                        <!-- /.card-body -->
<?php 

 if (isset($category_update['category_id'])){
   ?>
    <div class="card-footer">
                        <button type="submit" class="btn btn-primary pull-right" >Update </button>
                        </div>
   <?php 

}
else{
  ?>
   <div class="card-footer">
                        <button type="submit" class="btn btn-primary pull-right" >Save </button>
                        </div>
  <?php
}
?>
                       

                    </form>
                </div>
            </div>
            <div class="col-md-8">
              
    <div class="card">
              <div class="card-header">
                <h3 class="card-title text-primary">List Of Category</h3>
             <!-- <a href="<?=base_url()?>/category-page"><button class="float-sm-right btn-info" title="Add New Category">Add Category</button></a>   -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Category_Name</th>
                    <th>Status</th>
                    <th>Added_date</th>
                    <th>Action</th>
                    
                    
                  </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $i=0;
                       foreach($category as $value):
                        $i++;
                      ?>
                  <tr>
                      <td><?=$i;?></td>
                      <td><?=$value['category_name'];?></td>
                      <td><?php if($value['category_status']=='0'){
                        echo "<span class='text-success'>Active</span>";
                        }
                        else{
                          echo "<span class='text-danger'>Unactive</span>";
                        }
                        ?></td>
                        <td><?=$value['created_at'];?></td>
                      <td>
                      <a href="#" data-toggle="modal" data-target="#myModal<?=$value['category_id']; ?>" 
                                       data-toggle="tooltip" title="view "
                                        data-placement="top"><i class="fas fa-eye text-success"></i></a>
                        <a href="<?=base_url()?>/edit-category/<?=$value['category_id']?>"><i class="fas fa-edit"></i></a>
                      <a href="<?=base_url()?>/delete-category/<?=$value['category_id']?>"><i class="fa fa-trash text-danger" ></i></a></td>
                      
                  </tr>

                  
                      <!-- View Modal -->
                      <div class="modal fade" id="myModal<?=$value['category_id'];?>" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">View Category Detail</h4>
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>Category Name</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    : <?=$value['category_name']?> 
                                                    </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>Added On</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <label>: <?=$value['created_at']?></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>Updated On</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <label>: <?=$value['updated_at']?></label>
                                                </div>
                                            </div>
                                            
                                          
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>Status</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <label>: <?php if($value['category_status']==0){
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
    </div>
</section>

    </div>
  </div>
</section>
<!--content -->

<!-- page script -->

