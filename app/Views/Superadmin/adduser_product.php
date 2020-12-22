<!-- Content Header (Page header) -->
<?php
$session = session();
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <?php

                //    print_r($user);
                echo "Owner Name : &nbsp; &nbsp;";
                echo  '<b>' . $user[0]['farmer_owner'] . '</b>';
                ?>
            </div>


            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>/admin-dashboard">Home</a></li>
                    <li class="breadcrumb-item active"> Produce</li>
                </ol>
            </div>
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

                    <!-- /.card-header -->
                    <!-- form start -->
                    <div align="right">
                        <br>
                    <span class="add_more btn btn-success" id="add_more" title="Add More Produe"><i class="fa fa-plus-circle" style="font-size: 20px;cursor:pointer">Add More</i>
                    </span>
                                    
                        <br>
                    </div>
                    <br>
                    <form action="<?= base_url() ?>/insert-userproduce" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="on_tr">
                        <input type="hidden" id="category_id">
                        <input type="hidden" name="user_id" value="<?= $user[0]['f_id'] ?>">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Produce</th>
                                    <th></th>
                                    <th>Price</th>
                                    
                                    <th> Unit Metrics</th>
                                    <th>Packaging</th>
                                   

                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                <td>
                                <select class="form-control select3 select2-info  col-md-4" id="productCategory" name="productCategory[]" data-dropdown-css-class="select2-info" style="width: 100%;" required>
                                    <option value="0" readonly>Select Category </option>
                                    <?php
                                    foreach ($category as $category_data) :

                                    ?>
                                        <option value="<?= $category_data['category_id'] ?>">
                                            <?= $category_data['category_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                </td>
                                    <td><select class="form-control select2 select2-info" id="produce_id" name="produce_id[]" data-dropdown-css-class="select2-info" style="width: 100%;" required>
                                            <option value="0" readonly> Select Produce </option>
                                            <?php
                                            foreach ($produce as $produce_data) :
                                            ?>
                                                <option value="<?= $produce_data['p_id'] ?>">
                                                    <?= $produce_data['product_name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                    </td>
                                    <td>
                                        <h4 class="button" style="color:#17a2b8" data-toggle="modal" data-target="#myModal" title="Add New Produce"><i class="fa fa-plus-circle"></i> </h4>

                                    </td>
                                    <td>
                                        <input type="text" name="price[]"  id="price" class="form-control" placeholder="Ex: 45 $ ">
                                    </td>
                                    <td>
                                        <input type="text" name="unitmetrics[]" id="unitmetrics" class="form-control" placeholder="Ex:kg/g">
                                    </td>
                                    <td>
                                        <input type="text" name="packaging[]" id="packaging" class="form-control" placeholder="Ex: 20p">
                                    </td>
                                 
                                    

                                </tr>


                            </tbody>

                        </table>
                         <br>
                        <div class="form-group mb-2">
                        
                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                            <br>
                        </div>
                        <br>
                        
                       

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>


<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add New Produce</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="<?= base_url() ?>/addnew-produce" method="post"  enctype="multipart/form-data">
                <input type="hidden" name="user_id" value="<?= $user[0]['f_id'] ?>">
                    <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control select2  select2-info" id="productCategory" name="productCategory" data-dropdown-css-class="select2-info" style="width: 100%;" required>
                            <option value="0" readonly> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;Select Category </option>
                            <?php
                            foreach ($category as $category_data) :
                            ?>
                                <option value="<?= $category_data['category_id'] ?>">
                                    <?= $category_data['category_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" name="productName" id="productName" placeholder="Enter Produce Name ">
                    </div>
                    <input type="hidden" class="form-control" name="extraadd" id="extraadd" value="1">
                    <div class="form-group">
                        <label>Upload Image</label>
                        <bR>
                    <img class="file1" id="img1" src="<?= base_url() ?>/assets/dist/img/upload.png" width="80px">
                                        <input type="file"  name="productImage1" onchange="readURL1(this)" id="my_file1" style="display: none;" title="Click to select " /><br>
                                        <small class="text-danger"><b>Upload Image</b></small>
                    </div>
                    <div class="form-group col-md-6 mb-2">
                        <button type="submit" class="btn btn-info btn-block">Save</button>
                    </div>
            </div>
            </form>
        </div>

      
    </div>
</div>
</div>
<!-- jQuery -->
<script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
// var i=1;
        // $('#value_plus').val(num);
        $(".add_more").click(function() {
            
            var category_id = $('#category_id').val();
          var tr_id = $('#on_tr').val();
          if(tr_id=='')
          {
             i=1; 
              $('#on_tr').val(i);
              i++;
          }
          else{
            $('#on_tr').val(i);
            i++;
          }
         var row_id=$('#on_tr').val();
            $.ajax({
                
                url: '<?= base_url() ?>/FarmerproductController/addmore_producelist',
                method:'POST',
                data:{category_id:category_id,row_id:row_id},
                success: function(response) {
                    // console.log(response);
                    $('table tbody').append(response);
                    // $('table tbody tr').
                },
                error: function() {
                    console.log('error');
                },


            });

         ;
        });


$("#productCategory").change(function (){
        var category_id = $("#productCategory").val();
        //alert(category_id);
        $('#category_id').val(category_id);

        $.ajax({
            url: '<?= base_url() ?>/category-byproduce',
            method: 'POST',
            // dataType: 'json',
            data: {
                category_id: category_id
            },
            success: function(response) {
                console.log(response);
                var data = response["Response"].length;
                $(".user_produce").empty();
                for (var i = 0; i < data; i++) {
                    $(".user_produce").append("<option value=" + response["Response"][0]['p_id'] + ">" + response["Response"][i]["product_name"] + "</option>");
                }
            },
            error: function(response) {
                console.log('failed');
            }
        });
    });
    });

    function remove_tr(obj) {
        $(obj).parent().parent().remove();
    }

    function droplist(p) {

    }
</script>


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


//=============================//

function box(id)
    {
      
    //   alert(id);
    //   var category_id = $("#productCategory"+id).val();


    //   $("#productCategory"+id).change(function (){
        var category_id = $("#produceCategory"+id).val();
        //alert(category_id);
        // $('#category_id'+id).val(category_id);

        $.ajax({
            url: '<?= base_url() ?>/category-byproduce',
            method: 'POST',
            dataType: 'json',
            data: {
                category_id: category_id
            },
            success: function(response) {
                console.log(response);
                var data = response["Response"].length;
                $("#product_id"+id).empty();
                for (var i = 0; i < data; i++) {
                    $("#product_id"+id).append("<option value=" + response["Response"][0]['p_id'] + ">" + response["Response"][i]["product_name"] + "</option>");
                }
            },
            error: function(response) {
                console.log('failed');
            }
        });
    // });
//    


        //alert(category_id);
        // $('#category_id'+id).val(category_id);

        // $.ajax({
        //     url: '<?= base_url() ?>/category-byproduce',
        //     method: 'POST',
        //     // dataType: 'json',
        //     data: {
        //         category_id: category_id
        //     },
        //     success: function(response) {
        //         console.log(response);
        //         var data = response["Response"].length;
        //         $("#product_id"+id).empty();
        //         for (var i = 0; i < data; i++) {
        //             $("#product_id"+id).append("<option value=" + response["Response"][0]['p_id'] + ">" + response["Response"][i]["product_name"] + "</option>");
        //         }
        //     },
        //     error: function(response) {
        //         console.log('failed');
        //     }
        // });
    }

    $(function() {
      //Initialize Select2 Elements
      $('.select5').select2()
      
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      });
    });
</script>