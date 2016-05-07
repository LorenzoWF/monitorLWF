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
        <div class="row cabecalho">
          <div class="col-md-4">
            <h1>Monitor LWF</h1>
          </div>

          <div class="col-md-7">

          </div>

          <div class="col-md-1" style="font-size: 20px;">
              </br>
              <a class="fa fa-home" aria-hidden="true"></a>
              <a class="fa fa-cog" aria-hidden="true"></a>
              <a class="fa fa-sign-out" aria-hidden="true"></a>
          </div>

        </div>

        <div class="row menu">

              <div class="col-md-5">

                <!--<div class="btn-group">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Clientes <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="/clientes">Visualizar</a></li>
                    <li><a href="/cadastrarClientes">Cadastrar</a></li>
                  </div>
                </ul>-->

                <a href="/clientes" class="btn btn-default">Clientes</a>
                <a href="/discos" class="btn btn-default">Discos</a>
                <a href="/" class="btn btn-default">Processador</a>
                <a href="/" class="btn btn-default">Memoria</a>
                <a href="/" class="btn btn-default">Relatorios</a>

            </div>
        </div>

        </br></br>

        <div class="row conteudo">
            <?php echo $this->content(); ?>
        </div>

        <div class="row rodape">

        </div>

    </div>

  </body>
</html>
