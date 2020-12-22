<?php $session = session() ?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3> <?php echo isset($t_farmer) ? $t_farmer : '0'; ?></h3>

                        <p>Total Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?= base_url() ?>/farmer-list" class="small-box-footer">View All <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php echo isset($t_product) ? $t_product : '0'; ?><sup style="font-size: 20px"></sup></h3>

                        <p>Total Products</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?= base_url() ?>/product-list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>0</h3>

                        <p>Processing...</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>0</h3>

                        <p>Processing...</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

        <style type="text/css">
            .btn-info {
                color: #fff;
                background-color: #17a2b8;
                border-color: #17a2b8;
                box-shadow: none;
                margin-left: 100px;
            }
        </style>


        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Top Ten User List </h3>
                <a href="<?= base_url() ?>/add-farmer"><button class="float-sm-right btn-info" title="Add New Farmer">Add User</button></a>

            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>

                        <th>Sl.No</th>
                        <th>User Id</th>
                        <th>Company</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Mobile</th>
                        <th>Zip</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Action</th>
                        <th>County</th>
                        <th>Address</th>
                        <th>Website</th>
                        <th>Facebook ID</th>
                        <th>Instagram ID </th>
                        <th>Owner Name</th>
                        <th>Cultivable Land Area (in Area)</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $i = 0;
                        foreach ($farmerList as $value) :
                            $i++;
                        ?>
                            <tr>
                                <td><?= $i; ?></td>
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
                                                    <label>Cultivable Land</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <label>: &nbsp; <?php
                                                                    echo $value['cultivable_land'];
                                                                    ?></label>
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


                        <?php endforeach; ?>

                    </tbody>

                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
    </div>
</section>
<!-- /.content -->
<!--content -->

<!-- page script -->


</div>
</div>