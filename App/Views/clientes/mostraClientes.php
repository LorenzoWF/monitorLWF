<div  class="col-md-3">
  <div ng-controller="CtrlLista">

    <i class="fa fa-filter" aria-hidden="true" style="font-size: 20px;"></i>
    <input type="search" name="busca" class="form-control" ng-model="busca">

    <table class="table">
      <tr>
        <th>Id Cliente</th>
        <th>Nome</th>
        <th></th>
      </tr>
      <tr ng-repeat="cliente in clientes | filter:busca">
        <td> {{cliente.id_cliente}} </td>
        <td> {{cliente.nome}}</td>
        <td><a class="fa fa-home" aria-hidden="true" data-toggle="modal" data-target=".bs-example-modal-lg"></a>  </td>
      </tr>
    </table>


    <!-- Large modal -->
    <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>-->

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          ...
        </div>
      </div>
    </div>

  </div>
</div>

<div class="col-md-5">
  <div ng-controller="CtrlCadastro">
    <h3>Nome Cliente: </h3> <input type="text" name="cadastroNome" class="form-control" ng-model="vNome">
    <button type="button" class="btn btn-primary" name="cadastrar" ng-click="cadastrar()">Cadastrar Cliente</button>
  </div>
</div>

<!-- script para mostrar os clientes -->
<script>
  var myApp = angular.module('myApp',[]);

  myApp.controller('CtrlLista', ['$scope', '$http', function($scope, $http) {

    $http.get('/getClientes').success(function(data) {
        $scope.clientes = data;
    });

  }]);


  myApp.controller('CtrlCadastro', ['$scope', '$http', function($scope, $http) {
    $scope.cadastrar = function() {

      var cad = {vNome: $scope.vNome};

      $http.post('/setCliente', cad).success(function (cad) {
        alert(cad);

      }).error(function (cad) {
        alert('error');
      });

    }
  }]);

</script>
