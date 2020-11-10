<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title?></title>
  
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php  echo base_url()?>/assets/dist/img/fresh.jpg">
  </head>

<?php 
$session=session();
?>
  <div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-8">
		
		</div>
	</div>
  <body class="hold-transition login-page" >
  <div class="login-box">
    
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
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
      
      <div class="login-logo">
      <a href=""><b>Merica</b>Fresh</a>
    </div>
  
        <form action="<?=base_url()?>/authenticate-admin" method="post" autocomplete="off">
          <div class="input-group mb-3">
            <input type="email"  name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <!-- <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div> -->
              <a href="#" class="text-primary">
            <i class="fab fa-keyip mr-2"></i>  Forgot  password ?
          </a>
            </div>
            <!-- /.col -->
            <div class="col-4">
           
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        <div class="social-auth-links text-center mb-3">
        
         
        
        </div>
    
  
      </div>
  
    </div>
  </div>
  <!-- /.login-box -->
 
  </body>
  </html>