var userControllers = angular.module('userControllers',[]);

userControllers.controller('ListController',['$scope','$http',function($scope,$http){
  // Initialising the user array.
      $scope.users = [];

      // Getting the list of users through ajax call.
      $http({
        url: 'http://127.0.0.1/Angular/4-SampleApp2/main/json_get_users',
        method: "POST",
      }).success(function (data) {
        $scope.users= data;
  });
}]);