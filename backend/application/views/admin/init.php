<html ng-app="app">
<head>
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Brand</a>
      </div>
  
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="/admin">List <span class="sr-only">(current)</span></a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <div ui-view></div>


  <script src="/bower_components/jquery/dist/jquery.min.js"></script>  
  <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="/bower_components/angular/angular.min.js"></script>
  <script src="/bower_components/angular-route/angular-route.min.js"></script>
  <script src="/bower_components/angular-sanitize/angular-sanitize.min.js"></script>
  <script src="/bower_components/angular-resource/angular-resource.min.js"></script>
  
  <script src="/cs_admin/app.module.js"></script>
  <!--<script src="/cs_admin/_navi/_module.js"></script>-->
  
  <script src="/cs_admin/shop/_module.js"></script>  
  <script src="/cs_admin/shop/list.controller.js"></script>
  <script src="/cs_admin/shop/register.controller.js"></script>
</body>
</html>