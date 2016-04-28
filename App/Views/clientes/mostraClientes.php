<div  class="col-md-5">
  <div ng-controller="CtrlLista">

    <h3>Busca: </h3> <input type="search" name="busca" class="form-control" ng-model="busca">

    <table class="table">
      <tr>
        <th>Id Cliente</th>
        <th>Nome</th>
      </tr>
      <tr ng-repeat="cliente in clientes | filter:busca">
        <td>
          {{cliente.id_cliente}}
        </td>
        <td>
          {{cliente.nome}}
        </td>

      </tr>
    </table>
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
