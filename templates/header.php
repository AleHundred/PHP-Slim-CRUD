<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Customer CRUD</title>

        <!-- Latest compiled and minified Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
       
        <!-- Google Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">

        <!-- Custom Styles-->
        <style>
          body {
            padding-top: 70px;
            padding-bottom: 30px;
          }
          .navbar-inverse .navbar-brand{
            font-family: 'Oswald', sans-serif;
            color: white;
            font-size: 22px;
          }
          .navbar-inverse{
            background-image: linear-gradient(to bottom,#1f5e89 0,#134b71 100%);
            background-color: #1f5e89;
            border-color: #1f5e89;
          }
          .navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.open>a{
            background-image: none;
            background-color: #134b71;
            border-color: #134b71;
            box-shadow: none;
          }      
          .navbar-inverse .navbar-nav>.active>a:hover, .navbar-inverse .navbar-nav>.open>a:hover{
            background-image: none;
            background-color: #063656;
            border-color: #063656;
            box-shadow: none;
          }      
          .navbar-inverse .navbar-nav>li>a {
            color: #50d7ff;
          }
          .navbar-inverse .input-group{
            padding-top: 7px;
          }
          h1{
            font-family: 'Oswald', sans-serif;
          }
          .form-group {
            margin-bottom: 5px;
          }
        </style>
      
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
        
        <!-- Latest compiled and minified Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
            <div class="col-xs-12 col-sm-8">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">Customer CRUD with PHP Slim 3</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav">
                    <li><a href="/">View All Customers</a></li>
                  </ul>
                </div><!--/.nav-collapse -->
                </div>
                <div class="col-xs-12 col-sm-4 pull-right">
                  <form class="pure-form" method="post" action="/customer/search">
                    <div class="input-group">
                      <input type="text" class="form-control" name="query" id="query" placeholder="Search customers...">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Search</button>
                      </span>
                    </div><!-- /input-group -->
                  </form>
                </div>
              </div>
            </nav>
            <div class="container theme-showcase" role="main">
              <div class="page-header">
                  <div class='btn-toolbar pull-right'>
                      <div class='btn-group'>
                          <a href="/customer/new">
                              <button type="button" class="btn btn-primary">Add a new customer</button>
                          </a>
                      </div>
                  </div>

