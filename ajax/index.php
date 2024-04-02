<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Menyisipkan Bootstrap -->
 

    <link rel="stylesheet" type="text/css" href="res/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="res/js/bootstrap.min.js">
</head>
<body>
    <div class="container" style="height: 100%">
        <div class="row" style="margin-top: 13%;margin-bottom: 13%">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"></h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="dashboard.php">
                            <div class="form-group hidden" id="incorrect">
                                <div class="col-md-10 col-md-offset-1" align="center">
                                    <div class="alert alert-primary" role="alert" >
                                        Simple C.H.A.T App
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="userid" class="col-md-4 control-label">Username</label>

                                <div class="col-md-6">
                                    <input id="name" name="name" type="text" class="form-control" value="" required autofocus placeholder="Your name here">
                                    <small id="emailHelp" class="form-text text-muted">Anda bisa melakukan chat tanpa mengenal siapapun</small>
                                </div>
                            </div>

                            <br>
                            <hr>

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-4">
                                    <button type="submit" class="btn btn-primary btn-block" id="loginsubmit"
                                    data-loading-text="Logging in..." autocomplete="off">
                                        Masuk
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
