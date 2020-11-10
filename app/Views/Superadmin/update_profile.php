<!-- Content Header (Page header) -->
<?php
$session = session();
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">


                <?php if ($session->getFlashdata('msgS')) { ?>
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>
                            <?= $session->getFlashdata('msgS'); ?>
                        </strong>
                    </div>

                <?php } ?>
                <?php if ($session->getFlashdata('msgE')) { ?>
                    <div class="alert alert-danger alert-dismissible ">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> <?= $session->getFlashdata('msgE'); ?></strong>
                    </div>
                <?php } ?>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item ">Update profile</li>
                </ol>
            </div>
        </div>
        <div class="pull-right">
            <a href="#" class="btn btn-success disabled"><i class="fa fa-eye"></i>
                Admin Profile
            </a>
        </div>
    </div><!-- /.container-fluid -->

</section>
<!-- Message -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Update Profile</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
				  
				
                    <form action="<?= base_url() ?>/update-admin-profile" method="post" enctype= "multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                            </div>
                         
                            <div class="form-group col-md-6 mb-2">
                                
                                <label for="name">Admin Name</label>
								<input type="text" class="form-control" value="<?php if(isset($admin['admin_name'])){echo $admin['admin_name'];}?>" name="adminName" id="adminName" placeholder="">
                           
                                 
                            </div>

                            <div class="form-group col-md-6 mb-2">
                             <label for="email">Admin Email</label>
                                <input type="email" class="form-control" value="<?php if(isset($admin['admin_email'])){echo $admin['admin_email'];}?>" name="adminEmail" id="adminEmail" placeholder="">
							</div>
						
                            <div class="form-group col-md-6 mb-2">
                                
                            </div>
                            
                                            <br/>
                                            <br/>
                          
                            
                            </div>
                       

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                        <center> <button type="submit" class="btn btn-primary">Update</button></center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
