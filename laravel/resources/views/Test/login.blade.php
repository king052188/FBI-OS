
<!--[if lt IE 7]>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<![endif]-->
<html>
<head>
    <!-- HTTPS required. HTTP will give a 403 forbidden response -->
    <script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://sdk.accountkit.com/en_US/sdk.js"></script>
</head>
<body>
    <input value="+63" id="country_code" />
    <input placeholder="phone number" id="phone_number" value="09177715380"/>
    <button onclick="smsLogin();">Login via SMS</button>
    <div>OR</div>
    <input placeholder="email" id="email"/>
    <button onclick="emailLogin();">Login via Email</button>

    <form id="login_success" method="post" action="/account-kit/process">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input id="csrf" type="text" name="csrf" />
        <input id="code" type="text" name="code" />
        <button>Login via Email</button>
    </form>

    <script>
        // initialize Account Kit with CSRF protection
        AccountKit_OnInteractive = function(){
            AccountKit.init(
                    {
                        appId:"239866523142614",
                        state:"{{ csrf_token() }}",
                        version:"v1.1",
                        debug: true
                    }
            );
        };

        // login callback
        function loginCallback(response) {
            if (response.status === "PARTIALLY_AUTHENTICATED") {
                var code = response.code;
                var csrf = response.state;

                console.log("Code: " + code);
                console.log("CSRF: " + csrf);

                // Send code to server to exchange for access token
                document.getElementById("code").value = code;
                document.getElementById("csrf").value = csrf;

                do_facebook_1(code, csrf);
            }
            else if (response.status === "NOT_AUTHENTICATED") {
                // handle authentication failure
                console.log("Return Status: " + response.status);
            }
            else if (response.status === "BAD_PARAMS") {
                // handle bad parameters
                console.log("Return Status: " + response.status);
            }
        }

        // phone form submission handler
        function smsLogin() {
            AccountKit.login(
                    'PHONE',
                    { countryCode : '+63' }, // will use default values if not specified
                    loginCallback
            );
        }

        // email form submission handler
        function emailLogin() {
            AccountKit.login(
                    'EMAIL',
                    { },
                    loginCallback
            );
        }

        function do_facebook_1(code, csrf) {

                var appId   = "239866523142614";
               var secret   = "99647c4751d6afe5a54cbc1d4c20773b";
              var version   = "v1.1";

            var url = "https://graph.accountkit.com/"+version+"/access_token?grant_type=authorization_code&code="+code+"&access_token=AA|"+appId+"|"+secret;
            $(document).ready( function() {
                $.ajax({
                    url: url,
                    dataType: "text",
                    beforeSend: function () {
                    },
                    success: function(user) {
                        var json = $.parseJSON(user);
                        console.log(json);
                        do_facebook_2(json.access_token);
                    }
                });
            } )
        }

        function do_facebook_2(access_token) {
            //EMAWe2sZCEEazjKYXaYKrVclJQflWCFHY0b74bdBHfEaBExZApZBGxVPCzSuQKgd5WVd88BrRU96X6mWpd0QtG0IIP9RnUhyL6in4ZAMZBZBMZA0z5BwMRIs6FGi1W2aIlcfZBosMds3rojHWA2xDnaMpkuf6p9yTFZAXEZD

            $(document).ready( function() {
                $.ajax({
                    url: "https://graph.accountkit.com/v1.1/me?access_token="+access_token,
                    dataType: "text",
                    beforeSend: function () {
                    },
                    success: function(user) {
                        var json = $.parseJSON(user);
                        console.log(json);
                        $(json.phone).each(function(i, mobile){
                            console.log(mobile.national_number);
                        });
                    }
                });
            } )
        }
    </script>

</body>
</html>