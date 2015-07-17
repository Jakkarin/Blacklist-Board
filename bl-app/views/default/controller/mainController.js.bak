var postConfig = { headers: { 'Content-Type': 'application/x-www-form-urlencoded' }, transformRequest: transformData };
angular.module('App', ['ngMaterial','ngRoute','ngProgress'])
	.controller('AppLayout', function($scope, $mdSidenav, $http) {
		$scope.toggleSidenav = function(menuId) {
			$mdSidenav(menuId).toggle();
		};
		$http.get(mAsset + '/menu.json')
			.success(function(res) {
				$scope.menuData = res;
			});
		$scope.closeSidenav = function(menuId) {
			$mdSidenav(menuId).close();
		};
	})
	.controller('mainController', function($scope) {
		var pageName = 'dashboard';
		angular.element(textHeader).html(pageName);
	})
	.controller('menuController', function($scope, $http, $route, $mdDialog) {
		var pageName = 'menu';
		angular.element(textHeader).html(pageName);
		$http.get(mURL + '/menu/lists')
			.success(function(res) {
				var cData01 = [];
				var cData02 = [];
				var cData03 = [];
				var cData02_check = 'S$';
				var cData03_check = 'S$';
				for(var item in res) {
					if (res[item].type === '0') {
						cData01.push(res[item]);
					} else if (res[item].type === '1') {
						cData02.push(res[item]);
						cData02_check += res[item].sub + ',';
					} else if (res[item].type === '2') {
						cData03.push(res[item]);
						cData03_check += res[item].sub + ',';
					}
				}
				$scope.data01 = cData01;
				$scope.data02 = cData02;
				$scope.data03 = cData03;
				$scope.data02_check = cData02_check;
				$scope.data03_check = cData03_check;
			});
		$scope.sCreate = function(data) {
			$http.post(mURL + '/menu/create', data.create, postConfig)
				.success(function() {
					$route.reload();
				});
		}
		$scope.sEdit = function(event,Id) {
			$mdDialog.show({
				controller: function($scope, $mdDialog, $http) {
					$http.get(mURL + '/menu/edit/json/' + Id)
						.success(function(res) {
							$scope.edit = res;
						});
					$scope.delete = function() {
						var confirm = $mdDialog.confirm()
							.parent(angular.element(document.body))
							.title('คุณต้องการจะลบหรือไม่ ?')
							.content('ถ้าทำการลบแล้วจะไม่สามารถกู้คืนได้')
							.ok('ตกลง')
							.cancel('ไม่ต้องการลบ');
							
						$mdDialog.show(confirm).then(function() {
							$http.post(mURL + '/menu/edit/delete', { id:Id }, postConfig);
							$route.reload();
						}, function() {
							$mdDialog.hide();
						});
					};
					$scope.update = function(data) {
						$http.post(mURL + '/menu/update/' + Id, data.edit, postConfig)
							.success(function() {
								$mdDialog.cancel();
								$route.reload();
							});
					};
					$scope.hide = function() {
						$mdDialog.hide();
					};
					$scope.cancel = function() {
						$mdDialog.cancel();
					};
				},
				templateUrl: mURL + '/menu/edit',
				parent: angular.element(document.body),
				targetEvent: event,
			});
		}
	})
	.config(function($routeProvider) {
		$routeProvider
			.when('/',{
				controller: 'mainController',
				templateUrl: mURL + '/admin/dashboard'
			})
			.when('/menu',{
				controller: 'menuController',
				templateUrl: mURL + '/menu'
			})
			.otherwise({
				redirectTo:'/'
			})
	})
	.run(function($rootScope, ngProgress) {
		$rootScope.$on('$routeChangeStart', function() {
			ngProgress.start();
		});
		$rootScope.$on('$routeChangeSuccess', function() {
			ngProgress.complete();
		});
	});
angular.element(document).ready(function() {
	angular.element(document.body).attr('style','animation:startPage .2s;style="overflow: hidden;');
});
function transformData(data) {
	var str = '';
	for(p in data) {
		str += p + '=' + data[p] + '\&';
	}
	return str.substring(0, str.lastIndexOf('\&'));
}