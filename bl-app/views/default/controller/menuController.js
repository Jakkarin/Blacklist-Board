var postConfig = { headers: { 'Content-Type': 'application/x-www-form-urlencoded' }, transformRequest: transformData };
app = angular.module('menuApp', ['ngRoute','ngProgress']);
app.controller('menuController', function($scope, $http) {
	$http.get(mAsset + '/menu.json')
		.success(function(res) {
			$scope.menuData = res;
		});
});
app.config(function($routeProvider) {
	$routeProvider
		.when('/',{
			templateUrl: mURL + '/admin/dashboard'
		})
		.otherwise({
			redirectTo:'/'
		})
});
app.run(function($rootScope, ngProgress) {
	$rootScope.$on('$routeChangeStart', function() {
		ngProgress.start();
	});
	$rootScope.$on('$routeChangeSuccess', function() {
		ngProgress.complete();
	});
});
function transformData(data) {
	var str = '';
	for(p in data) {
		str += p + '=' + data[p] + '\&';
	}
	return str.substring(0, str.lastIndexOf('\&'));
}