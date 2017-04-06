@extends("layout.portal")

@section("content")

<!--banner-->
<div class="banner">
    <h2>
        <a href="index.html">Home</a>
        <i class="fa fa-angle-right"></i>
        <span>Member's {{ $sort_type["name"] }}</span>
    </h2>
</div>
<!--//banner-->
<!--faq-->
<div class="blank">
    <a href="#" id="modal_event" class="btn btn-blue btn-lg btn-huge lato" data-toggle="modal" data-target="#myModal" style="display: none;"></a>
    <!-- FooTable -->
    <link href="{{ asset('/css/footable.core.css')}}" rel="stylesheet">
    <script src="{{ asset('/js/footable.all.min.js')}}"></script>
    <!-- FooTable -- Page-Level Scripts -->
    <style>
        ._wrapper .show_ label, ._wrapper .show_ select, ._wrapper .search_ label, ._wrapper .search_ input {
            font-family: 'Muli-Regular';
            font-size: .95em;
            padding: 5px;
            border: 0;
        }

        ._wrapper .show_ select, ._wrapper .search_ input {
            border-bottom: 1px solid darkgray;
            border-bottom: 1px solid darkgray;
        }

        ._wrapper .show_ {
            float: left;
        }

        ._wrapper .search_ {
            float: right;
        }
    </style>
    <div class="blank-page">
        <div class="_wrapper">
            <div class="show_" style="display: none;">
                <label>Show</label>
                <select>
                    <option>10</option>
                    <option>20</option>
                    <option>50</option>
                    <option>100</option>
                </select>
            </div>
            <div class="search_">
                <form action="" method="GET">
                    <label>Search</label>
                    <input type="search" name="search" id="search" placeholder="Enter name, email or mobile" style="width: 300px;" />
                </form>
            </div>
        </div>
        <table id="members_dt" class="footable table" data-sorting="true" data-page-size="10" data-limit-navigation="5">
            <thead>
            <tr>
                <th style="width: 320px;">Hash</th>
                <th>Name (Last, First Middle)</th>
                <th style="width: 110px;">Gender</th>
                <th style="width: 250px;">Email</th>
                <th style="width: 120px;">Mobile</th>
                <th style="width: 210px;">Date Registered</th>
                <th style="width: 100px;">Action</th>
            </tr>
            </thead>
            <tbody>
                @if(COUNT($members) > 0)
                    @for($i = 0; $i < COUNT($members); $i++)
                        <tr>
                            <td>{{ $members[$i]->hash_code }}</td>
                            <td>
                                <b>{{ preg_replace('/\s+/', '', strtoupper($members[$i]->last_name)) }},</b>
                                {{ preg_replace('/\s+/', '', strtoupper($members[$i]->first_name)) }}
                                {{ preg_replace('/\s+/', '', strtoupper($members[$i]->middle_name)) }}
                            </td>
                            <td>{{ $members[$i]->gender == 1 ? "Male" : "Female" }}</td>
                            <td>{{ $members[$i]->email }}</td>
                            <td>
                                <?php
                                $mobile_number = str_replace("-","", $members[$i]->mobile);
                                ?>
                                {{  $mobile_number }}
                            </td>
                            <td>
                                <?php
                                $date_time = $members[$i]->created_at;
                                $date = \App\Http\Controllers\Helper::get_current_time_stamp($date_time);
                                ?>
                                {{ $date }}
                            </td>
                            <td>
                                <select>
                                    <option value="{{ $members[$i]->Id }}:select">-- select --</option>
                                    <optgroup label="Administrator">Administrator</optgroup>
                                    <option value="{{ $members[$i]->Id }}:view">View</option>
                                    <option value="{{ $members[$i]->Id }}:activate">Activate</option>
                                    <option value="{{ $members[$i]->Id }}:deactivate">Deactivated</option>
                                    <option value="{{ $members[$i]->Id }}:reset_password">Reset Password</option>
                                    <option value="{{ $members[$i]->Id }}:remove_account">Remove Account</option>
                                    @if($user[0]->role == 3)
                                        <optgroup label="Developer Mode">Developer Mode</optgroup>
                                        <option value="{{ $members[$i]->Id }}:make_admin">Make Admin</option>
                                    @endif
                                </select>
                            </td>
                        </tr>
                    @endfor
                @else
                    <tr> <td colspan="7" style="text-align: center;"> No Records </td> </tr>
                @endif
            </tbody>
            @if(COUNT($members) > 0)
                <tfoot>
                <tr>
                    <td colspan="11">
                        <ul class="pagination pull-right"></ul>
                    </td>
                </tr>
                </tfoot>
            @endif
        </table>

        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h2 id="success_noti" class="text-center"><img src="http://icons.iconarchive.com/icons/graphicloads/100-flat-2/128/check-1-icon.png" class="img-circle"><br>Success</h2>
                        <h2 id="alert_noti" class="text-center" style="display: none;"><img src="http://icons.iconarchive.com/icons/graphicloads/100-flat-2/128/information-icon.png" class="img-circle"><br>Alert</h2>
                    </div>
                    <div class="modal-body row">
                        <div id="success_msg">
                            <h5 class="text-center">Your Payment has been sent!</h5>
                            <h6 class="text-center" style="margin-top: 5px;">Please allow us to evaluate your account within 24 to 48 Hours.</h6>
                        </div>

                        <div id="alert_msg" style="display: none;">
                            <h5 class="text-center">Your Account is not Activated!</h5>
                            <h6 class="text-center" style="margin-top: 5px;">Please allow us to evaluate your account within 24 to 48 Hours</h6>
                            <h6 class="text-center" style="margin-top: 5px;">Or Send an email to us for confirmation.</h6>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <h6 class="text-center"><a href="mailto:filipinobayanihaninc@gmail.com">For more info email us at filipinobayanihaninc@gmail.com</a></h6>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('.footable').footable();
                $("#members_dt > tbody  > tr").change(function(){
                    var selected =      $(this).find('select:first');
                    var value =         selected.val();
                    var values =        value.split(':');
                    switch (values[1]) {
                        case "view" :
                            window.location.href="/members/view/"+values[0];
                            break;
                        case "activate" :
                            $('#modal_event').click();
                            break;
                        case "deactivate" :
                            $('#modal_event').click();
                            break;
                    }
                });
            } );
        </script>

    </div>
</div>

<!--//faq-->

@endsection