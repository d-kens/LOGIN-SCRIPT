<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Authentication </title>

    <!--Boostrp CSS-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen" />

    <!--custom css-->
    <link href="libs/css/custom.css" rel="stylesheet">
</head>
<body>

    <!--Navigation-->
    <div class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <!-- to enable navigation dropdown when viewed in mobile device -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
 
            <!-- Change "Your Site" to your site name -->
            <a class="navbar-brand" href="">Ecommerce Store</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="">Home</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li> <a href="">Logout</a> </li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="">
                            <span class="glyphicon glyphicon-log-in"></span> LOGIN
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="glyphicon glyphicon-check"></span> REGISTER
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--container-->
    <div class="container">
        <div class="col-md-12">
            <div class="page-header">
                <h1> Onyango Dickens</h1>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="account-wall">
                <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane active" id="login">
                        <label> LOGIN </label>
                        <form action="" class="form-signin">
                            <input type="text" name="email" class="form-control" placeholder="Email" required autofocus>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                            <input type="submit" class="btn btn-lg btn-primary btn-block" value="LOGIN">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 
<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<!-- end HTML page -->
    
</body>
</html>