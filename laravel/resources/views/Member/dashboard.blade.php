@extends("layout.portal")

@section("content")
    <?php
    $url_secured = $helper["status"];
    ?>
    <!--banner-->
    <style>
        input#referral_link, span.referral_label {
            color: #B3AEAE;
        }

        .banner {

        }

        div.kpa_custom {
            margin-top: -6px;
            float: right;
        }

        div.kpa_custom_referral {

        }

        .kpa_custom_referral input[type=text] {
            width: 168px;
        }

        .kpa_custom_referral button {
            width: 170px;;
        }

        @media only screen and (max-width: 505px) {
            .banner {
                height: 150px;
            }

            .kpa_custom_referral {
                margin-top: 15px;
                height: 20px;
            }

            .kpa_custom_referral input[type=text] {
                text-align: center;
                margin-top: 5px;
                width: 100%;
            }

            .kpa_custom_referral button {
                margin-top: 5px;
                width: 100%;
            }
        }
    </style>
    <div class="banner" >
        <h2>
            {{--<a href="index.html">Home</a>--}}
            <i class="fa fa-angle-right"></i>
            <span>Dashboard</span>
            <div class="kpa_custom">
                <div class="kpa_custom_referral">
                    <input type="checkbox" id="referral_checkbox" checked/> Short URL:
                    <input type="text" id="referral_link" style="border: 0px;" />
                    <button id="btnCopy" class="btn btn-default">(COPY) Referral Link</button>
                    <script>
                        var copyTextareaBtn = document.querySelector('#btnCopy');
                        copyTextareaBtn.addEventListener('click', function(event) {
                            var copyTextarea = document.querySelector('#referral_link');
                            copyTextarea.select();
                            try {
                                var successful = document.execCommand('copy');
                                var msg = successful ? 'successful' : 'unsuccessful';
                                console.log('Copying text command was ' + msg);
                            } catch (err) {
                                console.log('Oops, unable to copy');
                            }
                        });
                        $(document).ready(function() {
                            var endorsement_link = "{{ url("/endorsement/link/".$member[0]->hash_code) }}";
                            var url = "https://api-ssl.bitly.com/v3/shorten?access_token=52664555e49495d9285b20b6ccfb3fb15cb19a5b&longUrl="+endorsement_link;

                            $('#referral_checkbox').click(function() {
                                if ($(this).is(':checked')) {
                                    load_bitly();
                                }
                                else {
                                    $("#referral_link").val(endorsement_link);
                                }
                            });

                            load_bitly();
                            function load_bitly() {
                                $.ajax({
                                    url: url,
                                    dataType: "text",
                                    beforeSend: function () {
                                        $("#referral_link").val("*** Please Wait ***");
                                    },
                                    success: function(response) {
                                        var json = $.parseJSON(response);
                                        $(json.data).each(function(n, data){
                                            $("#referral_link").val(data.url);
                                        });
                                    }
                                });
                            }
                        })
                    </script>
                </div>
            </div>
        </h2>
    </div>
    <!--//banner-->

    <!--content-->
    <div class="content-top">

        <div class="col-md-4 ">
            <div class="content-top-1">
                <div class="col-md-6 top-content">
                    <h5>Connected</h5>
                    <label>{{ $statistics["Connected"] }}</label>
                </div>
                <div class="col-md-6 top-content1">
                    <div id="demo-pie-1" class="pie-title-center" data-percent="{{ $statistics["Connected"] }}"> <span class="pie-value"></span> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="content-top-1">
                <div class="col-md-6 top-content">
                    <h5>FIBAT</h5>
                    <label>0</label>
                </div>
                <div class="col-md-6 top-content1">
                    <div id="demo-pie-2" class="pie-title-center" data-percent="0"> <span class="pie-value"></span> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="content-top-1">
                <div class="col-md-6 top-content">
                    <h5>DAMAYAN</h5>
                    <label>0</label>
                </div>
                <div class="col-md-6 top-content1">
                    <div id="demo-pie-3" class="pie-title-center" data-percent="0"> <span class="pie-value"></span> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="content-top-1">

                <script type="text/javascript">
                    $(function () {
                        Highcharts.chart('container', {
                            title: {
                                text: 'Monthly Average Gross',
                                x: -20 //center
                            },
                            subtitle: {
                                text: 'Source: www.FBI-PH.org',
                                x: -20
                            },
                            xAxis: {
                                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                            },
                            yAxis: {
                                title: {
                                    text: 'Reports (₱)'
                                },
                                plotLines: [{
                                    value: 0,
                                    width: 1,
                                    color: '#808080'
                                }]
                            },
                            tooltip: {
                                valueSuffix: ' ₱'
                            },
                            legend: {
                                layout: 'vertical',
                                align: 'right',
                                verticalAlign: 'middle',
                                borderWidth: 0
                            },
                            series: [{
                                name: 'FIBAT',
                                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                            }, {
                                name: 'DAMAYAN',
                                data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
                            }, {
                                name: 'RECEIVED',
                                data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
                            }, {
                                name: 'SENT',
                                data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                            }]
                        });
                    });
                </script>
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <script src="https://code.highcharts.com/modules/exporting.js"></script>
                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

            </div>
        </div>

        <div class="clearfix"> </div>

    </div>
    <!---->
    <div class="content-bottom">
        <div class="col-md-5">
            <div class="cal1 cal_2"><div class="clndr"><div class="clndr-controls"><div class="clndr-control-button"><p class="clndr-previous-button">previous</p></div><div class="month">July 2015</div><div class="clndr-control-button rightalign"><p class="clndr-next-button">next</p></div></div><table class="clndr-table" border="0" cellspacing="0" cellpadding="0"><thead><tr class="header-days"><td class="header-day">S</td><td class="header-day">M</td><td class="header-day">T</td><td class="header-day">W</td><td class="header-day">T</td><td class="header-day">F</td><td class="header-day">S</td></tr></thead><tbody><tr><td class="day adjacent-month last-month calendar-day-2015-06-28"><div class="day-contents">28</div></td><td class="day adjacent-month last-month calendar-day-2015-06-29"><div class="day-contents">29</div></td><td class="day adjacent-month last-month calendar-day-2015-06-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-01"><div class="day-contents">1</div></td><td class="day calendar-day-2015-07-02"><div class="day-contents">2</div></td><td class="day calendar-day-2015-07-03"><div class="day-contents">3</div></td><td class="day calendar-day-2015-07-04"><div class="day-contents">4</div></td></tr><tr><td class="day calendar-day-2015-07-05"><div class="day-contents">5</div></td><td class="day calendar-day-2015-07-06"><div class="day-contents">6</div></td><td class="day calendar-day-2015-07-07"><div class="day-contents">7</div></td><td class="day calendar-day-2015-07-08"><div class="day-contents">8</div></td><td class="day calendar-day-2015-07-09"><div class="day-contents">9</div></td><td class="day calendar-day-2015-07-10"><div class="day-contents">10</div></td><td class="day calendar-day-2015-07-11"><div class="day-contents">11</div></td></tr><tr><td class="day calendar-day-2015-07-12"><div class="day-contents">12</div></td><td class="day calendar-day-2015-07-13"><div class="day-contents">13</div></td><td class="day calendar-day-2015-07-14"><div class="day-contents">14</div></td><td class="day calendar-day-2015-07-15"><div class="day-contents">15</div></td><td class="day calendar-day-2015-07-16"><div class="day-contents">16</div></td><td class="day calendar-day-2015-07-17"><div class="day-contents">17</div></td><td class="day calendar-day-2015-07-18"><div class="day-contents">18</div></td></tr><tr><td class="day calendar-day-2015-07-19"><div class="day-contents">19</div></td><td class="day calendar-day-2015-07-20"><div class="day-contents">20</div></td><td class="day calendar-day-2015-07-21"><div class="day-contents">21</div></td><td class="day calendar-day-2015-07-22"><div class="day-contents">22</div></td><td class="day calendar-day-2015-07-23"><div class="day-contents">23</div></td><td class="day calendar-day-2015-07-24"><div class="day-contents">24</div></td><td class="day calendar-day-2015-07-25"><div class="day-contents">25</div></td></tr><tr><td class="day calendar-day-2015-07-26"><div class="day-contents">26</div></td><td class="day calendar-day-2015-07-27"><div class="day-contents">27</div></td><td class="day calendar-day-2015-07-28"><div class="day-contents">28</div></td><td class="day calendar-day-2015-07-29"><div class="day-contents">29</div></td><td class="day calendar-day-2015-07-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-31"><div class="day-contents">31</div></td><td class="day adjacent-month next-month calendar-day-2015-08-01"><div class="day-contents">1</div></td></tr></tbody></table></div></div>
            <!----Calender -------->
            <link rel="stylesheet" href="{{ asset("/plugins/minimal_admin_panel/css/clndr.css", $url_secured) }}" type="text/css" />
            <script src="{{ asset("/plugins/minimal_admin_panel/js/underscore-min.js", $url_secured) }}" type="text/javascript"></script>
            <script src="{{ asset("/plugins/minimal_admin_panel/js/moment-2.2.1.js", $url_secured) }}" type="text/javascript"></script>
            <script src="{{ asset("/plugins/minimal_admin_panel/js/clndr.js", $url_secured) }}" type="text/javascript"></script>
            <script src="{{ asset("/plugins/minimal_admin_panel/js/site.js", $url_secured) }}" type="text/javascript"></script>
            <!----End Calender -------->
        </div>
        <div class="col-md-7 mid-content-top">
            <div class="middle-content">
                <h3>Latest Images</h3>
                <!-- start content_slider -->
                <div id="owl-demo" class="owl-carousel text-center">
                    <div class="item">
                        <img class="lazyOwl img-responsive" data-src="{{ asset("/plugins/minimal_admin_panel/images/na.jpg", $url_secured) }}" alt="name">
                    </div>
                    <div class="item">
                        <img class="lazyOwl img-responsive" data-src="{{ asset("/plugins/minimal_admin_panel/images/na1.jpg", $url_secured) }}" alt="name">
                    </div>
                    <div class="item">
                        <img class="lazyOwl img-responsive" data-src="{{ asset("/plugins/minimal_admin_panel/images/na2.jpg", $url_secured) }}" alt="name">
                    </div>
                    <div class="item">
                        <img class="lazyOwl img-responsive" data-src="{{ asset("/plugins/minimal_admin_panel/images/na.jpg", $url_secured) }}" alt="name">
                    </div>
                    <div class="item">
                        <img class="lazyOwl img-responsive" data-src="{{ asset("/plugins/minimal_admin_panel/images/na1.jpg", $url_secured) }}" alt="name">
                    </div>
                    <div class="item">
                        <img class="lazyOwl img-responsive" data-src="{{ asset("/plugins/minimal_admin_panel/images/na2.jpg", $url_secured) }}" alt="name">
                    </div>
                    <div class="item">
                        <img class="lazyOwl img-responsive" data-src="{{ asset("/plugins/minimal_admin_panel/images/na.jpg", $url_secured) }}" alt="name">
                    </div>
                </div>
            </div>
            <!--//sreen-gallery-cursual---->
            <!-- requried-jsfiles-for owl -->
            <link href="{{ asset("/plugins/minimal_admin_panel/css/owl.carousel.css", $url_secured) }}" rel="stylesheet">
            <script src="{{ asset("/plugins/minimal_admin_panel/js/owl.carousel.js", $url_secured) }}"></script>
            <script>
                $(document).ready(function() {
                    $("#owl-demo").owlCarousel({
                        items : 3,
                        lazyLoad : true,
                        autoPlay : true,
                        pagination : true,
                        nav:true,
                    });
                });
            </script>
            <!-- //requried-jsfiles-for owl -->
        </div>
        <div class="clearfix"> </div>
    </div>

    <!-----
    <div class="content-bottom">
        <div class="col-md-6 post-top">
            <div class="post">
                <form class="text-area">
                    <textarea   required="" > What are you doing...</textarea>
                </form>
                <div class="post-at">
                    <ul class="icon">
                        <div  class="post-file">
                            <i class="fa fa-location-arrow"></i>
                            <input id="input-1" name="input1[]" type="file" multiple="" class="">
                        </div>
                        <div  class="post-file">
                            <i class="fa fa-camera"></i>
                            <input id="input-2" name="input2[]" type="file" multiple="" class="">
                        </div>
                        <div  class="post-file">
                            <i class="fa fa-video-camera"></i>
                            <input id="input-3" name="input3[]" type="file" multiple="" class="">
                        </div>
                        <div  class="post-file">
                            <i class="fa fa-microphone"></i>
                            <input id="input-4" name="input4[]" type="file" multiple="" class="">
                        </div>
                        <script>
                            $(document).on('ready', function() {
                                $("#input-1").fileinput({showCaption: false});
                            });
                        </script>
                        <script>
                            $(document).on('ready', function() {
                                $("#input-2").fileinput({showCaption: false});
                            });
                        </script>
                        <script>
                            $(document).on('ready', function() {
                                $("#input-3").fileinput({showCaption: false});
                            });
                        </script>
                        <script>
                            $(document).on('ready', function() {
                                $("#input-4").fileinput({showCaption: false});
                            });
                        </script>
                    </ul>
                    <form class="text-sub">
                        <input type="submit" value="post">
                    </form>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="post-bottom">
                <div class="post-bottom-1">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <p>15k <label>Likes</label></p>
                </div>
                <div class="post-bottom-2">
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <p>20M <label>Followers</label></p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="weather">
                <div class="weather-top">
                    <div class="weather-top-left">
                        <div class="degree">
                            <figure class="icons">
                                <canvas id="partly-cloudy-day" width="64" height="64">
                                </canvas>
                            </figure>
                            <span>37°</span>
                            <div class="clearfix"></div>
                        </div>
                        <script>
                            var icons = new Skycons({"color": "#1ABC9C"}),
                                    list  = [
                                        "clear-night", "partly-cloudy-day",
                                        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                                        "fog"
                                    ],
                                    i;

                            for(i = list.length; i--; )
                                icons.set(list[i], list[i]);

                            icons.play();
                        </script>
                        <p>FRIDAY
                            <label>13</label>
                            <sup>th</sup>
                            AUG
                        </p>
                    </div>
                    <div class="weather-top-right">
                        <p><i class="fa fa-map-marker"></i>lorem ipsum</p>
                        <label>lorem ipsum</label>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="weather-bottom">
                    <div class="weather-bottom1">
                        <div class="weather-head">
                            <h4>Cloudy</h4>
                            <figure class="icons">
                                <canvas id="cloudy" width="58" height="58"></canvas>
                            </figure>
                            <script>
                                var icons = new Skycons({"color": "#999"}),
                                        list  = [
                                            "clear-night", "cloudy",
                                            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                                            "fog"
                                        ],
                                        i;

                                for(i = list.length; i--; )
                                    icons.set(list[i], list[i]);

                                icons.play();
                            </script>
                            <h6>20°</h6>
                            <div class="bottom-head">
                                <p>August 16</p>
                                <p>Monday</p>
                            </div>
                        </div>
                    </div>
                    <div class="weather-bottom1 ">
                        <div class="weather-head">
                            <h4>Sunny</h4>
                            <figure class="icons">
                                <canvas id="clear-day" width="58" height="58">
                                </canvas>
                            </figure>
                            <script>
                                var icons = new Skycons({"color": "#999"}),
                                        list  = [
                                            "clear-night", "clear-day",
                                            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                                            "fog"
                                        ],
                                        i;

                                for(i = list.length; i--; )
                                    icons.set(list[i], list[i]);

                                icons.play();
                            </script>
                            <h6>37°</h6>
                            <div class="bottom-head">
                                <p>August 17</p>
                                <p>Tuesday</p>
                            </div>
                        </div>
                    </div>
                    <div class="weather-bottom1">
                        <div class="weather-head">
                            <h4>Rainy</h4>
                            <figure class="icons">
                                <canvas id="sleet" width="58" height="58">
                                </canvas>
                            </figure>
                            <script>
                                var icons = new Skycons({"color": "#999"}),
                                        list  = [
                                            "clear-night", "clear-day",
                                            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                                            "fog"
                                        ],
                                        i;

                                for(i = list.length; i--; )
                                    icons.set(list[i], list[i]);

                                icons.play();
                            </script>

                            <h6>7°</h6>
                            <div class="bottom-head">
                                <p>August 18</p>
                                <p>Wednesday</p>
                            </div>
                        </div>
                    </div>
                    <div class="weather-bottom1 ">
                        <div class="weather-head">
                            <h4>Snowy</h4>
                            <figure class="icons">
                                <canvas id="snow" width="58" height="58">
                                </canvas>
                            </figure>
                            <script>
                                var icons = new Skycons({"color": "#999"}),
                                        list  = [
                                            "clear-night", "clear-day",
                                            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                                            "fog"
                                        ],
                                        i;

                                for(i = list.length; i--; )
                                    icons.set(list[i], list[i]);

                                icons.play();
                            </script>
                            <h6>-10°</h6>
                            <div class="bottom-head">
                                <p>August 16</p>
                                <p>Thursday</p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>

            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!--//content-->
@endsection