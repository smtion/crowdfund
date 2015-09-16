(function() {
  'use strict';
  
  angular.module('app', [
    'app.shop',
    
    'ngResource',
    'ngRoute',
    'ngSanitize'
  ]).config(function($routeProvider) {
    $routeProvider
      .when('/list', { 
        templateUrl: 'shop/list.html',
        controller: 'ShopListController'
      })
      .when('/register', { 
        templateUrl: 'shop/register.html',
        controller: 'ShopRegidsterController'
      })
      .otherwise({
        redirectTo: '/list'
      });
  });
})();
