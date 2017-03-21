@extends("layout.portal")

@section("content")
    <?php
    $url_secured = $helper["status"];
    ?>

    <!--banner-->
    <div class="banner">
        <h2>
            <a href="/login">Home</a>
            <i class="fa fa-angle-right"></i>
            <span>Validation - Step 2 / 3</span>
        </h2>
    </div>
    <!--//banner-->

    <!--grid-->
    <div class="validation-system">

        <div class="validation-form">

            <h3> Additional Information </h3>

            <br />

            <form>

                <div class="col-md-12 form-group1 group-mail">
                    <label class="control-label">Name of Espouse (if any)</label>
                    <input type="text" placeholder="House No./Streets">
                </div>

                <div class="vali-form">
                    <div class="col-md-6 form-group1">
                        <label class="control-label">Name(s) of Children (if any)</label>
                        <input type="text" placeholder="Province">
                    </div>
                    <div class="col-md-6 form-group1 form-last">
                        <label class="control-label">Name(s) of Beneficiary (required)</label>
                        <input type="text" placeholder="Zip Code" required="">
                    </div>

                    <div class="clearfix"> </div>
                </div>

                <div class="col-md-12 form-group1 group-mail">
                    <label class="control-label">Use Home Address in Previous Form</label>
                    <input type="checkbox">
                </div>

                <div class="col-md-12 form-group1 group-mail">
                    <label class="control-label">House No./Streets (required)</label>
                    <input type="text" placeholder="House No./Streets" required="">
                </div>

                <div class="vali-form">
                    <div class="col-md-6 form-group1">
                        <label class="control-label">Barangay (required)</label>
                        <input type="text" placeholder="Barangay" required="">
                    </div>
                    <div class="col-md-6 form-group1 form-last">
                        <label class="control-label">City/Municipality (required)</label>
                        <input type="text" placeholder="City/Municipality" required="">
                    </div>
                </div>

                <div class="clearfix"> </div>

                <div class="vali-form">
                    <div class="col-md-6 form-group1">
                        <label class="control-label">Province (required)</label>
                        <input type="text" placeholder="Province" required="">
                    </div>
                    <div class="col-md-6 form-group1 form-last">
                        <label class="control-label">Zip Code (required)</label>
                        <input type="text" placeholder="Zip Code" required="">
                    </div>
                </div>

                <div class="clearfix"> </div>

                <div class="vali-form">
                    <div class="col-md-6 form-group1">
                        <label class="control-label">Telephone No. (If Any)</label>
                        <input type="text" placeholder="Home Phone No.">
                    </div>
                    <div class="col-md-6 form-group1 form-last">
                        <label class="control-label">Mobile No.</label>
                        <input type="text" placeholder="Other Mobile No." required="">
                    </div>
                    <div class="clearfix"> </div>
                </div>

                <div class="clearfix"> </div>

                <div class="col-md-12 form-group">
                    <a href="/edit-profile?page=basic" class="btn btn-default">Previous Step</a>
                    <button type="submit" class="btn btn-primary">Save and Go To Payment</button>
                </div>

                <div class="clearfix"> </div>
            </form>

        </div>

    </div>
    <!--//grid-->

@endsection