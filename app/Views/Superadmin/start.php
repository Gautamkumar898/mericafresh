<?php $session = session() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>



  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  

  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/summernote/summernote-bs4.min.css">
  
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/toastr/toastr.min.css">

  <style>
    .select2-container .select2-selection--single {
      box-sizing: border-box;
      cursor: pointer;
      display: block;
      height: 40px;
      user-select: none;
      -webkit-user-select: none;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
      height: 26px;
      position: absolute;
      top: 6px;
      right: 1px;
      width: 20px;
    }

    .btn-primary {
      width: 25%;
      color: #fff;
      background-color: #007bff;
      border-color: #007bff;
      box-shadow: none;
      float: right;
    }
 
.btn-info {
    color: #fff;
    background-color: #17a2b8;
    border-color: #17a2b8;
    box-shadow: none;
    margin-left: 100px ;
}
</style>
</head>
<!-- phaePhahtiechie3 -->

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>

      <!-- SEARCH FORM -->
      <!-- <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form> -->

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <!-- <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a> -->
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->

              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="<?= base_url() ?>/asstes/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="<?= base_url() ?>/asstes/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>
            <span class="badge badge-warning navbar-badge">Profile</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Welcome Back</span>

            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-user mr-2"></i> Hello <?= $session->get('admin_name'); ?>
              <span class="float-right text-muted text-sm"><?= date('H:i ') ?></span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url() ?>/admin-change-password" class="dropdown-item">
              <i class="fas fa-key mr-2"></i> Update password
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url() ?>/SuperAdmin/admin_profile" class="dropdown-item">
              <i class="fas fa-user mr-2"></i> Update Profile
            </a>
            <div class="dropdown-divider"></div>
            <i class="fas fa-sign-in"></i>
            <a href="<?= base_url() ?>/admin-logout" class="dropdown-item dropdown-footer">Logout</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url() ?>/admin-dashboard" class="brand-link">
        <img src="<?= base_url() ?>/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Merica Fresh</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url() ?>/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $session->get('admin_name') ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>



<!-- Active -->

<?php
                    if (isset($active)) {
                       $admin_dropdownlist = array("Add Produce", "Produce list");
                       $user_dropdownlist = array("Add User", "User list","Produce Details","Other Produce");
                        if (in_array($active, $admin_dropdownlist)) {
                            $shop = 'menu-open';
                            $add = 'active';
                        } else if (in_array($active, $user_dropdownlist)) {
                            $delivery = 'menu-open';
                            $add = 'active';
                        } 
                         else {
                            $addClass = '';
                            $add = '';
                        }
                    }
                    ?>

                    <!-- Active -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="<?= base_url() ?>/admin-dashboard" class="nav-link <?= ($active == 'Dashboard') ? 'active' : '';?>" >
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>/category-list" class="nav-link <?= ($active == 'Category') ? 'active' : '';?> ">
                <i class="far fas fa-copy nav-icon"></i>
                <p> Category</p>
              </a>
            </li>
            <li class="nav-item">
            <a href="<?= base_url() ?>/product-list" class="nav-link <?= ($active == 'Produce list') ? 'active' : '';?> ">
                <i class="far fas fa-copy nav-icon"></i>
    
                    <p>Produce List</p>
                
              </a>
            </li>
            
            <li class="nav-item  <?= (isset($delivery)) ? " $delivery " . $add . "" : ""; ?> ">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Users
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url() ?>/farmer-list" class="nav-link <?= ($active == 'User list') ? 'active' : '';?>">
                    <i class="far fa-circle nav-icon text-info"></i>
                    <p>User Profile</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?= base_url() ?>/produce-details" class="nav-link <?= ($active == 'Produce Details') ? 'active' : '';?>">
                    <i class="far fa-circle nav-icon text-info"></i>
                    <p>Produce Details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url() ?>/other-produce" class="nav-link <?= ($active == 'Other Produce') ? 'active' : '';?>">
                    <i class="far fa-circle nav-icon text-info"></i>
                    <p>Other Product</p>
                  </a>
                </li>
              </ul>
            </li>
            
             
            <li class="nav-item">
              <a href="<?= base_url() ?>/admin-logout" class="nav-link">
                <i class="nav-icon  fa fa-sign-in-alt"></i>
                <p>
                  Logout
                  
                </p>
              </a>
            </li>
          </ul>

        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?php include_once $pageName . '.php'; ?>

    </div>


    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; <?= date('Y') ?> <a href="">Merica Fresh</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b>1.0
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- Script Link  -->

  <!-- jQuery -->
  <script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= base_url() ?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
 
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>

<?php
        if (isset($js)) {
            echo $js;
        }
        ?>  



  <script type="text/javascript">
    $(function() {

      //Initialize Select2 Elements
      $('.select2').select2()
      $('.select3').select2()
      $('.select4').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      });
    });
  </script>

  <script>
    $(document).on("input", ".numeric", function() {
      this.value = this.value.replace(/[^\d\\]/g, '');
    });
  </script>

  <script>
    $(document).ready(function() {
      $('#productCategory').change(function() {

            var category_id =  $('#productCategory').val();
           
            $.ajax({
          url: '<?= base_url() ?>/category-byproduce',
          method: 'POST',
          dataType: 'json',
          data: {
            category_id: category_id
          },
          success: function(response) {
            console.log(response);
            var data=response["Response"].length;
                $("#produce_id").empty();
                 for(var i=0;i<data;i++)
                 { 
                  $("#produce_id").append("<option value="+response["Response"][0]['p_id']+">"+response["Response"][i]["product_name"]+"</option>");
                }  
          }, 
          error: function(response) { 
            console.log('failed');
          }
        });
  
        });
    });
  </script>
  
<!-- Image Browser  -->
  <script type="text/javascript">
    $(".file1").click(function() {
      $("input[id='my_file1']").click();
    });
  </script>
  <script type="text/javascript">
    $(".file2").click(function() {
      $("input[id='my_file2']").click();
    });
  </script>
  <script type="text/javascript">
    $(".file3").click(function() {
      $("input[id='my_file3']").click();
    });
  </script>
  <script type="text/javascript">
    $(".file4").click(function() {
      $("input[id='my_file4']").click();
    });
  </script>
  
<!-- Zip to Country  -->
<script>
    $(document).ready(function() {
      $('#farmerZip').change(function() {
        var zip_code = $('#farmerZip').val();  
        $.ajax({
          url: '<?= base_url() ?>/find-city',
          method: 'POST',
          dataType: 'json',
          data: {
            zip_code: zip_code
          },
          success: function(response) {
            console.log(response);
            $('#farmerCountry').empty();
            $('#farmerState').empty();
            $('#farmerCity').empty();
            $('#farmerCountry').val(response['county']);
            $('#farmerState').val(response['state']);
            $('#farmerCity').val(response['city']);
          },
          error: function(response) {
            console.log('failed');
          }
        });
      });
    });
  </script>

<!-- Data Table  -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Select2 -->
  <script src="<?= base_url() ?>/assets/plugins/select2/js/select2.full.min.js"></script>


  <!-- daterangepicker -->
  <script src="<?= base_url() ?>/assets/plugins/moment/moment.min.js"></script>
  <script src="<?= base_url() ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
 
  <!-- Summernote -->
  <script src="<?= base_url() ?>/assets/plugins/summernote/summernote-bs4.min.js"></script>

  <!-- DataTables  & Plugins -->
  <script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url() ?>/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/assets/plugins/jszip/jszip.min.js"></script>
  <script src="<?= base_url() ?>/assets/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?= base_url() ?>/assets/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?= base_url() ?>/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url() ?>/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url() ?>/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url() ?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>/assets/dist/js/adminlte.js"></script>
  <script src="<?= base_url() ?>/assets/plugins/toastr/toastr.min.js"></script>

  <script>
  $(function() {
      <?php 
    if($session->getFlashdata('msgS')){
        ?>
      toastr.success("<?php echo $session->getFlashdata('msgS')?>")
        <?php 
    }
    if($session->getFlashdata('msgE')){
        ?>
      toastr.error("<?= $session->getFlashdata('msgE')?>")
        <?php 
    }
    if($session->getFlashdata('msgW')){
        ?>
      toastr.warning("<?= $session->getFlashdata('msgW')?>")
        <?php 
    }
    ?>
  });
  </script>