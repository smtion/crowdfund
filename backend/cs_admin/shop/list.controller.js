(function() {
  'use strict';
  
  angular
    .module('app.shop')
    .controller('ShopListController', ShopListController);
    
  function ShopListController() {
    var vm = this;
    console.log('list');
    
  }
})();
