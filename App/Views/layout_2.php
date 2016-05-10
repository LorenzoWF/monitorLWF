<!doctype html>
<html ng-app="myApp">
  <head>

      <meta charset="utf-8">
      <title>Monitor LWF</title>

      <link rel="stylesheet" type="text/css" href="plugins/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="plugins/font-awesome/css/font-awesome.css">

      <script type="text/javascript" src="plugins/js/jquery.js"></script>
      <script type="text/javascript" src="plugins/js/bootstrap.js"></script>
      <script src="plugins/js/angular.js"></script>

      <style>
        a {color:black;}
      </style>

  </head>
  <body>

    <div class="container">
        <div class="row barra_menu">

          <div class="col-md-4 titulo">

          </div>

          <div class="col-md-8">
            <ul class="nav nav-tabs">
              <li role="presentation" class="active"><a href="#">Home</a></li>
              <li role="presentation"><a href="#">Usuarios</a></li>
              <li role="presentation"><a href="#">Clientes</a></li>
              <li role="presentation"><a href="#">Servidores</a></li>
              <li role="presentation"><a href="#">Discos</a></li>
              <li role="presentation"><a href="#">Processadores</a></li>
              <li role="presentation"><a href="#">Memoria</a></li>
            </ul>
          </div>

        </div>

        <div class="row conteudo">
            <?php echo $this->content(); ?>
        </div>

        <div class="row rodape">

        </div>

    </div>

  </body>
</html>
