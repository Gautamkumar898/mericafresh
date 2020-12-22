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
            <a href="<?= base_url(); ?>/farmer-list" class="btn btn-success"><i class="fa fa-eye"></i>
                User List
            </a>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Message -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Add New User</h3>
                    </div>
                    <?php
                    if(isset($edit_farmer)){
                        foreach ($edit_farmer as $key => $result) {
                            $f_id=$result['f_id'];
                            $address_id=$result['address_id'];
                            $farmer_name = $result['farmer_name'];
                            $farmer_email = $result['farmer_email'];
                            $farmer_phone = $result['farmer_phone'];
                            $farmer_email = $result['farmer_email'];
                            $farmer_mobile = $result['farmer_mobile'];
                            $farmer_address = $result['farmer_address'];
                            $farmer_zip = $result['farmer_zip'];
                            $cultivable_land=$result['cultivable_land'];
                            $farmer_country = $result['farmer_country'];
                            $farmer_state = $result['farmer_state'];
                            $farmer_city = $result['farmer_city'];
                            $farmer_website = $result['farmer_website'];
                            $fb_url = $result['fb_url'];
                            $instagram_url = $result['instagram_url'];
                            $farmer_owner = $result['farmer_owner'];
                        }
                    }
                    ?>

                    <form action="<?= base_url() ?>/insert-farmer" method="post">
                        <div class="card-body">
                            <div class="form-group">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mb-2">
                                    <label for="exampleInputName">Company Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required value="<?php if (isset($farmer_name)) {
                                        echo $farmer_name;
                                    } ?>" name="farmerName" id="farmerName" placeholder="Enter Company Name">
                                </div>
                                <div class="form-group col-md-6 mb-2">
                                    <label for="exampleInputEmail">Email<span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" required value="<?php if (isset($farmer_email)) {
                                        echo $farmer_email;
                                    } ?>" name="farmerEmail" id="farmerEmail" placeholder="Enter Email">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 mb-2">
                                    <label for="exampleInputTelephone">Landline <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control farmerPhone" maxlength="12" value="<?php if (isset($farmer_phone)) {
                                        echo $farmer_phone;
                                    } ?>" name="farmerPhone" id="farmerPhone" placeholder="Enter Telephone Number">
                                </div>
                                <div class="form-group col-md-6 mb-2">
                                    <label for="exampleInputMobile">Mobile <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control farmerMobile" required maxlength="12" value="<?php if (isset($farmer_mobile)) {
                                        echo $farmer_mobile;
                                    } ?>" name="farmerMobile" id="farmerMobile" placeholder="Enter Mobile Number    ">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 mb-2">
                                    <label for="exampleInputAddress">Address <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required value="<?php if (isset($farmer_address)) {
                                        echo $farmer_address;
                                    } ?>" name="farmerAddress" id="farmerAddress" placeholder="Enter Address">
                                </div>
                                <div class="form-group col-md-6 mb-2">
                                    <label for="exampleInputZip">Zip<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required maxlength="6" value="<?php if (isset($farmer_zip)) {
                                        echo $farmer_zip;
                                    } ?>" name="farmerZip" id="farmerZip" placeholder="Enter Zip">
                                </div>


                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mb-2">
                                    <label for="exampleInputCounty">County</label>
                                    <input type="text" class="form-control" required readonly value="<?php if (isset($farmer_country)) {
                                        echo $farmer_country;
                                    } ?>" name="farmerCountry" id="farmerCountry" placeholder="Enter County">
                                </div>

                                <div class="form-group col-md-6 mb-2">
                                    <label for="exampleInputState">State</label>
                                    <input type="text" class="form-control" required readonly value="<?php if (isset($farmer_state)) {
                                        echo $farmer_state;
                                    } ?>" name="farmerState" id="farmerState" placeholder="Enter State">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 mb-2">
                                    <label for="exampleInputCity">City</label>
                                    <input type="text" class="form-control" required readonly value="<?php if (isset($farmer_city)) {
                                        echo $farmer_city;
                                    } ?>" name="farmerCity" id="farmerCity" placeholder="Enter City">
                                </div>

                                <div class="form-group col-md-6 mb-2">
                                    <label for="exampleInputwebsite">Website Url</label>
                                    <input type="text" class="form-control" value="<?php if (isset($farmer_website)) {
                                        echo $farmer_website;
                                    } ?>" name="farmerWebsite" id="farmerWebsite" placeholder=" Website('https://farmer.com')">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 mb-2">
                                    <label for="exampleInputfacebook">Facebook Url</label>
                                    <input type="text" class="form-control" value="<?php if (isset($fb_url)) {
                                        echo $fb_url;
                                    } ?>" name="fb_url" id="fb_url" placeholder=" facebook('www.facebook.com')">
                                </div>

                                <div class="form-group col-md-6 mb-2">
                                    <label for="exampleInputinstagram">Instagram Url</label>
                                    <input type="text" class="form-control" value="<?php if (isset($instagram_url)) {
                                        echo $instagram_url;
                                    } ?>" name="instagram_url" id="instagram_url" placeholder=" Instagram('www.instragram.com')">
                                </div>

                                <div class="form-group col-md-6 mb-2">
                                    <label for="exampleInput">Owner Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required value="<?php if (isset($farmer_owner)) {
                                        echo $farmer_owner;
                                    } ?>" name="farmerOwner" id="farmerOwner" placeholder="Enter Owner Name">
                                </div>
                            <div class="form-group col-md-6 mb-2">
                                <label for="exampleInputProduc">Cultivable Land Area (in Area) <span class="text-danger">*</span></label> 
                                <input type="text" class="form-control" required value="<?php if (isset($cultivable_land)) {
                                 echo $cultivable_land;
                             } ?>" name="cultivable_land" id="cultivable_land" placeholder="Enter Cultivable Land">
                         </div>
                     </div>
                     <input type="hidden" class="form-control" required value="<?=$f_id?>" name="farmer_id" id="farmer_id" placeholder="">
                     <input type="hidden" class="form-control" required value="<?=$address_id?>" name="address_id" id="address_id" placeholder="">
                 </div>
                 <!-- /.card-body -->
                 <div class="card-footer">
                    <center>
                        <button type="submit" class="btn btn-primary"><?php echo  isset($edit_farmer)? "Update":"Save"?></button></center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
