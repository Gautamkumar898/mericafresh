<!-- Content Header (Page header) -->
<?php
$session = session();
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">

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
                        <h3 class="card-title">Add Produce</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form action="<?= base_url() ?>/insert-product" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                            </div>
                            <div class="row">
                                <!-- <div class="form-group col-md-1 mb-2">
                                </div> -->
                                <div class="form-group col-md-4 mb-2">

                                    <label for="exampleInputcategory">Select Category</label>
                                    <select class="form-control select2 select2-info" name="productCategory" data-dropdown-css-class="select2-info" style="width: 100%;">
                                        <option selected="selected" value="0" readonly> &nbsp;&nbsp;Select Category </option>
                                        <?php
                                        foreach ($category as $category_data) :

                                        ?>
                                            <option value="<?= $category_data['category_id'] ?>" <?php if (isset($product->product_category)) {
                                                                                                        if ($product->product_category == $category_data['category_id']) {
                                                                                                            echo "selected";
                                                                                                        }
                                                                                                    } ?>>
                                                <?= $category_data['category_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>


                                <div class="form-group col-md-4 mb-2">

                                    <label for="exampleInputsubcategory">Produce Name</label>
                                    <input type="text" class="form-control" value="<?php if (isset($product->product_name)) {
                                                                                        echo $product->product_name;
                                                                                    } ?>" name="productName" id="productName" placeholder="Enter Produce Name">

                                </div>

                          
                                <div class="form-group col-md-2 mb-2">
                                    <!-- <center><label for="exampleImage1">Image</label></center> -->
                                  
                                    <?php
                                    if ($product->product_image1 == '') {
                                    ?>
                                     <img class="file1" id="img1" src="<?= base_url() ?>/assets/dist/img/upload.png" width="80px">
                                        <input type="file" multiple name="productImage1" onchange="readURL1(this)" id="my_file1" style="display: none;" title="Click to select " /><br>
                                        <small class="text-danger"><b>Upload Image</b></small>
                                    <?php } else { ?>
                                        <img class="file1" id="img1" src="<?= base_url() ?>/public/upload/<?= $product->product_image1 ?>" width="80px">
                                        <input type="file" name="productImage1" onchange="readURL1(this)" id="my_file1" style="display: none;" value="<?php if (isset($product->product_image1)) {
                                                                                                                                                            echo $product->product_image1;
                                                                                                } ?>" title="Click to select " /><br>
                                        <small class="text-success">Update image</small>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-md-1 mb-2">
                                </div>
                                
                            </div>
                           

                                <input type="hidden" class="form-control" value="<?php if (isset($product->p_id)) {
                                                                                        echo $product->p_id;
                                                                                    } ?>" name="product_id" id="product_id" placeholder="">
                            
                        </div>
                        <!-- /.card-body -->
                        <div class="row">
                            <div class="form-group col-md-5 mb-2">

                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <button type="submit" class="btn btn-primary btn-block"><?php echo  isset($product)? "Update":"Save"?></button>
                            </div>
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

