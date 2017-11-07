var reg = angular.module('register',[])
.config(['$interpolateProvider', function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
}]);


reg.controller('regCtrl',function($scope){
	
});