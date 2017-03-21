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
            <span>Validation - Step 1 / 3</span>
        </h2>
    </div>
    <!--//banner-->

    <!--grid-->
    <div class="validation-system">

        <div class="validation-form">

            <h3> Basic Information </h3>

            <br />

            <form>

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
                        <label class="control-label">Home Phone No.</label>
                        <input type="text" placeholder="Home Phone No." required="">
                    </div>
                    <div class="col-md-6 form-group1 form-last">
                        <label class="control-label">Other Mobile No.</label>
                        <input type="text" placeholder="Other Mobile No." required="">
                    </div>
                    <div class="clearfix"> </div>
                </div>

                <div class="clearfix"> </div>

                <div class="col-md-12 form-group2 group-mail">
                    <label class="control-label">Educational Attainment (required)</label>
                    <select>
                        <option value="0">-- Select --</option>
                        <option value="1">Primary</option>
                        <option value="2">Secondary</option>
                        <option value="3">College</option>
                        <option value="4">Others</option>
                    </select>
                </div>

                <div class="vali-form">
                    <div class="col-md-6 form-group1">
                        <label class="control-label">Profession/Occupation (required)</label>
                        <input type="text" placeholder="Profession/Occupation" required="">
                    </div>
                    <div class="col-md-6 form-group1 form-last">
                        <label class="control-label">Skills/Talent (required)</label>
                        <input type="text" placeholder="Skills/Talent" required="">
                    </div>
                </div>

                <div class="clearfix"> </div>

                <div class="vali-form">
                    <div class="col-md-6 form-group1">
                        <label class="control-label">Citizenship (required)</label>
                        <input type="text" placeholder="Citizenship" required="">
                    </div>
                    <div class="col-md-6 form-group1 form-last">
                        <label class="control-label">Blood Type (required)</label>
                        <input type="text" placeholder="Blood Type" required="">
                    </div>
                    <div class="clearfix"> </div>
                </div>

                <div class="col-md-12 form-group2 group-mail">
                    <label class="control-label">Civil Status (required)</label>
                    <select>
                        <option value="0">-- Select --</option>
                        <option value="1">Single</option>
                        <option value="2">Married</option>
                        <option value="3">Widowed</option>
                        <option value="4">Legally Separated</option>
                        <option value="5">Others</option>
                    </select>
                </div>

                <div class="vali-form">
                    <div class="col-md-6 form-group1">
                        <label class="control-label">SSS/GSIS (required)</label>
                        <input type="text" placeholder="SSS/GSIS" required="">
                    </div>
                    <div class="col-md-6 form-group1 form-last">
                        <label class="control-label">TIN (required)</label>
                        <input type="text" placeholder="TIN" required="">
                    </div>
                    <div class="clearfix"> </div>
                </div>

                <div class="col-md-12 form-group">
                    <button type="submit" class="btn btn-primary">Save and Go to Next Step</button>
                </div>

                <div class="clearfix"> </div>
            </form>

        </div>

    </div>
    <!--//grid-->

@endsection