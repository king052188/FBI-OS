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
            <span>Validation - Step 3 / 3</span>
        </h2>
    </div>
    <!--//banner-->

    <!--grid-->
    <div class="validation-system">

        <div class="validation-form">

            <h3> Payment Information </h3>

            <br />

            <form>

                <div class="col-md-12 form-group2 group-mail">
                    <label class="control-label">Member Type (required)</label>
                    <select>
                        <option value="0">-- Select --</option>
                        <option value="1">Regular</option>
                    </select>
                </div>

                <div class="col-md-12 form-group2 group-mail">
                    <label class="control-label">Mode of Payment (required)</label>
                    <select>
                        <option value="0">-- Select --</option>
                        <option value="1">Via Specialist</option>
                        <option value="2">Via Coins.ph - 37bz492NKw5qWjLvx5zJPMrDxRVt1kpUey</option>
                        <option value="3">Express Money Sender</option>
                    </select>
                </div>

                <div class="col-md-12 form-group2 group-mail">
                    <label class="control-label">Amount Deposited (required)</label>
                    <select>
                        <option value="0">-- Select --</option>
                        <option value="1">P500.00</option>
                        <option value="2">P1,500.00</option>
                    </select>
                </div>

                <div class="clearfix"> </div>

                <div class="col-md-12 form-group1 group-mail">
                    <label class="control-label">Proof of payment: Write name of the Specialist or Send a link of print-screen (https://prnt.sc/) when using coins.ph or any express money senders</label>
                    <input type="text" placeholder="House No./Streets" required="">
                </div>

                <div class="clearfix"> </div>

                <div class="col-md-12 form-group2 group-mail">
                    <label class="control-label">Do you hereby authorize the company to deduct from your rewards and virtual wallet account all payments and charges that will be incurred your my participation and availment of the company’s program and services.</label>
                    <br />
                    <br />
                    <label class="control-label"><input type="radio" name="confirming_a" value="1" checked> YES</label>
                    <label class="control-label"><input type="radio" name="confirming_a" value="0"> NO</label>
                </div>

                <div class="col-md-12 form-group2 group-mail">
                    <label class="control-label">In pursuance to the realization of its mission, you further give your consent to receive SMS BROADCAST relating to public information and interest and within the bounds of the welfare of the general membership and the organization as a whole.</label>
                    <br />
                    <br />
                    <label class="control-label"><input type="radio" name="confirming_b" value="1" checked> YES</label>
                    <label class="control-label"><input type="radio" name="confirming_b" value="0"> NO</label>
                </div>

                <div class="col-md-12 form-group2 group-mail">
                    <label class="control-label">Do certify to the correctness of the foregoing information and statements and affirm your membership to the FILIPINO BAYANIHAN and allow to adhere and propagate the ideals, mission and vision especially in the service to your fellowmen and countrymen.</label>
                    <br />
                    <br />
                    <label class="control-label"><input type="radio" name="confirming_c" value="1" checked> YES</label>
                    <label class="control-label"><input type="radio" name="confirming_c" value="0"> NO</label>
                </div>

                <div class="col-md-12 form-group">
                    <a href="/edit-profile?page=basic" class="btn btn-default">Previous Step</a>
                    <button type="submit" class="btn btn-primary">Payment's Done</button>
                </div>

                <div class="clearfix"> </div>
            </form>

        </div>

    </div>
    <!--//grid-->

@endsection