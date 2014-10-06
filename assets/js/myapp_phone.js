var sampleApp = angular.module('myApp',['ngRoute']);
var ip_serveur = "http://192.168.0.66:8090/";
var ip_nodejs1 = "http://192.168.0.64:3000/";

sampleApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/', {
        templateUrl: '../../assets/partials/test.html',
        controller: 'listMenu'
      }).
      when('/pieces', {
        templateUrl: '../../assets/partials/test.html',
        controller: 'ListPieces'
      }).
      otherwise({
        redirectTo: '/addOrder'
      });
  }]);
  

//::::::::::::::   CPNTROLLERS  :::::::::::::::

function listMenu($scope){

  $scope.lesmodules = [
    {name: 'Volets', url:'volets', icone:'', couleur:'turquoise'},
    {name: 'Pièces', url:'room', icone:'',couleur:'bleu'},
    {name: 'Chauffage', url:'chauffag', icone:'',couleur:'rouge'},
    {name: 'Lumières', url:'light', icone:'',couleur:'jaune'},
    {name: 'Météo', url:'meteo', icone:'',couleur:'violet'},
  ];

}

function ChercheType(type){
  console.log(type);
  $scope.message = type;
  window.location('/pieces');
}

function ListPieces($scope,$http){
  
  $scope.method = 'GET';
  $scope.url = ip_serveur+'ihm/index.php/welcome/lirepieces/file/json';

  $scope.code = null;
  $scope.response = null;

  $http({method: $scope.method, url: $scope.url}).
      success(function(data, status) {
       //console.log(data);
      $scope.lesmodules = data;

      }).
      error(function(data, status) {
        $scope.data = data || "Request failed";
        $scope.status = status;
  });
}

/**
*
*
*/
function listModules($scope,$http){
     
     $scope.method = 'GET';

    //console.log($scope.filterOptions);
  
    $scope.url = ip_serveur+'ihm/index.php/welcome/lireFileDomo/file/json';
  
    //$scope.url = 'http://192.168.0.63:8888/ihm/index.php/welcome/lireScenes/json';

    $scope.code = null;
    $scope.response = null;

    $http({method: $scope.method, url: $scope.url}).
      success(function(data, status) {
        console.log(data.result);
        
        $scope.lesmodules = data.result;
        
    }).
      error(function(data, status) {
        $scope.data = data || "Request failed";
        $scope.status = status;
   
  });

}

  //:::::::::::::::   JQTOUCH  ::::::::::::::

