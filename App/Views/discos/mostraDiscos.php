<div ng-controller="CtrlLista" class="col-md-12">

  <table class="table">
    <tr>
      <th>Cliente</th>
      <th>Servidor</th>
      <th>Local</th>
      <th>Particao</th>
      <th>Total (GB)</th>
      <th>Usado (GB)</th>
      <th>Disponivel (GB)</th>
      <th>Porcentagem de uso</th>
      <th>Data da comunicacao</th>
      <th>Horario da comunicacao</th>
    </tr>
    <tr ng-repeat="disco in discos">
      <td>{{disco.nome}}</td>
      <td>{{disco.descricao}}</td>
      <td>{{disco.local}}</td>
      <td>{{disco.particao}}</td>
      <td>{{disco.total}}</td>
      <td>{{disco.usado}}</td>
      <td>{{disco.disponivel}}</td>
      <td>{{disco.porcentagem}} %</td>
      <td>{{disco.data}}</td>
      <td>{{disco.horario}}</td>
    </tr>
  </table>

</div>

<script>
  var myApp = angular.module('myApp',[]);

  myApp.controller('CtrlLista', ['$scope', '$http', function($scope, $http) {

    $http.get('/getDiscos').success(function(data) {
        $scope.discos = data;
    });

  }]);
</script>
