<!doctype html>
<html ng-app="myApp">
<head>
    <meta charset="utf-8">
    <title>Monitor LWF</title>

    <link rel="stylesheet" type="text/css" href="plugins/css/bootstrap.css">

    <!--<script type="text/javascript" src="plugins/js/jquery.js"></script>
    <script type="text/javascript" src="plugins/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="plugins/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="plugins/js/tabela.js"></script>
    <script type="text/javascript" src="plugins/js/bootstrap.js"></script>-->

    <script src="plugins/js/angular.js"></script>


</head>
<body>

<div class="container">
    <div class="row cabecalho">
        <h1>Monitor LWF</h1>
    </div>

    <div class="row menu">
        <div class="col-md-10">
            <a href="/" class="btn btn-default">Home</a>
            <a href="/clientes" class="btn btn-default">Clientes</a>
            <a href="/discos" class="btn btn-default">Discos</a>
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
