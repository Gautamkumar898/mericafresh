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
    </div><!-- /.container-fluid -->

</section>
<!-- Message -->



<form action="<?= base_url() ?>/farmer-produce" method="post">
    <div class="card-body">
        <div class="form-group">
        </div>
        <div class="row">
            <div class="form-group col-md-2 mb-2">
            </div>
            <div class="form-group col-md-4 mb-2">



               <label >Select Company </label>
               <select class="form-control select2 select2-info" id="farmerProduce" name="farmerProduce" data-dropdown-css-class="select2-info" style="width: 100%;">
                <option value="0" readonly> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;Select Company</option>
                <?php
                foreach ($allfarmername as $key => $result) {
                    ?>
                    <option value="<?= $result['f_id'] ?>">
                        <?= $result['farmer_name'] ?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group col-md-3 mb-2" style="margin-top:33px; ">
            <button type="submit" class="btn btn-info btn-block" >Search </button>
        </div>
    </div>
</div>
</form>



<div class="col-md-12">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List Of User</h3>
            <a href="<?= base_url() ?>/add-farmer"><button class="float-sm-right btn-info" title="Add New Farmer">Add User</button></a>

        </div>


        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>

                    <th>S.No</th>
                    <th>UserId</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Mobile </th>

                    <th>Zip</th>

                    <th>City</th>
                    <th>State</th>
                    <th>Action</th>
                    <th>County</th>
                    <th>Address</th>
                    <th>Website</th>
                    <th>facebook</th>
                    <th>Instragram </th>
                    <th>Owner Name</th>
                    <th>Bussiness Type</th>
                    <th>Produce</th>
                    <th>Cultivable Land</th>
                    
                </tr>
            </thead>
            <tbody>

                <?php 
                $i = 0;
                print_r($farmerProduct);
                die;
                if(isset($farmerProduct)){
                 foreach($farmerProduct as $value):
                    ?>

                    <tr>
                        <td><?= ++$i; ?></td>
                        <td><?= $value['farmer_id']; ?></td>
                        <td><?= $value['farmer_name']; ?></td>

                        <td><?= $value['farmer_email']; ?></td>
                        <td><?= $value['farmer_phone']; ?></td>
                        <td><?= $value['farmer_mobile']; ?></td>
                        <td><?= $value['farmer_zip']; ?></td>

                        <td><?= $value['farmer_city']; ?></td>
                        <td><?= $value['farmer_state']; ?></td>
                        
                        <td>
                            <a href="#" data-toggle="modal" data-target="#myModal<?= $value['f_id']; ?>" data-toggle="tooltip" title="view " data-placement="top"><i class="fas fa-eye text-success"></i></a>
                            <a href="<?= base_url() ?>/edit-farmer/<?= $value['f_id'] ?>"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url() ?>/delete-farmer/<?= $value['f_id'] ?>"><i class="fa fa-trash text-danger" onclick="return(confirm('Are You Sure want to  delete '));"></i></a></td>

                            <td><?= $value['farmer_country']; ?></td>
                            <td><?= $value['farmer_address']; ?></td>
                            <td><?= $value['farmer_website']; ?></td>
                            <td><?= $value['fb_url']; ?></td>
                            <td><?= $value['instagram_url']; ?></td>
                            <td><?= $value['farmer_owner']; ?></td>
                            <td><?= $value['farmer_bussiness_type']; ?></td>

                            <td>


                                <?php 

                                $db = \Config\Database::connect();

                                $id= $value['f_id'];


                            // $res=$this->FarmerModel-> getproduct($value['f_id']);
                                $query = $db->query("select product_id,f_id,product_name,p_id from  farmer_product  inner join  product on  farmer_product.product_id=product.p_id  where f_id=$id");
                                $results = $query->getResult();
                                $t_product=count($results);
                                foreach($results as $produce){

                                //echo $produce->product_name;
                                 $array[]=$produce->product_name;

                                 $ress= implode(", ",$array);

                             }
                             echo $ress;


                             ?>

                         </td>

                         <td><?= $value['cultivable_land']; ?></td>
                     </tr>


                     <!-- View Modal -->
                     <div class="modal fade" id="myModal<?= $value['f_id']; ?>" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">View User Detail</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>User Id</label>
                                        </div>
                                        <div class="col-sm-8">
                                            : &nbsp; <?= $value['farmer_id'] ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Company Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['farmer_name'] ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label> Telephone</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['farmer_phone'] ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Mobile</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['farmer_mobile'] ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label> Eamil</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp;<?= $value['farmer_email'] ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label> Address</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['farmer_address'] ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label> County</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['farmer_country'] ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>State</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['farmer_state'] ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label> Zip code</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['farmer_zip'] ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label> Website</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['farmer_website'] ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Facebook</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['fb_url'] ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Instagram</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['instagram_url'] ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label> Owner Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['farmer_owner'] ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Bussiness Type</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['farmer_bussiness_type'] ?></label>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Produce</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?php
                                            echo $ress; 
                                            ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Cultivable Land</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['cultivable_land']; ?></label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Added On</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?= $value['created_at'] ?></label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Status</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <label>: &nbsp; <?php if ($value['farmer_status'] == 0) {
                                                echo '<button type="button" class="btn btn-success btn-xs" disabled>Active</button>';
                                            } else {
                                                echo '<button type="button" class="btn btn-danger btn-xs" disabled>InActive</button>';
                                            }
                                            ?>
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- View modal End -->


            <?php  endforeach;   

        } 


        ?>

    </tbody>

</table>
</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>
</section>
<!--content -->

<!-- page script -->