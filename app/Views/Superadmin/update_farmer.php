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
                           
<form action="<?= base_url() ?>/get-farmer-data" method="post">
                        <div class="card-body">
                            <div class="form-group">
                            </div>
                            <div class="row">
                            <div class="form-group col-md-2 mb-2">
                            </div>
                         

                                <div class="form-group col-md-4 mb-2">
                                <label >Select Company </label>
                    <select class="form-control select2 select2-info" id="farmer_id" name="farmer_id" data-dropdown-css-class="select2-info" style="width: 100%;" required>
                                        <option value="0" readonly> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;Select Company </option>
                                        <?php
                                        foreach ($farmerList as $key => $result) {

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
                            <button type="submit" class="btn btn-info btn-block" >Find Company  </button>
                            </div>
                            </div>
                        </div>
                    </form>

                    

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
                        $cultivable_land=$result['cultivable_land'];
                        $farmer_zip = $result['farmer_zip'];
                        $farmer_country = $result['farmer_country'];
                        $farmer_state = $result['farmer_state'];
                        $farmer_city = $result['farmer_city'];
                        $farmer_website = $result['farmer_website'];
                        $fb_url = $result['fb_url'];
                        $instagram_url = $result['instagram_url'];
                        $farmer_owner = $result['farmer_owner'];
                        $farmer_bussiness_type = $result['farmer_bussiness_type'];
                        
                    }
                }
                     ?>

                    <form action="<?= base_url() ?>/insert-farmer" method="post">
                        <div class="card-body">
                            <div class="form-group">
                            </div>



                            <div class="row">
                                <div class="form-group col-md-6 mb-2">
                                    <label for="exampleInputName">Company Name</label>
                                    <input type="text" class="form-control" required value="<?php if (isset($farmer_name)) {
                                                                                                echo $farmer_name;
                                                                                            } ?>" name="farmerName" id="farmerName" placeholder="Enter Company Name">
                                </div>
                                <div class="form-group col-md-6 mb-2">
                                    <label for="exampleInputEmail">Email</label>
                                    <input type="text" class="form-control" required value="<?php if (isset($farmer_email)) {
                                                                                                echo $farmer_email;
                                                                                            } ?>" name="farmerEmail" id="farmerEmail" placeholder="Enter Email">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 mb-2">
                                    <label for="exampleInputTelephone">Telephone</label>
                                    <input type="text" class="form-control farmerPhone" maxlength="12" value="<?php if (isset($farmer_phone)) {
                                                                                                                    echo $farmer_phone;
                                                                                                                } ?>" name="farmerPhone" id="farmerPhone" placeholder="Enter Telephone Number">
                                </div>
                                <div class="form-group col-md-6 mb-2">
                                    <label for="exampleInputMobile">Mobile </label>
                                    <input type="text" class="form-control numeric" required maxlength="10" value="<?php if (isset($farmer_mobile)) {
                                                                                                                        echo $farmer_mobile;
                                                                                                                    } ?>" name="farmerMobile" id="farmerMobile" placeholder="Enter Mobile Number    ">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 mb-2">
                                    <label for="exampleInputAddress">Address</label>
                                    <input type="text" class="form-control" required value="<?php if (isset($farmer_address)) {
                                                                                                echo $farmer_address;
                                                                                            } ?>" name="farmerAddress" id="farmerAddress" placeholder="Enter Address">
                                </div>
                                <div class="form-group col-md-6 mb-2">
                                    <label for="exampleInputZip">Zip</label>
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
                                    <label for="exampleInput">Owner Name</label>
                                    <input type="text" class="form-control" required value="<?php if (isset($farmer_owner)) {
                                                                                                echo $farmer_owner;
                                                                                            } ?>" name="farmerOwner" id="farmerOwner" placeholder="Enter Owner Name">
                                </div>
                                <div class="form-group col-md-6 mb-2">

                                    <label for="exampleInputBussiness">Business Type</label>
                                    <?php $type = array('Farms', 'Winery', 'Diary') ?>
                                    <select class="form-control select2 select2-primary" required="" name="bussines_type" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                        <option value="0" readonly> &nbsp;&nbsp;Select Bussines Type </option>
                                        <?php
                                        foreach ($type as $key => $value) {
                                        ?>
                                            <option value="<?= $value ?>" <?php if (isset($farmer_bussiness_type)) {

                                                                                if ($farmer_bussiness_type == $value) {
                                                                                    echo "selected";
                                                                                }
                                                                            }
                                                                            ?>><?= $value ?> </option>
                                        <?php

                                        }

                                        ?>
                                        </option>
                                    </select>
                                </div>
                            
                            <div class="form-group col-md-6 mb-2">
                                <label for="exampleInputProduc">Cultivable Land (in acres)</label> 
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
                                <button type="submit" class="btn btn-primary">Save</button></center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


