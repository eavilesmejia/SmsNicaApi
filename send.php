<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="Flat-UI-master/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Flat-UI-master/css/flat-ui.css">
    <link rel="stylesheet" href="css/prettify.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/vendor/modernizr-2.8.0.min.js"></script>
    <link href="/img/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <noscript>
        <style type="text/css">
            .prettyprint{
                color: #FFFFFF;
                padding-left:60px
            }
        </style>
    </noscript>
</head>
<body>
<a class="hidden-xs img-responsive" href="https://github.com/BruceLampson/SmsNicaApi"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/e7bbb0521b397edbd5fe43e7f760759336b5e05f/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677265656e5f3030373230302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_green_007200.png"></a>
<div class="page-container">

<!-- top navbar -->
<div class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".sidebar-nav">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">

            </a>
        </div>
    </div>
</div>

<div class="container">
<!--[if lt IE 8]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<noscript><h1>We recommend enabling JavaScript for a better user experience ;)</h1></noscript>
<img src="/img/smsnica180x180.png" class="img-circle img-responsive"  > <h3 class="hidden-xs">SmsNica::API</h3>
<hr>
<!-- sidebar -->
<div class="row row-offcanvas row-offcanvas-left">
    <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
        <ul class="nav">
            <li><a href=index.php>Introduction</a></li>
            <li class="active"><a href="send.php">Send</a></li>
            <li><a href="read.php">Read</a></li>
            <li><a href="carrier.php">Carrier</a></li>
            <li><a href="error.php">Error</a></li>
        </ul>
    </div>
    <!-- main area -->
    <div class="col-xs-12 col-sm-9">
    <h6>Sending SMS or Flash SMS</h6>

    <p>Sending an SMS or Flash SMS is one of the most common tasks performed on the SmsNica Platform. Sending a message is as simple as POST-ing to the Messages resource but since it’s a common action it’s worth walking through in detail below.</p>

    <h6>Request URL:</h6>
    <p>Use the following url for sending a plain text SMS</p>
    <pre class="prettyprint"> GET|POST https://www.smsnica.com/api/v1/send/sms</pre>
    <p>Use the following url for sending a flash SMS. For more information about flash SMS <a href="http://en.wikipedia.org/wiki/Short_Message_Service#Flash_SMS" target="_blank">click here</a></p>
    <pre class="prettyprint">GET|POST https://www.smsnica.com/api/v1/send/flash/sms</pre>
    <br>
    <h6>Required Parameters:</h6>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th style="width: 100px;">Name</th>
                <th style="width: 50px;">Type</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>apikey</td>
                <td>string</td>
                <td>Generated by SmsNica and located in your dashboard settings.</td>
            </tr>
            <tr>
                <td>accesstoken</td>
                <td>string</td>
                <td>Generated by SmsNica and located in your dashboard settings.</td>
            </tr>
            <tr>
                <td>number</td>
                <td>string</td>
                <td>The receiver's mobile number.</td>
            </tr>
            <tr>
                <td>message</td>
                <td>string</td>
                <td>A string composed of <strong>x</strong> number of characters depending on your subscription type and/or data coding scheme.</td>
            </tr>
            <tr>
                <td>[custom]</td>
                <td>varchar</td>
                <td>This is an <span class="optional">Optional</span> parameter that you can send with your request and will be return on success response</td>
            </tr>
            </tbody>
        </table>
    </div>
    <br>
    <!-- Nav tabs -->
    <h6>Sample Snippets:</h6>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#php" data-toggle="tab">PHP</a></li>
        <li><a href="#jquery" data-toggle="tab">jQuery.ajax()</a></li>
        <li><a href="#getjson" data-toggle="tab">jQuery.getJSON()</a></li>
        <li><a href="#node" data-toggle="tab">NodeJs</a></li>
        <li><a href="#ruby" data-toggle="tab">Ruby</a></li>
        <li><a href="#java" data-toggle="tab">Java</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="php">
    <pre class="prettyprint linenums">
    // Get cURL resource
    $curl = curl_init();
    // Set some options
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_URL => 'https://www.smsnica.com/api/v1/send/sms',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => array(
            'accesstoken' => {{accesstoken}},
            'apikey' => {{apikey}},
            'number' => {{number}},
            'message' => {{message}}
        )
    ));
    // Send the request & save response to $resp
    $resp = curl_exec($curl);
    // Close request to clear up some resources
    curl_close($curl);
    </pre>
        </div>
        <div class="tab-pane" id="jquery">
    <pre class="prettyprint lang-js linenums">
    (function($){
        $.ajax({
            type: 'POST',
            url: 'https://www.smsnica.com/api/v1/send/flash/sms',
            dataType: 'json',
            data: {
                accesstoken: "{{accesstoken}}",
                apikey: "{{apikey}}",
                number: "{{number}}",
                message: "{{message}}"
            },
            success: function(data){
                console.log(data);
            },
            complete: function(){
                //Implement your logic
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log(errorThrown);
            }
        });
    })(jQuery);
    </pre>
        </div>
        <div class="tab-pane" id="getjson">
    <pre class="prettyprint lang-js linenums">
        (function($){
            $.getJSON( 'https://www.smsnica.com/api/v1/send/sms', {
                accesstoken: "{{accesstoken}}",
                apikey: "{{apikey}}",
                number: "{{number}}",
                message: "{{message}}"
            })
                .done(function( data ) {
                    console.log(data);
                });
        })(jQuery);
    </pre>
        </div>
        <div class="tab-pane" id="node">
    <pre class="prettyprint lang-js linenums">
var request = require('request'); // https://www.npmjs.org/package/request

var data = {
    url: 'https://www.smsnica.com/api/v1/send/sms',
    form: {
        apikey: '{{apikey}}',
        accesstoken: '{{accesstoken}}',
        number: '{{number}}',
        message: '{{message}}'
    }
};

request.post(data, function (err, res, body) {
    console.log('body:', body);
});
</pre>
        </div>
        <div class="tab-pane" id="ruby">
    <pre class="prettyprint lang-rb linenums">
    require "net/https"
    require "uri"

    uri = URI.parse('https://www.smsnica.com/api/v1/send/sms')

    http = Net::HTTP.new(uri.host, uri.port)

    request = Net::HTTP::Post.new(uri.request_uri)
    request.set_form_data(
            accesstoken => "{{accesstoken}}",
            apikey => "{{apikey}}",
            number => "{{number}}",
            message => "{{message}}"
    )

    response = http.request(request)
    </pre>
        </div>
        <div class="tab-pane" id="java">
    <pre class="prettyprint lang-rb linenums">
    import java.io.BufferedReader;
    import java.io.DataOutputStream;
    import java.io.InputStreamReader;
    import java.net.HttpURLConnection;
    import java.net.URL;
    import javax.net.ssl.HttpsURLConnection;

    public class smsnicaSendSms {

        private final String USER_AGENT = "Mozilla/5.0";

        public static void main(String[] args) throws Exception {

            smsnicaSendSms http = new smsnicaSendSms();

            System.out.println("\nTesting  - Send Http POST request");
            http.sendPost();

        }

        // HTTP POST request
        private void sendPost() throws Exception {

            String url = "https://www.smsnica.com/api/v1/send/flash/sms";
            URL obj = new URL(url);
            HttpsURLConnection con = (HttpsURLConnection) obj.openConnection();

            //add request header
            con.setRequestMethod("POST");
            con.setRequestProperty("User-Agent", USER_AGENT);
            con.setRequestProperty("Accept-Language", "en-US,en;q=0.5");

            String nvp = "accesstoken={{accesstoken}}&apikey={{apikey}}&number={{number}}&message={{message}}";

            // Send post request
            con.setDoOutput(true);
            DataOutputStream wr = new DataOutputStream(con.getOutputStream());
            wr.writeBytes(nvp);
            wr.flush();
            wr.close();

            int responseCode = con.getResponseCode();
            System.out.println("\nSending 'POST' request to URL : " + url);
            System.out.println("Post parameters : " + nvp);
            System.out.println("Response Code : " + responseCode);

            BufferedReader in = new BufferedReader(
                    new InputStreamReader(con.getInputStream()));
            String inputLine;
            StringBuffer response = new StringBuffer();

            while ((inputLine = in.readLine()) != null) {
                response.append(inputLine);
            }
            in.close();

            //print result
            System.out.println(response.toString());

        }

    }
    </pre>
        </div>
    </div>
    <br>
    <h6>Sample Response:</h6>
    <pre class="prettyprint linenums">
    {
        "transactionStatus": 1,
        "response": "Message sent",
        "processId": "MjEzMA==",
        "number": "50583240355",
        "message": "Hola, me gustaría saber que promoción tienen para este fin de semana?",
        "carrier": "movistar",
        "credits": 999,
        "dateTime": {
            "date": "<?php echo date('d/m/Y g:i A'); ?>",
            "timezone_type": 3,
            "timezone": "America/Managua"
        },
        "code": 200
    }
    </pre>
    <br>


    </div><!-- /.col-xs-12 main -->

</div>

</div><!--/.page-container-->

<script src="Flat-UI-master/js/jquery-1.8.3.min.js"></script>
<script src="Flat-UI-master/js/bootstrap.min.js"></script>
<script src="Flat-UI-master/bootstrap/js/google-code-prettify/prettify.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
<script type="text/javascript">
    //<!--
    prettyPrint();
    //-->
</script>
<script type="text/javascript">
    //<!--
    $(document).ready(function() { $('[data-toggle=offcanvas]').click(function() { $('.row-offcanvas').toggleClass('active');});});
    //-->
</script>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
     function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
     e=o.createElement(i);r=o.getElementsByTagName(i)[0];
     e.src='//www.google-analytics.com/analytics.js';
     r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
     ga('create','UA-XXXXX-X');ga('send','pageview');
</script>
</body>
</html>
