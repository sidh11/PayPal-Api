<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pricing Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <style type="text/css">
        .container { margin-top: 100px; }
        .list-group-item { padding: 5px; border: 0px; }
        .price { font-size: 72px; }
        .currency {
            font-size:25px;
            position: relative;
            top: -30px;
        }
        .card { width: 350px; }
        .card:hover {
            -webkit-transform: scale(1.05);
            -moz-transform: scale(1.05);
            -ms-transform: scale(1.05);
            -o-transform: scale(1.05);
            transform: scale(1.05);
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            -ms-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-offset-3">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="price"><span class="currency">$</span>67</h3>
                    </div>
                    <div class="card-block text-center">
                        <div class="card-title">
                            WordPress Plugin
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item">Feature 1</li>
                            <li class="list-group-item">Feature 2</li>
                            <li class="list-group-item">Feature 3</li>
                            <li class="list-group-item">Feature 4</li>
                            <li class="list-group-item">Feature 5</li>
                        </ul>
                        <br><br>
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
