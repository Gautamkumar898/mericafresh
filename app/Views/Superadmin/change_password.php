<!-- Content Header (Page header) -->
<?php 
$session=session();
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
                    <li class="breadcrumb-item active">Update Password</li>
                </ol>
            </div>
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
                        <h3 class="card-title">Update Password *</h3>
                    </div>

                    <form method="post" action="<?= base_url() ?>/change-password-admin" autocomplete="off" name="form1" id="form1">
                    <div class="card-body">
                            <div class="form-group">
                            </div>
                            <div class="row">   
                    <label>Old Password :</label>
                        <input type="password" name="old_pass" id="name" placeholder="Old Pass" class="form-control" required=""/><br />
                        <label>New Password :</label>
                        <input type="password" name="new_pass" id="password" placeholder="New Password" class="form-control" required=""/><br/>
                        <label>Confirm Password :</label>
                        <input type="password" name="confirm_pass" id="password" class="form-control" placeholder="Confirm Password" required=""/><br/>
                        <div class="form-group">
                            <br>
                        <input type="submit" value="Change Password" class="btn btn-dropbox btn-danger" name="change_pass"/><br />
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</section>