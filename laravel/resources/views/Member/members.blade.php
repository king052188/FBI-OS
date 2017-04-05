@extends("layout.portal")

@section("content")

<!--banner-->
<div class="banner">
    <h2>
        <a href="index.html">Home</a>
        <i class="fa fa-angle-right"></i>
        <span>Blank</span>
    </h2>
</div>
<!--//banner-->
<!--faq-->
<div class="blank">


    <div class="blank-page">
        <table id="members_dt" class="display" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th style="width: 320px;">Hash</th>
                <th>Name (Last, First Middle)</th>
                <th style="width: 100px;">Gender</th>
                <th style="width: 150px;">Mobile</th>
                <th style="width: 180px;">Date Registered</th>
                <th style="width: 100px;">Action</th>
            </tr>
            </thead>
            <tbody>
                @for($i = 0; $i < COUNT($members); $i++)
                    <tr>
                        <td>{{ $members[$i]->hash_code }}</td>
                        <td>
                            <b>{{ preg_replace('/\s+/', '', strtoupper($members[$i]->last_name)) }},</b>
                            {{ preg_replace('/\s+/', '', strtoupper($members[$i]->first_name)) }}
                            {{ preg_replace('/\s+/', '', strtoupper($members[$i]->middle_name)) }}
                        </td>
                        <td>{{ $members[$i]->gender == 1 ? "Male" : "Female" }}</td>
                        <td>{{ $members[$i]->mobile }}</td>
                        <td>
                            <?php
                                $date_time = $members[$i]->created_at;
                                $date = \App\Http\Controllers\Helper::get_current_time_stamp($date_time);
                            ?>
                            {{ $date }}
                        </td>
                        <td>
                            <select>
                                <option>View</option>
                                <option>Activate</option>
                                <option>Deactivated</option>
                                <option>Reset Password</option>
                            </select>
                        </td>
                    </tr>
                @endfor
            </tbody>
            <tfoot>
            <tr>
                <th>Hash</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Mobile</th>
                <th>Date Registered</th>
                <th>Action</th>
            </tr>
            </tfoot>
        </table>

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
        <script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#members_dt').DataTable();
            } );
        </script>
        <style>

            table#members_dt th {
                padding: 5px;
                font-weight: 600;
                font-size: .95em;
            }
            table#members_dt td {
                padding: 5px;
                font-family: 'Muli-Regular';
                font-size: .95em;
            }
            div#members_dt_length label, div#members_dt_length select {
                font-family: 'Muli-Regular';
                font-size: .95em;
            }

            div#members_dt_filter label, div#members_dt_filter input {
                font-family: 'Muli-Regular';
                font-size: .95em;
            }

            .dataTables_wrapper .dataTables_paginate .paginate_button:hover{
                color:white !important;
                border:1px solid #EF0F7B;
                background-color:#EF0F7B;
                background:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #EF0F7B), color-stop(100%, #EF0F7B));
                background:-webkit-linear-gradient(top, #EF0F7B 0%, #EF0F7B 100%);
                background:-moz-linear-gradient(top, #EF0F7B 0%, #EF0F7B 100%);
                background:-ms-linear-gradient(top, #EF0F7B 0%, #EF0F7B 100%);
                background:-o-linear-gradient(top, #EF0F7B 0%, #EF0F7B 100%);
                background:linear-gradient(to bottom, #EF0F7B 0%, #EF0F7B 100%)
            }

            .dataTables_wrapper .dataTables_paginate .paginate_button:active{
                outline:none;
                background-color:#EF0F7B;
                background:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #2b2b2b), color-stop(100%, #EF0F7B));
                background:-webkit-linear-gradient(top, #EF0F7B 0%, #EF0F7B 100%);
                background:-moz-linear-gradient(top, #EF0F7B 0%, #EF0F7B 100%);
                background:-ms-linear-gradient(top, #EF0F7B 0%, #EF0F7B 100%);
                background:-o-linear-gradient(top, #EF0F7B 0%, #EF0F7B 100%);
                background:linear-gradient(to bottom, #EF0F7B 0%, #EF0F7B 100%);
                box-shadow:inset 0 0 3px #111
            }

            .paginate_button.current,.dataTables_wrapper .dataTables_paginate .paginate_button.current:hover{
                color:#333 !important;
                border:1px solid #EF0F7B;
                background-color:#EF0F7B;
                background:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #EF0F7B), color-stop(100%, #EF0F7B));
                background:-webkit-linear-gradient(top, #EF0F7B 0%, #EF0F7B 100%);
                background:-moz-linear-gradient(top, #EF0F7B 0%, #EF0F7B 100%);
                background:-ms-linear-gradient(top, #EF0F7B 0%, #EF0F7B 100%);
                background:-o-linear-gradient(top, #EF0F7B 0%, #EF0F7B 100%);
                background:linear-gradient(to bottom, #EF0F7B 0%, #EF0F7B 100%)
            }

        </style>
    </div>
</div>

<!--//faq-->

@endsection