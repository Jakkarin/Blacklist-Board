var app = angular.module('App', ['ngMaterial']);
app.controller('AppLayout', ['$scope', '$mdSidenav', function($scope, $mdSidenav) {
	// function สำหรับสลับ slidenav 
	$scope.textHeader = 'dashboard';
	$scope.toggleSidenav = function(menuId) {
		$mdSidenav(menuId).toggle();
	};
	// function สำหรับปิด slidenav 
	$scope.closeSidenav = function(menuId) {
		$mdSidenav(menuId).close();
	};
	$scope.ctest = function() {
		$scope.textHeader = 'asd';
	};
}]);
app.controller('AppContent', ['$scope', function($scope) {
	//
}]);
angular.element(document).ready(function() {
	angular.element(document.body).attr('style','animation:startPage .2s;style="overflow: hidden;');
});	