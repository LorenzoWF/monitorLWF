<div class="container">
  <div class="row" style="margin-top: 200px;">

    <div class="col-md-4"></div>

    <div class="col-md-4">
      <div ng-controller="CrlLogin">
        <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" ng-model="lEmail">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" ng-model="lSenha">
          </div>
          <button type="submit" class="btn btn-default" ng-click="logar">Submit</button>
        </form>
      </div>
    </div>

  </div>
</div>

<script>
  var myApp = angular.module('myApp',[]);

  myApp.controller('CtrlLogin', ['$scope', '$http', function($scope, $http) {
    $scope.logar = function() {

      var dataLogin = {lEmail: $scope.lEmail, lSenha: $scope.lSenha};

      $http.post('/verificaLogin', dataLogin).success(function (dataLogin) {
        alert(dataLogin);

      }).error(function (dataLogin) {
        alert('Erro, nao foi possivel estabelecer a comunicacao');
      });

    }
  }]);

</script>
