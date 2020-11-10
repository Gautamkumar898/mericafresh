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
        
        </div>
        <div class="pull-right text-right">
            <a href="<?= base_url(); ?>/product-list" class="btn btn-success"><i class="fa fa-eye"></i>
                Produce List
            </a>
        </div>
    </div><!-- /.container-fluid -->

</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Add  Produce</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                  
                    <form action="<?= base_url() ?>/insert-product" method="post" enctype= "multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                            </div>
                            <div class="row">
                            <div class="form-group col-md-6 mb-2">
                                
                                <label for="exampleInputcategory">Select Category</label>
                                <select class="form-control select2 select2-info" name="productCategory" data-dropdown-css-class="select2-info" style="width: 100%;">
                                    <option selected="selected" value="0" readonly> &nbsp;&nbsp;Select Category </option>
                                    <?php
                                    foreach ($category as $category_data) :

                                    ?>
                                        <option value="<?= $category_data['category_id'] ?>"
                                        <?php if(isset($product->product_category)){
                                           if($product->product_category==$category_data['category_id']){
                                               echo "selected";
                                           }
                                        }?>
                                        >
                                        <?= $category_data['category_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group col-md-6 mb-2">
                             <label for="exampleInputsubcategory">Produce Name</label>
                                <input type="text" class="form-control" value="<?php if(isset($product->product_name)){echo $product->product_name;}?>" name="productName" id="productName" placeholder="Enter Produce Name">
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-md-6 mb-2">
                            <label for="exampleInputImage">Image</label>
                                <br>
                                <?php  
                                       if(isset($product->product_image)){
                                          
                                        ?>
                                        <img class="file1" id="img1"
                            src="<?=base_url()?>/public/upload/<?=$product->product_image?>" width="80px">
                                            <input type="file" name="productImage" onchange="readURL1(this)" id="my_file1"
                                                style="display: none;"  value="<?php if(isset($product->product_image)){echo $product->product_image;}?>" title="Click to select " /><br>
                                            <small class="text-success">Update  image</small>
                                        <?php 
                                       }
                                       else{

                                       
                                ?>
                               <img class="file1" id="img1"
                            src="<?=base_url()?>/assets/dist/img/upload.png" width="80px">
                                            <input type="file" name="productImage" onchange="readURL1(this)" id="my_file1"
                                                style="display: none;"  title="Click to select " /><br>
                                            <small class="text-danger">Upload Image</small>

                                       <?php }?>
                            </div>

                            <div class="form-group col-md-6 mb-2">
                            

                            <!-- <div class="form-group col-md-6 mb-2">
                                <label for="exampleInputsubcategory">Quantity</label>required=""
                                <input type="number" class="form-control" value="" name="productQuantity" id="productQuantity" placeholder="">
                            </div> -->
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-md-6 mb-2">
                                
                            </div>
                            
                                            <br/>
                                            <br/>
                            <!-- <div class="form-group col-md-6 mb-2">
                                <label for="exampleInputsubcategory">In Stock</label>
                                <select class="form-control " name="stock">
                                    <option selected="Yes" value="0" > &nbsp;&nbsp;Yes </option>
                                    <option  value="1" > &nbsp;&nbsp;No </option>
                            </div> -->
                            
                            </div>
                           
                            <input type="hidden" class="form-control" value="<?php if(isset($product->p_id)){echo $product->p_id;}?>" name="product_id" id="product_id" placeholder="">


                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                        <center> <button type="submit" class="btn btn-primary">Save</button></center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
function readURL1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#img1').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
</script>