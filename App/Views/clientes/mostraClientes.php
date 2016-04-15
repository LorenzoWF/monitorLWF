<div ng-controller="CtrlLista" class="col-md-5">

  <table class="table">
    <tr>
      <th>Id Cliente</th>
      <th>Nome</th>
    </tr>
    <tr ng-repeat="cliente in clientes">
      <td>
        {{cliente.id_cliente}}
      </td>
      <td>
        {{cliente.nome}}
      </td>

    </tr>
  </table>

</div>

<script>
  var myApp = angular.module('myApp',[]);

  myApp.controller('CtrlLista', ['$scope', '$http', function($scope, $http) {

    $http.get('/getClientes').success(function(data) {
        $scope.clientes = data;
    });

  }]);
</script>
